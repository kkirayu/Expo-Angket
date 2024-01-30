@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Role" icon="bx bx-shield" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Role {{ $judul->nama_acara }}</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm"
                                    action="{{ isset($edit) ? route('admin-roles.update', $edit->id) : route('admin-roles.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PUT')
                                        <input type="hidden" value="{{ $judul->slug }}" name="slug" />
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <input type="hidden" value="{{ old('role', isset($edit) ? $edit->role : $acara) }}"
                                        name="acara" />
                                    <div id="divRole">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nama Role</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <input type="text" name="req[0][role]" class="form-control"
                                                    value="{{ old('role', isset($edit) ? $edit->role : '') }}"
                                                    placeholder="Ex: Pengunjung" />
                                                @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7"><p {{ isset($edit) ? 'hidden' : '' }}>*Untuk menginputkan beberapa role klik tombol <b>Tambah Role</b></p></div>
                                        <div class="col-sm-5 text-secondary" style="text-align: right;">
                                            <button type="button" id="tambahRole" class="btn btn-secondary" {{ isset($edit) ? 'hidden' : '' }}>Tambah
                                                Role</button>
                                            <input type="submit" class="btn btn-success px-4"
                                                value="Submit Role" />
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
        $("#tambahRole").click(function() {
            ++i;
            ++u;
            $('#divRole').append(`
            <hr>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Nama Role `+ u +`</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="req[`+ i +`][role]" class="form-control"
                        value="{{ old('role', isset($edit) ? $edit->role : '') }}"
                        placeholder="Ex: Pengunjung" />
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        `);
        });
    </script>
    @endpush
@endsection
