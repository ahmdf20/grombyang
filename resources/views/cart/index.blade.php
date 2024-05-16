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
                    <h4 class="title">Your Cart</h4>
                    {{-- <a
                        href="#"
                        class="cart-clear"
                    >Clear Shoping Cart</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th
                                    scope="col"
                                    class="product-remove"
                                ></th>
                                <th
                                    scope="col"
                                    class="product-thumbnail"
                                >Product</th>
                                <th
                                    scope="col"
                                    class="product-title"
                                ></th>
                                <th
                                    scope="col"
                                    class="product-price"
                                >Price</th>
                                <th
                                    scope="col"
                                    class="product-quantity"
                                >Quantity</th>
                                <th
                                    scope="col"
                                    class="product-subtotal"
                                >Subtotal</th>
                                <th
                                    scope="col"
                                    class="product-add-cart"
                                ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($carts) == 0)
                            <tr>
                                <td
                                    colspan="6"
                                    class="text-center"
                                >You don't have product in your cart</td>
                            </tr>
                            @else
                            @foreach ($carts as $key => $cart)
                            <tr>
                                <td class="product-remove">
                                    <a
                                        onclick="handleDelete('{{ $cart->uuid }}')"
                                        class="remove-wishlist"
                                    ><i class="fal fa-times"></i></a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="{{ route('front.product-detail', ['uuid' => $cart->product->uuid]) }}">
                                        <img
                                            src="{{ asset($cart->product->image) }}"
                                            alt="Image of {{ $cart->product->name }}"
                                        >
                                    </a>
                                </td>
                                <td class="product-title">
                                    <a
                                        href="{{ route('front.product-detail', ['uuid' => $cart->product->uuid]) }}">{{ $cart->product->name }}</a>
                                </td>
                                <td
                                    class="product-price"
                                    data-title="Price"
                                >
                                    <span class="currency-symbol">Rp.
                                    </span>{{ number_format($cart->product->price, 0, ',', '.') }}
                                </td>
                                <td
                                    class="product-quantity"
                                    data-title="Qty"
                                >
                                    <div class="pro-qty">
                                        <input
                                            type="number"
                                            id="qty[{{ $cart->id }}]"
                                            name="qty[{{ $cart->id }}]"
                                            class="quantity-input"
                                            value="{{ $cart->qty }}"
                                        >
                                    </div>
                                </td>
                                <td
                                    class="product-subtotal"
                                    data-title="Subtotal"
                                >
                                    <span class="currency-symbol">Rp.
                                    </span>{{ number_format(intval($cart->product->price * $cart->qty), 0, ',', '.') }}
                                </td>
                                <td class="product-add-cart">
                                    <form
                                        action="#"
                                        method="post"
                                    >
                                        <button
                                            type="submit"
                                            class="axil-btn btn-outline"
                                        >Checkout Now!</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
</main>

<script>
    function handleDelete(uuid) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}/cart/delete/${uuid}`,
                    method: 'POST',
                    data: {
                        _token: `{{ csrf_token() }}`,
                        _method: `DELETE`
                    },
                    success: (response) => {
                        Swal.fire({
                            title: response.title,
                            icon: response.icon,
                            text: response.text,
                        }).then((result1) => {
                            if (result1.isConfirmed) {
                                window.location.reload()
                            }
                        })
                    },
                    error: (error) => {

                    }
                })
            }
        })
    }
</script>

@endsection