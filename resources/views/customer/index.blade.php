@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-content-body">
            <div class="nk-block-between mb-3">
                <div class="nk-block-head-content">
                    <h3 class="text-primary">Customers</h3>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Restricted</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill {{ $user->is_restricted == 0 ? 'bg-success' : 'bg-danger' }}"
                                        >{{ $user->is_restricted == 0 ? 'Clear' : 'Restricted' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill {{ $user->status == 'active' ? 'bg-success' : 'bg-secondary' }}"
                                        >{{ ucfirst($user->status) }}</span>
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
                                                    @if ($user->is_restricted == 0)
                                                    <li>
                                                        <a
                                                            href="#"
                                                            onclick="handleRestrict('{{ $user->uuid }}')"
                                                        ><span>Restrict
                                                                This Account</span></a>
                                                    </li>
                                                    @endif
                                                    @if ($user->is_restricted == 1)
                                                    <li>
                                                        <a
                                                            href="#"
                                                            onclick="handleUnrestrict('{{ $user->uuid }}')"
                                                        ><span>Unrestrict</span></a>
                                                    </li>
                                                    @endif
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
    function handleRestrict(uuid) {
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}/customer/restrict/${uuid}`,
                    method: 'POST',
                    data: {
                        _method: 'PUT',
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
        });
    }

    function handleUnrestrict(uuid) {
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ config('app.url') }}/customer/unrestrict/${uuid}`,
                    method: 'POST',
                    data: {
                        _method: 'PUT',
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
        });
    }
</script>

@endsection
