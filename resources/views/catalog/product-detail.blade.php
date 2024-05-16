@extends('layouts._default.app')
@section('content')
<main class="main-wrapper">

    {{-- <x-banner-app /> --}}

    {{-- @include('catalog.section.best-deal') --}}

    <!-- Start Cart Area  -->
    <div class="axil-single-product-area bg-color-white">
        <div class="single-product-thumb axil-section-gapcommon single-product-modern">
            <div class="container">
                <div class="row row--20">
                    <div class="col-lg-6 mb--40">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-large-thumbnail-4 single-product-thumbnail axil-product">
                                    <div class="thumbnail">
                                        <img
                                            src="{{ asset($product->image) }}"
                                            alt="Image of {{ $product->name }}"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title">{{ $product->name }}</h2>
                                <span class="price-amount">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                                {{-- <div class="product-rating">
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="review-number">6,405</div>
                                    <div class="total-answerd">2 answered questions</div>
                                </div> --}}
                                <div class="product-variations-wrapper">

                                    <!-- Start Product Variation  -->
                                    <div class="product-variation product-size-variation">
                                        <h6 class="title">Categories :</h6>
                                        @foreach ($product->categories as $key => $category)
                                        <span class="badge bg-dark">{{ $category->name }}</span>
                                        @endforeach
                                    </div>
                                    <!-- End Product Variation  -->
                                    <!-- Start Product Variation  -->
                                    {{-- <div class="product-variation">
                                        <h6 class="title">Colors:</h6>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant mt--0">
                                                <li class="color-extra-01 active"><span><span
                                                            class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <!-- End Product Variation  -->
                                    <div class="product-variation quantity-variant-wrapper">
                                        <h6 class="title">Quantity :</h6>
                                        <div class="row m-0 justify-content-center">
                                            <div class="col-lg-2 col-sm-2 d-grid">
                                                <button
                                                    class="btn btn-lg btn-outline-success rounded-lg"
                                                    onclick="handleQTY('dec')"
                                                >
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input
                                                    class="form-control text-center"
                                                    type="number"
                                                    value="1"
                                                    id="qty"
                                                    name="qty"
                                                    readonly
                                                >
                                            </div>
                                            <div class="col-lg-2 col-sm-2 d-grid">
                                                <button
                                                    class="btn btn-lg btn-outline-success rounded-lg"
                                                    onclick="handleQTY('inc')"
                                                >
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper">

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart">
                                            <form
                                                action="{{ route('order.store', ['product' => $product->id]) }}"
                                                method="post"
                                            >
                                                @csrf
                                                <input
                                                    class="form-control text-center"
                                                    type="number"
                                                    value="1"
                                                    id="qty_hidden"
                                                    name="qty_hidden"
                                                    hidden
                                                >
                                                <button
                                                    type="submit"
                                                    class="axil-btn btn-bg-secondary"
                                                >Buy Now</button>
                                            </form>
                                        </li>
                                        <li class="add-to-cart">
                                            <button
                                                type="submit"
                                                class="axil-btn btn-bg-primary"
                                                onclick="handleSubmit(event, {{ $product->id }})"
                                            >Add to Cart</button>
                                        </li>

                                    </ul>
                                    <!-- End Product Action  -->

                                </div>
                                <!-- End Product Action Wrapper  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->
        <div class="woocommerce-tabs wc-tabs-wrapper bg-lighter wc-tab-style-two">
            <div class="container">
                <div class="section-title-wrapper section-title-border">
                    <h2 class="title">About This Product 💥</h2>
                </div>
                <div class="tabs-wrap">
                    <ul
                        class="nav tabs"
                        id="myTab"
                        role="tablist"
                    >
                        <li
                            class="nav-item"
                            role="presentation"
                        >
                            <a
                                class="active"
                                id="description-tab"
                                data-bs-toggle="tab"
                                href="#description"
                                role="tab"
                                aria-controls="description"
                                aria-selected="true"
                            >Specifications</a>
                        </li>
                        {{-- <li
                            class="nav-item"
                            role="presentation"
                        >
                            <a
                                id="reviews-tab"
                                data-bs-toggle="tab"
                                href="#reviews"
                                role="tab"
                                aria-controls="reviews"
                                aria-selected="false"
                            >Reviews</a>
                        </li> --}}
                    </ul>
                    <div
                        class="tab-content"
                        id="myTabContent"
                    >
                        <div
                            class="tab-pane fade show active"
                            id="description"
                            role="tabpanel"
                            aria-labelledby="description-tab"
                        >
                            <div class="product-desc-wrapper">
                                <div class="single-desc">
                                    <h5 class="title">Feature</h5>
                                    <div class="row">
                                        <p style="text-align: justify;">
                                            {!! $product->description !!}
                                        </p>
                                    </div>

                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        {{-- <div
                            class="tab-pane fade"
                            id="reviews"
                            role="tabpanel"
                            aria-labelledby="reviews-tab"
                        >
                            <div class="reviews-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 mb--40">
                                        <div class="axil-comment-area pro-desc-commnet-area">
                                            <h5 class="title">Review for this product</h5>
                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img
                                                                    src="./assets/images/blog/author-image-4.png"
                                                                    alt="Author Images"
                                                                >
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a
                                                                        class="hover-flip-item-wrapper"
                                                                        href="#"
                                                                    >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Cameron Williamson">Eleanor
                                                                                Pena</span>
                                                                        </span>
                                                                    </a>
                                                                    <span class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ” </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->

                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img
                                                                    src="./assets/images/blog/author-image-4.png"
                                                                    alt="Author Images"
                                                                >
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a
                                                                        class="hover-flip-item-wrapper"
                                                                        href="#"
                                                                    >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Rahabi Khan">Courtney
                                                                                Henry</span>
                                                                        </span>
                                                                    </a>
                                                                    <span class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ”</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->

                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img
                                                                    src="./assets/images/blog/author-image-5.png"
                                                                    alt="Author Images"
                                                                >
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a
                                                                        class="hover-flip-item-wrapper"
                                                                        href="#"
                                                                    >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Rahabi Khan">Devon
                                                                                Lane</span>
                                                                        </span>
                                                                    </a>
                                                                    <span class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ” </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->
                                            </ul>
                                        </div>
                                        <!-- End .axil-commnet-area -->
                                    </div>
                                    <!-- End .col -->
                                    <div class="col-lg-6 mb--40">
                                        <!-- Start Comment Respond  -->
                                        <div class="comment-respond pro-des-commend-respond mt--0">
                                            <h5 class="title mb--30">Add a Review</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                            <div class="rating-wrapper d-flex-center mb--40">
                                                Your Rating <span class="require">*</span>
                                                <div class="reating-inner ml--20">
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                </div>
                                            </div>

                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Other Notes (optional)</label>
                                                            <textarea
                                                                name="message"
                                                                placeholder="Your Comment"
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Name <span class="require">*</span></label>
                                                            <input
                                                                id="name"
                                                                type="text"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Email <span class="require">*</span> </label>
                                                            <input
                                                                id="email"
                                                                type="email"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <button
                                                                type="submit"
                                                                id="submit"
                                                                class="axil-btn btn-bg-primary w-auto"
                                                            >Submit
                                                                Comment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Comment Respond  -->
                                    </div>
                                    <!-- End .col -->
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="single-product-features">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon">
                                    <i class="fa-solid fa-box"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Easy Return</h6>
                                    <p>Anytime you can return the product without any payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon quality">
                                    <i class="fal fa-badge-check"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Quality Service</h6>
                                    <p>We are dedicated to give you quality service for your happiness</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon original">
                                    <i class="fal fa-box"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Original Product</h6>
                                    <p>We deliver you each and every prodeuct is original </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- woocommerce-tabs -->

    </div>
    <!-- End Cart Area  -->
</main>

<script>
    function handleQTY(operator) {
        let qty = parseInt($('#qty').val())
        let qty_hidden = parseInt($('#qty_hidden').val())
        if (operator == 'inc') {
            qty += 1
            qty_hidden += 1
        } else {
            qty -= 1
            qty_hidden -= 1
        }
        $('#qty').val(qty)
        $('#qty_hidden').val(qty)
    }

    function handleSubmit(event, id)
    {
        event.preventDefault();
        $.ajax({
            url: `{{ config('app.url') }}/cart/store/${id}`,
            method: 'POST',
            data: {
                _token: `{{ csrf_token() }}`,
                qty: $('#qty').val()
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

    function handleCheckout(event, id)
    {
        event.preventDefault();
        $.ajax({
            url: `{{ config('app.url') }}/order/store/${id}`,
            method: 'POST',
            data: {
                _token: `{{ csrf_token() }}`,
                _method: 'POST',
                qty: $('#qty').val(),
            },
            success: (response) => {
                Swal.fire({
                    title: response.title,
                    icon: response.icon,
                    text: response.text,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `{{ config('app.url') }}/my/order/detail/${response.uuid}`
                    }
                })
            },
            error: (error) => console.error(error)
        })
    }
</script>

@endsection