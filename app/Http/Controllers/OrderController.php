<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Nette\Utils\Random;
use Psy\Readline\Transient;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request, Product $product)
    {
        $current_id = Transaction::insertGetId([
            'uuid' => uuid_create(),
            'user_id' => auth()->user()->id,
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
            'qty' => $request->qty_hidden,
            'price' => $product->price,
            'total' => $request->qty_hidden * $product->price,
            'created_at' => now(),
        ]);
        return redirect()->route('my-order.detail', ['uuid' => $transaction->uuid])->with([
            'title' => 'Checkout Product',
            'icon' => 'success',
            'text' => 'Please fullfil the requirement form for complete your order!',
        ]);
    }

    public function checkout(Request $request, Transaction $transaction)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $province = RajaOngkir::provinsi()->find($request->province);
        $city = RajaOngkir::kota()->find($request->city);

        return response()->json([
            'province' => $province,
            'city' => $city
        ]);
        // $params = [
        //     'payment_type' => 'bank_transfer',
        //     'transaction_details' => [
        //         'order_id' => md5($transaction->id . Random::generate(4)),
        //         'gross_amount' => $request->total,
        //     ],
        //     'customer_details' => [
        //         'first_name' => auth()->user()->name,
        //         'last_name' => '',
        //         'address' => "$province, $city",
        //         'phone' => auth()->user()->phone
        //     ],
        // ];
        // $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return response()->json([
        //     'token' => $snapToken,
        // ]);
    }
}
