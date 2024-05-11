<div class="nk-sidebar-menu">
    <ul class="nk-menu">
        @foreach ($menus as $key => $menu)
        @if (in_array(auth()->user()->type ,explode(',',$menu->access)))
        <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">{{ $menu->name }}</h6>
        </li><!-- .nk-menu-item -->
        @foreach ($menu->sub_menu as $key => $sub_menu)
        @if (in_array(auth()->user()->type, explode(',', $sub_menu->access)))
        <li
            class="nk-menu-item {{ in_array($sub_menu->slug, array_slice(explode('/', request()->url()), 3)) ? 'active' : '' }}">
            <a
                href="{{ route($sub_menu['url']) }}"
                class="nk-menu-link"
            >
                <span class="nk-menu-icon">
                    {!! $sub_menu->icon !!}
                </span>
                <span class="nk-menu-text">{{ $sub_menu->name }}</span>
            </a>
        </li><!-- .nk-menu-item -->
        @endif
        @endforeach
        @endif
        @endforeach
    </ul><!-- .nk-menu -->
</div><!-- .nk-sidebar-menu -->
