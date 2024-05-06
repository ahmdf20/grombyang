<ul class="action-list">
    <li class="axil-search d-none-laptop">
        <input
            type="search"
            class="placeholder product-search-input"
            name="search2"
            id="search2"
            value=""
            maxlength="128"
            placeholder="Search"
            autocomplete="off"
        >
        <button
            type="submit"
            class="icon wooc-btn-search"
        >
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </li>
    <li class="axil-search d-none-desktop">
        <a
            href="javascript:void(0)"
            class="header-search-icon"
            title="Search"
        >
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
    </li>
    <li class="shopping-cart">
        <a
            href="#"
            class="cart-dropdown-btn"
        >
            <span class="cart-count">2</span>
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </li>
    <li class="wishlist">
        <a href="wishlist.html">
            <i class="fa-solid fa-heart"></i>
        </a>
    </li>
    <li class="my-account">
        <a href="javascript:void(0)">
            <i class="fa-solid fa-user"></i>
        </a>
        <div class="my-account-dropdown">
            <span class="title">QUICKLINKS</span>
            <ul>
                @auth
                @if (auth()->user()->type == 'seller')
                <li>
                    <a href="{{ route('product.index') }}">Seller Dashboard</a>
                </li>
                @endif
                <li>
                    <a href="{{ route('profile') }}">My Account</a>
                </li>
                @endauth
            </ul>
            @auth
            <div class="login-btn">
                <a
                    href="#"
                    onclick="handleLogout()"
                    class="axil-btn btn-bg-primary"
                >Logout</a>
            </div>
            @endauth
            @guest
            <div class="login-btn">
                <a
                    href="{{ route('login') }}"
                    class="axil-btn btn-bg-primary"
                >Login</a>
            </div>
            <div class="reg-footer text-center">No account yet? <a
                    href="{{ route('register') }}"
                    class="btn-link"
                >REGISTER HERE.</a></div>
            @endguest
        </div>
    </li>
    <li class="axil-mobile-toggle">
        <button class="menu-btn mobile-nav-toggler">
            <i class="fa-solid fa-bars"></i>
        </button>
    </li>
</ul>
