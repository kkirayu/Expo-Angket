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
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Pertanyaan</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soal as $index => $a)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="55%" style="white-space:normal;">{{ $a->pertanyaan }}</td>
                                    <td width="30%" style="white-space:normal;">
                                        @foreach ($a->role as $ar)
                                            @foreach ($getRole as $ro)
                                                @if ($ro->id == $ar)
                                                    <span class="badge bg-info text-white">{{ $ro->role }}</span>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td width="10%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.soal-edit', encrypt($a->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                            <a href="{{ route('acaras.destroy', encrypt($a->id)) }}"
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
