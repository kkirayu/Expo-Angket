@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Soal" icon="bx bx-spreadsheet" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Soal Angket {{ $judul }}</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            @if ($countRoleAcara != 0)
                                <button type="button" onclick="window.location.href='{{ route('admin.acara-soal', encrypt($getAcaraId->id)) }}'"
                                    class="btn btn-primary">Tambah Soal</button>
                            @else
                                <button type="button" onclick="window.location.href='{{ route('admin.role-tambah', encrypt($getAcaraId->id)) }}'"
                                    class="btn btn-primary">Tambah Role Terlebih Dahulu</button>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Pertanyaan</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soal as $index => $a)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="50%" style="white-space:normal;">{{ $a->pertanyaan }}</td>
                                    <td width="25%" style="white-space:normal;">
                                        @foreach (json_decode($a->role_id, true) as $ar)
                                            @foreach ($getRole as $ro)
                                                @if ($ro->id == json_decode($ar, true))
                                                    <span class="badge bg-info text-white">{{ $ro->role }}</span>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td width="10%" style="white-space:normal; text-align: center">
                                        @if ($a->status == 1)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @elseif ($a->status == 0)
                                            <span class="badge bg-danger text-white">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td width="10%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.soal-edit', encrypt($a->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                                <a href="{{ route('admin.soal-destroy', encrypt($a->id)) }}"
                                                    class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                    title="{{ $a->status == 1 ? 'Non-aktifkan' : 'Aktfikan' }}"><i class="bx {{ $a->status == 1 ? 'bx-message-square-x' : 'bx-message-square-check' }}"></i></a>
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
