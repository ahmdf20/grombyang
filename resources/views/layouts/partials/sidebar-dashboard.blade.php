<!-- sidebar @s -->
<aside
    class="nk-sidebar nk-sidebar-fixed "
    data-content="sidebarMenu"
>
    {{-- Navbar Brand START --}}
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a
                href="html/index.html"
                class="logo-link nk-sidebar-logo"
            >
                <img
                    class="logo-light logo-img"
                    src="{{ asset('icon/grombyang.png') }}"
                    srcset="{{ asset('icon/grombyang.png') }}"
                    alt="logo"
                    style="width:10rem; object-fit: cover;"
                >
                <img
                    class="logo-dark logo-img"
                    src="{{ asset('icon/grombyang.png') }}"
                    srcset="{{ asset('icon/grombyang.png') }}"
                    style="width:10rem; object-fit: cover;"
                    alt="logo-dark"
                >
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a
                href="#"
                class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                data-target="sidebarMenu"
            ><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
    {{-- Navbar Brand END --}}

    <!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div
            class="nk-sidebar-body"
            data-simplebar
        >
            <div class="nk-sidebar-content">

                <x-sidebar-dashboard />

            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</aside>
<!-- sidebar @e -->
