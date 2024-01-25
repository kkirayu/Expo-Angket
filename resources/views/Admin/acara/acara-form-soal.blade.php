@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Acara" icon="bx bx-calendar-event" subsub="{{ isset($edit) ? 'Edit Soal' : 'Tambah Soal' }}" />

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ isset($edit) ? 'Edit' : 'Tambah' }} Soal Angket {{ $getAcara->nama_acara }}</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm"
                                    action="{{ isset($edit) ? route('admin.soal-update', $edit->id) : route('admin.soal-store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PUT')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                        <input type="hidden" value="{{ $getAcara->slug }}" name="slug" />
                                    @endif
                                    <div id="divSoal">
                                        <input type="text" name="req[0][acara_id]" value="{{ $getAcara->id }}" hidden>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Pertanyaan</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <textarea name="req[0][pertanyaan]" class="form-control" placeholder="Pertanyaan">{{ old('pertanyaan', isset($edit) ? $edit->pertanyaan : '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Pilih Role</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                            @foreach ($getRoles as $id => $role)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="req[0][role][]"
                                                        id="req[0][role][]" value="{{ old('req[0][role][]', $role->id) }}"
                                                        @isset($edit)
                                                            @checked(in_array($role->id, old('req[0][role][]',json_decode( $edit->role_id))))>
                                                        @endisset
                                                    <label class="form-check-label"
                                                        for="req[0][role][]">{{ $role->role }}</label>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7"><p {{ isset($edit) ? 'hidden' : '' }}>*Untuk menginputkan beberapa pertanyaan klik tombol <b>Tambah Pertanyaan</b></p></div>
                                        <div class="col-sm-5 text-secondary" style="text-align: right;">
                                            <button type="button" id="tambahSoal" class="btn btn-secondary" {{ isset($edit) ? 'hidden' : '' }}>Tambah
                                                Pertanyaan</button>
                                            <input type="submit" class="btn btn-success px-4"
                                                value="Submit Soal" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('custom-script')
    <script>
        var i = 0;
        var u = 1;
        $("#tambahSoal").click(function() {
            ++i;
            ++u;
            $('#divSoal').append(`
            <hr>
            <input type="text" name="req[`+ i +`][acara_id]" value="{{ $getAcara->id }}" hidden>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Pertanyaan `+ u +`</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <textarea name="req[`+ i +`][pertanyaan]" class="form-control" placeholder="Pertanyaan `+ u +`">{{ old('pertanyaan', isset($edit) ? $edit->pertanyaan : '') }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Pilih Role</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                @foreach ($getRoles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="req[`+ i +`][role][]"
                            id="req[`+ i +`][role][]" value="{{ old('req[`+ i +`][role][]', $role->id) }}">
                        <label class="form-check-label"
                            for="req[`+ i +`][role][]">{{ $role->role }}</label>
                    </div>
                @endforeach
                </div>
            </div>
        `);
        });
    </script>
    @endpush
@endsection
