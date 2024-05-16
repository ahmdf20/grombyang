<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): View
    {
        return view('cart.index', [
            'title' => 'Grombyang | My Cart',
            'carts' => Cart::where([
                ['user_id', auth()->user()->id],
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $session = [];
        if ($product->cart()->where('user_id', auth()->user()->id)->exists()) {
            $cart = Cart::where([
                ['product_id', $product->id],
                ['user_id', auth()->user()->id]
            ])->first();
            $cart->qty += $request->qty ? $request->qty : 1;
            $cart->save();
            $session = [
                'title' => 'Add to Cart',
                'icon' => 'success',
                'text' => 'Successfuly added the product to cart!'
            ];
        } else {
            Cart::insert([
                'uuid' => uuid_create(),
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
                'created_at' => now(),
                'qty' => 1,
            ]);
            $session = [
                'title' => 'Add to Cart',
                'icon' => 'success',
                'text' => 'Successfuly added the product to cart!'
            ];
        }

        return response()->json($session);
    }

    public function delete($uuid)
    {
        Cart::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Delete Item',
            'icon' => 'success',
            'text' => 'Successfulya deleted item in your cart!'
        ]);
    }
}
