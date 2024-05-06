<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RestrictedProductController extends Controller
{
    public function index(): View
    {
        return view('product_restricted.index', [
            'title' => 'Grombyang | Restricted Product',
            'products' => Product::where([
                ['deleted_at', null],
            ])->get()->all()
        ]);
    }

    public function block($uuid)
    {
        Product::where('uuid', $uuid)->update([
            'is_restricted' => 1,
            'restricted_at' => now()
        ]);
        return response()->json([
            'title' => 'Blocked!',
            'icon' => 'success',
            'text' => 'The data has been blocked.'
        ]);
    }

    public function unblock($uuid)
    {
        Product::where('uuid', $uuid)->update([
            'is_restricted' => 0,
            'restricted_at' => null
        ]);
        return response()->json([
            'title' => 'Unblocked!',
            'icon' => 'success',
            'text' => 'The data has been unblocked.'
        ]);
    }
}
