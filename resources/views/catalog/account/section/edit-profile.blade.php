<div
    class="tab-pane fade"
    id="nav-account"
    role="tabpanel"
>
    <div class="col-lg-9">
        <div class="axil-dashboard-account">
            <div class="row">
                <form
                    action="{{ route('profile.update') }}"
                    method="post"
                    id="form_update_profile"
                >
                    <div class="col-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                value="{{ auth()->user()->name }}"
                                required
                            >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                value="{{ auth()->user()->email }}"
                                required
                                readonly
                            >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input
                                type="text"
                                class="form-control"
                                id="phone"
                                value="{{ auth()->user()->phone }}"
                                required
                                readonly
                            >
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button
                            type="submit"
                            class="axil-btn"
                        >Update Profile</button>
                    </div>
                </form>
                <form
                    action="#"
                    method="post"
                    id="form_update_password"
                >
                    <div class="col-12">
                        <h5 class="title">Password Change</h5>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input
                                type="password"
                                id="old_password"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input
                                type="password"
                                id="new_password"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input
                                type="password"
                                id="repeat_password"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group mb--0">
                            <button
                                type="submit"
                                class="axil-btn"
                            >Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#form_update_profile').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: `{{ config('app.url') }}/my/profile/update`,
            method: 'POST',
            data: {
                _token: `{{ csrf_token() }}`,
                _method: 'PUT',
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val()
            },
            success: function(result) {
                Swal.fire({
                    title: result.title,
                    icon: result.icon,
                    text: result.text
                }).then((result1) => {
                    if (result1.isConfirmed) {
                        window.location.reload()
                    }
                })
            },
            error: (error) => console.error(error)
        })
    })

    $('#form_update_password').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: `{{ config('app.url') }}/my/profile/update-password`,
            method: 'POST',
            data: {
                _token: `{{ csrf_token() }}`,
                _method: 'PUT',
                old_password: $('#old_password').val(),
                new_password: $('#new_password').val(),
                repeat_password: $('#repeat_password').val(),
            },
            success: function(result) {
                Swal.fire({
                    title: result.title,
                    icon: result.icon,
                    text: result.text
                }).then((result1) => {
                    if (result1.isConfirmed) {
                        window.location.reload()
                    }
                })
            },
            error: (error) => console.error(error)
        })
    })
</script>
