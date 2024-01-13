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
                    <h3>Tambah Soal</h3>


                    <div class="mb-5">
                        @if (session('success'))
                            <div class="bg-green-500 text-white p-3 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-500 text-white p-3 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>


                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('soalStore') }}">
                        @csrf

                        <div id="divSoal">
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acara</label>
                                <select name="acara_id[]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($acaras as $acara)
                                        <option value="{{ $acara->id }}">{{ $acara->nama_acara }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-5 mt-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                                <textarea name="pertanyaan[]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>

                            <div class="mb-5 mt-2">
                                <labelclass="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                                <input type="text" name="jawaban[]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="mb-5 mt-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>

                                <div class="flex flex-wrap gap-4">
                                    @foreach ($getRoles as $role)
                                        <div class="flex items-center">
                                            <input type="checkbox" class="block w-full" name="roles[][]" value="{{ $role->id }}" class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <label class="ml-2 text-sm text-gray-700 dark:text-white">{{ $role->role }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="h-px my-8 bg-gray-200">
                        <div id="clone" class="mt-5 mt-4">

                        </div>


                        <div class="mb-4 mt-4">
                            <button type="button" id="tambahSoal" class="mb-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                                Tambah Soal
                            </button>
                            <button type="submit" class="mb-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
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
    @push('custom-script')
        <script>
            $("#tambahSoal").click(function(){
                $('#divSoal').clone().appendTo('#clone');
            });
        </script>
    @endpush
@endsection
