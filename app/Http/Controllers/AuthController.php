<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        User::insert([
            'uuid' => uuid_create(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
            'type' => 'customer',
            'created_at' => now()
        ]);
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('catalog')->with([
            'title' => 'Credentials',
            'icon' => 'success',
            'text' => 'Success with credentials, welcome to Grombyang. Start for shop now!'
        ]);
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
