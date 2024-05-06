@extends('layouts._default.app')
@section('content')
<main class="main-wrapper">

    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            <img
                                src="{{ asset('icon/default.jpg') }}"
                                alt="Hello Annie"
                                style="width: 10rem; border-radius: 100%;"
                            >
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">Hello {{ auth()->user()->name }}</h5>
                            <span class="joining-date">Grombyang Member Since
                                {{ substr(auth()->user()->created_at, 0, 10) }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <x-profile-sidebar />
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div
                                class="tab-pane fade show active"
                                id="nav-dashboard"
                                role="tabpanel"
                            >
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">Hello {{ auth()->user()->name }} (not
                                        <span>{{ auth()->user()->name }}?</span>
                                        <a onclick="handleLogout()">Log Out</a>)
                                    </div>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping
                                        and billing addresses, and edit your password and account details.</p>
                                </div>
                            </div>
                            @include('catalog.account.section.edit-profile')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

</main>
@endsection
