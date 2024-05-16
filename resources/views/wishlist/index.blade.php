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
                    <h4 class="title">My Wishlist in Grombyang</h4>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-wishlist-table">
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
                                >Unit Price</th>
                                <th
                                    scope="col"
                                    class="product-stock-status"
                                >Stock Status</th>
                                <th
                                    scope="col"
                                    class="product-add-cart"
                                ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($wishlists) == 0)
                            <tr>
                                <td
                                    colspan="6"
                                    class="text-center"
                                >You doesn't have love product!</td>
                            </tr>
                            @else
                            @foreach ($wishlists as $key => $wishlist)
                            <tr>
                                <td class="product-remove">
                                    <a
                                        href="#"
                                        role="button"
                                        onclick="handleDelete('{{ $wishlist->uuid }}')"
                                        class="remove-wishlist"
                                    ><i class="fal fa-times"></i></a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="single-product.html"><img
                                            src="{{ asset($wishlist->product->image) }}"
                                            alt="Image of {{ $wishlist->product->name }}"
                                        ></a>
                                </td>
                                <td class="product-title">
                                    <a href="#">{{ $wishlist->product->name }}</a>
                                </td>
                                <td
                                    class="product-price"
                                    data-title="Price"
                                >
                                    <span class="currency-symbol">Rp.
                                    </span>{{ number_format($wishlist->product->price, 0, ',', '.') }}
                                </td>
                                <td
                                    class="product-stock-status"
                                    data-title="Status"
                                >
                                    {{ $wishlist->product->stock == 0 ? 'Out of Stock' : 'In Stock' }}
                                </td>
                                <td class="product-add-cart">
                                    <form
                                        action="#"
                                        method="post"
                                        onsubmit="handleSubmit(event, {{ $wishlist->product_id }})"
                                    >
                                        <button
                                            type="submit"
                                            class="axil-btn btn-outline"
                                        >Add to Cart</button>
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
                    url: `{{ config('app.url') }}/wishlist/delete/${uuid}`,
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

    function handleSubmit(event, id)
    {
        event.preventDefault();
        $.ajax({
            url: `{{ config('app.url') }}/cart/store/${id}`,
            method: 'POST',
            data: {
                _token: `{{ csrf_token() }}`
            },
            success: (response) => {
                Swal.fire({
                    title: response.title,
                    icon: response.icon,
                    text: response.text,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload()
                    }
                })
            },
            error: (error) => console.error(error)
        })
    }
</script>

@endsection