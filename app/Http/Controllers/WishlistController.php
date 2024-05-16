<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(): View
    {
        return view('wishlist.index', [
            'title' => 'Grombyang | Wishlist',
            'wishlists' => Wishlist::where([
                ['user_id', auth()->user()->id],
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function store(Product $product)
    {
        $session = [];
        if ($product->wishlist()->where('user_id', auth()->user()->id)->exists()) {
            Wishlist::where([
                ['product_id', $product->id],
                ['user_id', auth()->user()->id]
            ])->delete();
            $session = [
                'title' => 'Remove from Wishlist',
                'icon' => 'success',
                'text' => 'Successfully remove the product from your wishlist!'
            ];
        } else {
            Wishlist::insert([
                'uuid' => uuid_create(),
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
                'created_at' => now(),
            ]);
            $session = [
                'title' => 'Add to Wishlist',
                'icon' => 'success',
                'text' => 'Successfully added the product to your wishlist!'
            ];
        }

        return response()->json($session);
    }

    public function delete($uuid)
    {
        Wishlist::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Delete Item',
            'icon' => 'success',
            'text' => 'Successfully deleted item in your wishlist!'
        ]);
    }
}
