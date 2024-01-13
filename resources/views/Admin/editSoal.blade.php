@extends('layouts.template')
@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <h6>Soal</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="container">
                <h1>Tambah Soal</h1>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="max-w-sm mx-auto" method="POST" action="{{ route('soals.update', $soal->id) }}">
                    @csrf
                    @method('PUT') {{-- Tambahkan metode PUT untuk formulir edit --}}

                    <div class="mb-5">
                        <label for="acara-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acara</label>
                        <select id="acara-id" name="acara_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($acaras as $acara)
                                <option value="{{ $acara->id }}" {{ $acara->id == $soal->acara_id ? 'selected' : '' }}>{{ $acara->nama_acara }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="pertanyaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                        <textarea id="pertanyaan" name="pertanyaan" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $soal->pertanyaan }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label for="jawaban" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                        <input type="text" id="jawaban" name="jawaban" value="{{ $soal->jawaban }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>

                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="role1" name="role[]" value="Role 1" {{ in_array('Role 1', explode(',', $soal->role)) ? 'checked' : '' }} class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="role1" class="ml-2 text-sm text-gray-700 dark:text-white">Role 1</label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="role2" name="role[]" value="Role 2" {{ in_array('Role 2', explode(',', $soal->role)) ? 'checked' : '' }} class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="role2" class="ml-2 text-sm text-gray-700 dark:text-white">Role 2</label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="role3" name="role[]" value="Role 3" {{ in_array('Role 3', explode(',', $soal->role)) ? 'checked' : '' }} class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="role3" class="ml-2 text-sm text-gray-700 dark:text-white">Role 3</label>
                            </div>
                        </div>
                    </div>



                    <div class="mb-5">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                    </div>
                </form>




            </div>

        </div>
        </div>
    </div>
    </div>
</div>
@endsection
