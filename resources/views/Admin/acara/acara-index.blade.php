@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Acara" icon="bx bx-calendar-event" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Acara</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            <button type="button" onclick="window.location.href='{{ route('admin.acara-create') }}'"
                                class="btn btn-primary">Tambah Acara</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Acara</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acaras as $index => $acara)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="30%">
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                <img src="{{ asset($acara->photo) }}" alt="">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{ $acara->nama_acara }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="45%" style="white-space:normal;">{{ $acara->deskripsi }}</td>
                                    <td width="10%" style="white-space:normal; text-align: center">
                                        @if ($acara->status == 1)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @elseif ($acara->status == 0)
                                            <span class="badge bg-danger text-white">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td width="10%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.role-acara', $acara->slug) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Tambah Role"><i class="bx bx-shield"></i></a>
                                            <a href="{{ route('admin.soal', $acara->slug) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Tambah Soal"><i class="bx bx-spreadsheet"></i></a>
                                            <a href="{{ route('admin.acara-edit', encrypt($acara->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                            <a href="{{ route('admin.acara-destroy', encrypt($acara->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="{{ $acara->status == 1 ? 'Non-aktifkan' : 'Aktfikan' }}"><i class="bx {{ $acara->status == 1 ? 'bx-message-square-x' : 'bx-message-square-check' }}"></i></a>
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
