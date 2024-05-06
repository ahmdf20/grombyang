@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="row pb-5">
                        <div class="col-lg-6">
                            <div class="product-gallery me-xl-1 me-xxl-5">
                                <div
                                    class="slider-init"
                                    id="sliderFor"
                                >
                                    <div class="slider-item rounded">
                                        <img
                                            src="{{ asset($product->image) }}"
                                            class="rounded w-100"
                                            alt="Image of {{ $product->name }}"
                                        >
                                    </div>
                                </div><!-- .slider-init -->
                            </div><!-- .product-gallery -->
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="product-info mt-5 me-xxl-5">
                                <h4 class="product-price text-primary">Rp.
                                    {{ number_format($product->price, 0, ',', '.') }}</h4>
                                <h2 class="product-title">{{ $product->name }}</h2>
                                <div class="product-rating">
                                    <ul class="rating">
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-half"></em></li>
                                    </ul>
                                    <div class="amount">(2 Reviews)</div>
                                </div><!-- .product-rating -->
                                <div class="product-meta">
                                    <ul class="d-flex g-3 gx-5">
                                        <li>
                                            <div class="fs-14px text-muted">Categories</div>
                                            <div class="fs-16px fw-bold text-secondary">
                                                @foreach ($product->categories as $key => $category)
                                                <span class="badge rounded-pill bg-primary">{{ $category->name }}</span>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="product-meta">
                                    <h6 class="title">Color</h6>
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control color-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="productColor1"
                                                    name="productColor"
                                                    checked
                                                >
                                                <label
                                                    class="custom-control-label dot dot-xl"
                                                    data-bg="#754c24"
                                                    for="productColor1"
                                                ></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="productColor2"
                                                    name="productColor"
                                                >
                                                <label
                                                    class="custom-control-label dot dot-xl"
                                                    data-bg="#636363"
                                                    for="productColor2"
                                                ></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="productColor3"
                                                    name="productColor"
                                                >
                                                <label
                                                    class="custom-control-label dot dot-xl"
                                                    data-bg="#ba6ed4"
                                                    for="productColor3"
                                                ></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="productColor4"
                                                    name="productColor"
                                                >
                                                <label
                                                    class="custom-control-label dot dot-xl"
                                                    data-bg="#ff87a3"
                                                    for="productColor4"
                                                ></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="product-meta">
                                    <h6 class="title">Size</h6>
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    name="sizeCheck"
                                                    id="sizeCheck1"
                                                    checked
                                                >
                                                <label
                                                    class="custom-control-label"
                                                    for="sizeCheck1"
                                                >XS</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    name="sizeCheck"
                                                    id="sizeCheck2"
                                                >
                                                <label
                                                    class="custom-control-label"
                                                    for="sizeCheck2"
                                                >SM</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    name="sizeCheck"
                                                    id="sizeCheck3"
                                                >
                                                <label
                                                    class="custom-control-label"
                                                    for="sizeCheck3"
                                                >L</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    name="sizeCheck"
                                                    id="sizeCheck4"
                                                >
                                                <label
                                                    class="custom-control-label"
                                                    for="sizeCheck4"
                                                >XL</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .product-meta --> --}}
                                <div class="product-meta">
                                    <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                        {{-- <li class="w-140px">
                                            <div class="form-control-wrap number-spinner-wrap">
                                                <button
                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                    data-number="minus"
                                                ><em class="icon ni ni-minus"></em></button>
                                                <input
                                                    type="number"
                                                    class="form-control number-spinner"
                                                    value="0"
                                                >
                                                <button
                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                    data-number="plus"
                                                ><em class="icon ni ni-plus"></em></button>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="btn btn-primary">Add to Cart</button>
                                        </li>
                                        <li class="ms-n1">
                                            <button class="btn btn-icon btn-trigger text-primary"><em
                                                    class="icon ni ni-heart"
                                                ></em></button>
                                        </li> --}}
                                    </ul>
                                </div><!-- .product-meta -->
                            </div><!-- .product-info -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                    <hr class="hr border-light">
                    <div class="row g-gs flex-lg-row-reverse pt-5">
                        <div class="col-lg-5">
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="product-details entry me-xxl-3">
                                {!! $product->description !!}
                            </div>

                            <a
                                href="{{ route('product.index') }}"
                                class="btn btn-sm btn-danger"
                            >Back</a>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div>
            </div>
        </div><!-- .nk-block -->

    </div>
</div>
<!-- content @e -->
@endsection
