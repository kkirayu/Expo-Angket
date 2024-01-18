@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="User" icon="bx bx-user" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List User</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            <button type="button" onclick="window.location.href='{{ route('admin-user.create') }}'"
                                class="btn btn-primary">Tambah User</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="30%" style="white-space:normal;">{{ $user->name }}</td>
                                    <td width="30%" style="white-space:normal;">{{ $user->email }}</td>
                                    <td width="15%" style="white-space:normal;">{{ $user->roles->role }}</td>
                                    <td width="10%">
                                        <div class="d-flex order-actions " >
                                            @if ($user->role_id != 1)
                                            <a href="{{ route('admin-user.edit', encrypt($user->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                            <a href="{{ route('admin-user.destroy', encrypt($user->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Hapus"><i class="bx bx-trash"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
