@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-block nk-block-lg">
            <div class="col-sm-6 nk-block-between mb-3">
                <div class="nk-block-head-content">
                    <h3 class="text-primary">Edit Password Customer Service</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger toggle-expand me-n1"
                            data-target="pageMenu"
                        ><em class="icon ni ni-more-v"></em></a>
                        <div
                            class="toggle-expand-content"
                            data-content="pageMenu"
                        >
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a
                                        href="{{ route('cs.index') }}"
                                        class="btn btn-danger d-none d-md-inline-flex"
                                    ><span>Cancel</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
            <div class="row g-gs">
                <div class="col-lg-6">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <form
                                action="{{ route('cs.update-password', ['uuid' => $user->uuid]) }}"
                                enctype="multipart/form-data"
                                method="POST"
                            >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label
                                        class="form-label"
                                        for="new_password"
                                    >New Password</label>
                                    <div class="form-control-wrap">
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="new_password"
                                            name="new_password"
                                        >
                                        @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="form-label"
                                        for="repeat_password"
                                    >Repeat Password</label>
                                    <div class="form-control-wrap">
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="repeat_password"
                                            name="repeat_password"
                                        >
                                        @error('repeat_password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        class="btn btn-lg btn-primary"
                                    >Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->

    </div>
</div>
<!-- content @e -->

<script>
    $('#upload').on('change', function() {
        const file = this.files[0]
        const canvas = document.getElementById('preview-image')
        if (file) canvas.src = URL.createObjectURL(file)
    })
</script>

@endsection
