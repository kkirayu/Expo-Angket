@extends('Admin.admin-dashboard')
@section('content')
    <div class="page-content">
        <x-breadcrumb sub="User" icon="bx bx-user" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} User</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm"
                                    action="{{ isset($edit) ? route('admin-user.update', $edit->id) : route('admin-user.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PUT')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama User</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ old('nama', isset($edit) ? $edit->name : '') }}"
                                                placeholder="Ex: Budi" />
                                                @error('nama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', isset($edit) ? $edit->email : '') }}"
                                                placeholder="Ex: example@mail.com" />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="password" name="password" class="form-control"
                                                value="" />
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirmasi Password</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="password" name="cpassword" class="form-control"
                                                value="" />
                                                @error('cpassword')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Role</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="role" class="form-control" required="">
                                                <option value="" readonly>--Pilih--</option>
                                                @foreach ($role as $r)
                                                    <option value="{{ $r->id }}"
                                                        {{ isset($edit) && $edit->role_id === $r->id ? 'selected' : '' }}>
                                                        {{ $r->role }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7"><p {{ isset($edit) ? '' : 'hidden' }}>*<b>Password</b> boleh dikosongkan jika tidak ingin mengganti password</p></div>
                                        <div class="col-sm-5 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4"
                                                value="{{ isset($edit) ? 'Ubah User' : 'Tambah User' }}" />
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

@endsection
