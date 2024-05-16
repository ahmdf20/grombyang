@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-content-body">
            <div class="nk-block-between mb-3">
                <div class="nk-block-head-content">
                    <h3 class="text-primary">Products</h3>
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
                                        href="{{ route('product.bin') }}"
                                        class="btn btn-danger d-none d-md-inline-flex"
                                    ><em class="icon ni ni-trash"></em><span>Bin</span></a>
                                </li>
                                <li class="nk-block-tools-opt">
                                    <a
                                        href="{{ route('product.add') }}"
                                        class="btn btn-primary d-none d-md-inline-flex"
                                    ><em class="icon ni ni-plus"></em><span>Add Product</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table
                            class="datatable-init-export nowrap table"
                            data-export-title="Export"
                        >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @foreach ($product->categories as $key => $category)
                                        <span class="badge rounded-pill bg-primary">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $product->stock }}</td>
                                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill {{ $product->status == 'active' ? 'bg-success' : 'bg-secondary' }}"
                                        >{{ ucfirst($product->status) }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a
                                                class="btn btn-light dropdown-toggle"
                                                href="#"
                                                type="button"
                                                data-bs-toggle="dropdown"
                                            >
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul class="link-list-opt">
                                                    <li><a
                                                            href="{{ route('product.detail', ['uuid' => $product->uuid]) }}"><span>Detail</span></a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('product.edit', ['uuid' => $product->uuid]) }}"><span>Edit</span></a>
                                                    </li>
                                                    <li><a
                                                            href="#"
                                                            onclick="handleDelete('{{ $product->uuid }}')"
                                                        ></em><span>Hapus</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
<!-- content @e -->

<script>
    function handleDelete(uuid) {
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}/product/delete/${uuid}`,
                    method: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: `{{ csrf_token() }}`
                    },
                    success: function(result1) {
                            Swal.fire({
                                title: result1.title,
                                text: result1.text,
                                icon: result1.icon
                            }).then((result2) => {
                                if (result2.isConfirmed) {
                                    window.location.reload()
                                }
                            });
                    },
                    error: (error) => console.error(error)
                })
            }
            // if (result.isConfirmed) {
            //     Swal.fire({
            //     title: "Deleted!",
            //     text: "Your file has been deleted.",
            //     icon: "success"
            //     });
            // }
        });
    }
</script>

@endsection
