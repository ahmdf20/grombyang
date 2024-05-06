<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(): View
    {
        return view('seller.index', [
            'title' => 'Grombyang | Sellers',
            'users' => User::where([
                ['deleted_at', null],
                ['type', 'seller'],
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
