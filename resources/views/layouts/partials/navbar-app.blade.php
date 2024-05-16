<nav class="mainmenu-nav">
    <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
    <div class="mobile-nav-brand">
        <a
            href="{{ route('catalog') }}"
            class="logo"
        >
            <img
                src="{{ asset('icon/grombyang.png') }}"
                alt="Site Logo"
            >
        </a>
    </div>
    <ul class="mainmenu">
        <li class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                id="dropdown-header-menu"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="fa-solid fa-filter"></i> Categories
            </a>
            <ul
                class="dropdown-menu"
                aria-labelledby="dropdown-header-menu"
            >
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Fashion</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Electronics</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Home Decor</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Medicine</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Furniture</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Crafts</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Accessories</a>
                </li>
                <li>
                    <a
                        class="dropdown-item"
                        href="shop-sidebar.html"
                    >Handicraft</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="shop.html">
                <i class="fa-solid fa-bag-shopping"></i>
                Shop
            </a>
        </li>
        <li>
            <a href="shop-sidebar.html">
                <i class="fa-solid fa-tag"></i>
                Deals
            </a>
        </li>
        <li>
            <a href="contact.html">
                <i class="fa-solid fa-headset"></i>
                Support
            </a>
        </li>
    </ul>
</nav>