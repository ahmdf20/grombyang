@extends('layouts._default.app')
@section('content')
<main class="main-wrapper">

    <x-banner-app />

    {{-- @include('catalog.section.best-deal') --}}

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white section-gap-80-35">
        <div class="container">
            <div class="section-title-border">
                <h2 class="title">Explore Our Products</h2>
                <div class="view-btn"><a href="shop.html">View All Products</a></div>
            </div>
            <div class="row">
                @foreach ($products as $key => $product)
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="{{ route('front.product-detail', ['uuid' => $product->uuid]) }}">
                                <img
                                    data-sal="zoom-out"
                                    data-sal-delay="100"
                                    data-sal-duration="800"
                                    loading="lazy"
                                    class="main-img"
                                    src="{{ asset($product->image) }}"
                                    alt="Product Images"
                                    style="object-fit: cover; height: 25rem;"
                                >
                            </a>
                            {{-- <div class="label-block label-left">
                                <div class="product-badget sale">Sale</div>
                            </div> --}}
                            <div class="product-hover-action">
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner mb-5">
                                <h5 class="title"><a
                                        href="{{ route('front.product-detail', ['uuid' => $product->uuid]) }}"
                                        role="button"
                                    >{{ $product->name }}</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">Rp.
                                        {{ number_format($product->price, 0, ',', '.') }} </span>
                                </div>
                            </div>
                            <ul class="cart-action d-flex justify-content-evenly">
                                <li class="select-option">
                                    <form
                                        action="{{ route('cart.store', ['product' => $product->id]) }}"
                                        method="post"
                                        onsubmit="handleSubmit(event, {{ $product->id }}, 'cart')"
                                    >
                                        @csrf
                                        <button
                                            class="btn btn-lg btn-success"
                                            type="submit"
                                        >
                                            <i class="fa-solid fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </li>
                                <li class="select-option">
                                    <form
                                        action="{{ route('wishlist.store', ['product' => $product->id]) }}"
                                        method="post"
                                        onsubmit="handleSubmit(event, {{ $product->id }}, 'wishlist')"
                                    >
                                        @csrf
                                        <button
                                            class="btn btn-lg {{ auth()?->user()?->wishlist()->where('product_id', $product->id)->exists() ? 'btn-danger' : 'btn-outline-danger' }}"
                                            type="submit"
                                        >
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- @include('catalog.section.mega-collection') --}}

    {{-- <x-carousel-catalog /> --}}

    {{-- @include('catalog.section.sale') --}}

    {{-- @include('catalog.section.weekly-deal') --}}

</main>

<script>
    function handleSubmit(event, id, to) {
        event.preventDefault();
        let url = to == 'cart' ? `cart/store/${id}` : `wishlist/store/${id}`;
        $.ajax({
            url: `{{ config('app.url') }}/${url}`,
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
        });
    }

</script>

@endsection