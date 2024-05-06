<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index(): View
    {
        return view('catalog.index', [
            'title' => 'Grombyang',
            'products' => Product::where([
                ['deleted_at', null],
                ['is_restricted', 0]
            ])->get()->all()
        ]);
    }

    public function profile(): View
    {
        return view('catalog.account.profile', [
            'title' => 'Grombyang | My Profile'
        ]);
    }

    public function update(Request $request)
    {
        User::where('uuid', auth()->user()->uuid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);
        return response()->json([
            'title' => 'Update Profile',
            'icon' => 'success',
            'text' => 'Updated profile has been success!'
        ]);
    }

    public function update_password(Request $request)
    {
        if (Hash::check($request->old_password, auth()->user()->password)) {
            return response()->json([
                'title' => 'Change Password',
                'icon' => 'error',
                'text' => 'Wrong old password!'
            ]);
        }

        if ($request->new_password != $request->repeat_password) {
            return response()->json([
                'title' => 'Change Password',
                'icon' => 'error',
                'text' => 'New Password and Repeat Password doesnt same!'
            ]);
        }

        User::where('uuid', auth()->user()->uuid)->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now()
        ]);

        return response()->json([
            'title' => 'Change Password',
            'icon' => 'success',
            'text' => 'Password has been changed!'
        ]);
    }
}
