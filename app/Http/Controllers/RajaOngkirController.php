<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class RajaOngkirController extends Controller
{
    public function province(): array
    {
        return  RajaOngkir::provinsi()->all();
    }

    public function city($id): array
    {
        return RajaOngkir::kota()->dariProvinsi($id)->get();
    }

    public function shipping($city, $weight, $shipping)
    {
        return RajaOngkir::ongkosKirim([
            'origin' => 376,
            'destination' => $city,
            'weight' => $weight,
            'courier' => $shipping
        ])->get();
    }
}
