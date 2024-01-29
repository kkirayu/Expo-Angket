@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Jawaban" icon="bx bx-box" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Jawaban {{ $judul }}</h5>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Angket</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawabans as $index => $jawaban)
                                <tr>
                                    <td width="5%">#{{ $index + 1 }}</td>
                                    <td width="15%" style="white-space:normal;">{{ $jawaban->role->role }}</td>
                                    <td width="35%" style="white-space:normal;">{{ $jawaban->nama }}</td>
                                    <td width="30%" style="white-space:normal;">{{ $jawaban->email }}</td>
                                    <td width="15%" style="white-space:normal;">
                                        @if ($jawaban->jawaban <= 25)
                                            <span class="badge bg-danger text-white">Sangat Kurang Baik</span>
                                        @elseif ($jawaban->jawaban > 25 && $jawaban->jawaban <= 50)
                                            <span class="badge bg-danger text-white">Kurang Baik</span>
                                        @elseif ($jawaban->jawaban > 50 && $jawaban->jawaban <= 75)
                                            <span class="badge bg-warning text-white">Baik</span>
                                        @elseif ($jawaban->jawaban > 75 )
                                            <span class="badge bg-success text-white">Sangat Baik</span>
                                        @endif
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
