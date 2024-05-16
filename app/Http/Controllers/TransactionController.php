<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Nette\Utils\Random;

class TransactionController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request, Product $product)
    {
        $current_id = Transaction::insertGetId([
            'uuid' => uuid_create(),
            'invoice' => 'INV#' . Random::generate(4, '0-9') . intval(date('s')) * (date('Y') + intval(date('m')) + intval(('d'))),
            'status' => 'pending',
            'created_at' => now(),
        ]);
        $transaction = Transaction::where('id', $current_id)->first();
        Order::insert([
            'uuid' => uuid_create(),
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'transaction_id' => $current_id,
            'qty' => $request->qty,
            'price' => $product->price,
            'total' => $request->qty * $product->price,
            'created_at' => now(),
        ]);
        return response()->json([
            'title' => 'Checkout Product',
            'icon' => 'success',
            'text' => 'Please fullfil the requirement form for complete your order!',
            'uuid' => $transaction->uuid
        ]);
    }

    public function checkout(Request $request, Transaction $transaction)
    {
        $province = RajaOngkir::provinsi()->find($request->province);
        $city = RajaOngkir::kota()->find($request->city);
        return response()->json([
            'province' => $province,
            'city' => $city
        ]);
    }
}
