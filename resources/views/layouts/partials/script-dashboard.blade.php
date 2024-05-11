@if (session()->has('text'))
<script>
    Swal.fire({
        title: `{{ session()->get('title') }}`,
        icon: `{{ session()->get('icon') }}`,
        text: `{{ session()->get('text') }}`,
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
