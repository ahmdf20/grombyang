<nav
    style="--bs-breadcrumb-divider: '>';"
    aria-label="breadcrumb"
>
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
        <li class="breadcrumb-item">
            {{ $breadcrumb }}
        </li>
        @endforeach
    </ol>
</nav>
