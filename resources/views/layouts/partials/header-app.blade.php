<!-- Start Header -->
<header class="header axil-header header-style-7">
    <div class="axil-header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-top-text">
                        <p><i class="fas fa-star"></i> Free Shipping on Orders Over $150</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="about-us.html">Our Story</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="blog.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container-fluid">
            <div class="header-navbar">
                <div class="header-brand">
                    <a
                        href="{{ route('catalog') }}"
                        class="logo logo-dark"
                    >
                        <img
                            src="{{ asset('icon/grombyang.png') }}"
                            alt="Site Logo"
                        >
                    </a>
                    <a
                        href="{{ route('catalog') }}"
                        class="logo logo-light"
                    >
                        <img
                            src="{{ asset('icon/grombyang.png') }}"
                            alt="Site Logo"
                        >
                    </a>
                </div>
                <div class="header-main-nav">

                    @include('layouts.partials.navbar-app')

                </div>
                <div class="header-action">
                    <x-nav-action-app />
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header -->