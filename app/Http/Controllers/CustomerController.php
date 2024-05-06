<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('customer.index', [
            'title' => 'Grombyang | Customers',
            'users' => User::where([
                ['deleted_at', null],
                ['type', 'customer'],
            ])->get()->all()
        ]);
    }

    public function restrict(Request $request, $uuid)
    {
        User::where('uuid', $uuid)->update([
            'is_restricted' => 1,
            'restricted_at' => now()
        ]);
        return response()->json([
            'title' => 'Restricted!',
            'icon' => 'success',
            'text' => 'Selected data has been restricted!'
        ]);
    }

    public function unrestrict(Request $request, $uuid)
    {
        User::where('uuid', $uuid)->update([
            'is_restricted' => 0,
            'restricted_at' => null
        ]);
        return response()->json([
            'title' => 'Unrestrict!',
            'icon' => 'success',
            'text' => 'Selected data has been unrestricted!'
        ]);
    }
}
