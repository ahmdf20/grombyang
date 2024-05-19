@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-content-body">
            <div class="nk-block-between mb-3">
                <div class="nk-block-head-content">
                    <h3 class="text-primary">Edit Product</h3>
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
                                        href="{{ route('product.index') }}"
                                        data-target="addProduct"
                                        class="btn btn-danger d-none d-md-inline-flex"
                                    ><span>Cancel</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <form
                            action="{{ route('product.update', ['uuid' => $product->uuid]) }}"
                            id="form_add_product"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label
                                            class="form-label"
                                            for="full-name-1"
                                        >Product Name</label>
                                        <div class="form-control-wrap">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                value="{{ old('name') ? old('name') : $product->name }}"
                                            >
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label
                                            class="form-label"
                                            for="email-address-1"
                                        >Price</label>
                                        <div class="form-control-wrap">
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="price"
                                                name="price"
                                                value="{{ old('price') ? old('price') : $product->price }}"
                                            >
                                            @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label
                                            class="form-label"
                                            for="weight"
                                        >Weight</label>
                                        <div class="form-control-wrap">
                                            <div class="input-group mb-1">
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    name="weight"
                                                    value="{{ old('weight') ? old('weight') : $product->weight }}"
                                                >
                                                @error('weight')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
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
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label
                                            class="form-label"
                                            for="preview-image"
                                        >Preview Image</label>
                                        <div class="form-control-wrap">
                                            <img
                                                src="{{ asset($product->image) }}"
                                                id="preview-image"
                                                alt="Preview Image"
                                                style="width: 20rem; height: 15rem; object-fit: cover;"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Categories</label>
                                        <ul class="custom-control-group g-3 align-center">
                                            @foreach ($categories as $key => $category)
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input"
                                                        id="categories[{{ $key }}]"
                                                        name="categories[{{ $key }}]"
                                                        value="{{ $category->id }}"
                                                        {{ $product->categories->contains($category->id) ? 'checked' : '' }}
                                                    >
                                                    <label
                                                        class="custom-control-label"
                                                        for="categories[{{ $key }}]"
                                                    >{{ $category->name }}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @error('categories')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="nk-block nk-block-lg">
                                    <label class="form-label">Description</label>
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <textarea
                                                name="description"
                                                id="description"
                                                class="summernote-minimal"
                                            >{{ old('description') ? old('description') : $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <button
                                            type="submit"
                                            class="btn btn-lg btn-primary"
                                        >Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .nk-block -->

        </div>
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
