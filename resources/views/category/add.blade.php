@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-block nk-block-lg">
            <div class="col-sm-6 nk-block-between mb-3">
                <div class="nk-block-head-content">
                    <h3 class="text-primary">Add New Category</h3>
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
                                        href="{{ route('category.index') }}"
                                        data-target="addProduct"
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
                                action="{{ route('category.store') }}"
                                enctype="multipart/form-data"
                                method="POST"
                            >
                                @csrf
                                <div class="form-group">
                                    <label
                                        class="form-label"
                                        for="name"
                                    >Category Name</label>
                                    <div class="form-control-wrap">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                        >
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upload Image (max: 5MB)</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input
                                                type="file"
                                                class="form-file-input"
                                                id="upload"
                                                name="upload"
                                            />
                                            <label
                                                class="form-file-label"
                                                for="customFile"
                                            >Choose
                                                file</label>
                                            @error('upload')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="form-label"
                                        for="preview-image"
                                    >Preview Image</label>
                                    <div class="form-control-wrap">
                                        <img
                                            src="{{ asset('icon/no-image.jpeg') }}"
                                            id="preview-image"
                                            alt="Preview Image"
                                            style="width: 20rem; height: 15rem; object-fit: cover;"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        class="btn btn-lg btn-primary"
                                    >Submit</button>
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
