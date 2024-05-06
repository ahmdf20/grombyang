@if (Session::get('text'))
<script>
    Swal.fire({
        title: `{{ Session::get('title') }}`,
        icon: `{{ Session::get('icon') }}`,
        text: `{{ Session::get('text') }}`,
    })
</script>
@endif

<script>
    function handleLogout() {
        Swal.fire({
            title: "Leave the session?",
            text: "Are you sure wan't leave the session?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Leave!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ config('app.url') }}/logout`
                }
            });
    }
</script>
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{ asset('etrade') }}/assets/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="{{ asset('etrade') }}/assets/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('etrade') }}/assets/js/vendor/popper.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/slick.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/js.cookie.js"></script>
<!-- <script src="{{ asset('etrade') }}/assets/js/vendor/jquery.style.switcher.js"></script> -->
<script src="{{ asset('etrade') }}/assets/js/vendor/jquery-ui.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/jquery.countdown.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/sal.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/counterup.js"></script>
<script src="{{ asset('etrade') }}/assets/js/vendor/waypoints.min.js"></script>

<!-- Main JS -->
<script src="{{ asset('etrade') }}/assets/js/main.js"></script>
