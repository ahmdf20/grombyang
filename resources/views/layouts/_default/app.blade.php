<!doctype html>
<html
    class="no-js"
    lang="en"
>

<head>

    @include('layouts.partials.meta-app')

</head>


<body
    class="{{ !in_array(request()->route()->getName(), ['login', 'register']) ? 'sticky-header overflow-md-visible' : '' }}"
>
    </div>
    @if (!in_array(request()->route()->getName(), ['login', 'register']))
    <a
        href="#top"
        class="back-to-top"
        id="backto-top"
    >
        <i class="fal fa-arrow-up"></i>
    </a>

    @include('layouts.partials.header-app')
    @endif

    @yield('content')

    @if (!in_array(request()->route()->getName(), ['login', 'register']))
    @include('layouts.partials.footer-app')
    <x-modal-app />
    @endif

    @include('layouts.partials.script-app')

</body>

</html>
