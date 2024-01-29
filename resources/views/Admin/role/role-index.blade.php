@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Role" icon="bx bx-shield" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Role {{ $judul }}</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            <button type="button" onclick="window.location.href='{{ route('admin.role-tambah', encrypt($getAcaraId->id)) }}'"
                                class="btn btn-primary">Tambah Role</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $index => $role)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="75%" style="white-space:normal;">{{ $role->role }}</td>
                                    <td width="10%" style="white-space:normal;">
                                        @if ($role->status == 1)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @elseif ($role->status == 1)
                                            <span class="badge bg-danger text-white">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td width="10%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin-roles.edit', encrypt($role->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                            <a href="{{ route('admin-roles.destroy', encrypt($role->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Hapus"><i class="bx bx-trash"></i></a>
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
