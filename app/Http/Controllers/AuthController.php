<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use App\Models\EmailVerfication;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.index', [
            'title' => 'Grombyang | Login'
        ]);
    }

    public function register(): View
    {
        return view('auth.register', [
            'title' => 'Grombyang | Register'
        ]);
    }

    public function credentials(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $session = [];
        $route = '';
        if (Auth::attempt($credentials)) {
            if (in_array(auth()->user()->type, ['customer', 'seller'])) {
                $route = 'catalog';
                $session = [
                    'title' => 'Credentials',
                    'icon' => 'success',
                    'text' => 'Success with credentials, welcome to Grombyang. Start for shop now!'
                ];
            } else {
                $route = 'dashboard';
                $session = [
                    'title' => 'Credentials',
                    'icon' => 'success',
                    'text' => 'Success with credentials, welcome to Admin Dashboard!'
                ];
            }
        } else {
            $route = 'login';
            $session = [
                'title' => 'Credentials',
                'icon' => 'error',
                'text' => 'Email or Password you inputted is wrong!'
            ];
        }
        return redirect()->route($route)->with($session);
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'repeat_password' => 'required|same:password'
        ]);
        $current_id = User::insertGetId([
            'uuid' => uuid_create(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
            'type' => 'customer',
            'created_at' => now()
        ]);

        // Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        // return redirect()->route('catalog')->with([
        //     'title' => 'Credentials',
        //     'icon' => 'success',
        //     'text' => 'Success with credentials, welcome to Grombyang. Start for shop now!'
        // ]);

        EmailVerfication::insert([
            'uuid' => uuid_create(),
            'user_id' => $current_id,
            'token' => crypt($current_id . Random::generate(4, '0-9') . now(), 10),
            'method' => 'email-verif',
            'created_at' => now()
        ]);

        Mail::to($request->email)->send(new Register($request->email, 'register/email-verification'));

        return redirect()->route('login')->with([
            'title' => 'Registration',
            'icon' => 'success',
            'text' => 'Success registrating account, now check your email to verify your account!'
        ]);
    }

    public function email_verification($id, $token, $method)
    {
        $user = User::find($id);
        $route = '';
        $session = [];
        if ($user) {
            if ($method == 'email-verif') {
                $route = 'login';
                $session = [
                    'title' => 'Email Verification',
                    'icon' => 'success',
                    'text' => 'successfully verified email! Now you can login!'
                ];
                EmailVerfication::where([
                    ['user_id', $id],
                    ['token', $token]
                ])->delete();
                User::where('id', $id)->update([
                    'email_verified_at' => now()
                ]);
            } else {
                $route = 'profile';
            }
        }
        return redirect()->route($route)->with($session);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with([
            'title' => 'Logout',
            'icon' => 'success',
            'text' => 'Logout success, please login again for start your session!'
        ]);
    }
}
