<!DOCTYPE html>
<html
    lang="zxx"
    class="js"
>

<head>
    @include('layouts.partials.meta-dashboard')
</head>

<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->

        <div class="nk-main ">

            @include('layouts.partials.sidebar-dashboard')

            <!-- wrap @s -->
            <div class="nk-wrap ">


                @include('layouts.partials.navbar-dashboard')

                @yield('content')

                @include('layouts.partials.footer-dashboard')

            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    @include('layouts.partials.script-dashboard')
</body>

</html>
