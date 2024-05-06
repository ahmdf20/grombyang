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
                            <a href="single-product-8.html">
                                <img
                                    data-sal="zoom-out"
                                    data-sal-delay="100"
                                    data-sal-duration="800"
                                    loading="lazy"
                                    class="main-img"
                                    src="{{ asset($product->image) }}"
                                    alt="Product Images"
                                >
                            </a>
                            {{-- <div class="label-block label-left">
                                <div class="product-badget sale">Sale</div>
                            </div> --}}
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="#">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="#">{{ $product->name }}</a></h5>
                                {{-- <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">6,400</span>
                                </div> --}}
                                <div class="product-price-variant">
                                    <span class="price current-price">Rp.
                                        {{ number_format($product->price, 0, ',', '.') }} </span>
                                </div>
                            </div>
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
@endsection
