@extends('layouts._default.app')
@section('content')
<main class="main-wrapper">

    {{-- <x-banner-app /> --}}

    {{-- @include('catalog.section.best-deal') --}}

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Order List</h4>
                    {{-- <a
                        href="#"
                        class="cart-clear"
                    >Clear Shoping Cart</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key => $transaction)

                            <tr>
                                <th scope="row">{{ $transaction->invoice }}</th>
                                <td>{{ date_format($transaction->created_at, 'l, d M Y') }}</td>
                                <td>{{ ucfirst($transaction->status) }}</td>
                                <td>
                                    Rp. {{ number_format($transaction?->order->sum('total'), 0, ',', '.') }} for
                                    {{ $transaction->order->sum('qty') }} items
                                </td>
                                <td>
                                    <a
                                        href="{{ route('my-order.detail', ['uuid' => $transaction->uuid]) }}"
                                        class="axil-btn view-btn"
                                    >View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
</main>

<script>

</script>

@endsection