@extends('layouts.template')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Tambah Soal</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="container">
                            <h4>Angket : {{ $getAcara->nama_acara }}</h4>


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
                                    <div class="mt-5 mt-4">

                                        <input type="text" name="req[0][acara_id]" value="{{ $getAcara->id }}"
                                            class="hidden">

                                        <div class="mb-5 mt-2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                                            <textarea name="req[0][pertanyaan]"
                                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                        </div>

                                        <div class="mb-5 mt-2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>

                                            <div class="flex flex-wrap gap-4">
                                                @foreach ($getRoles as $role)
                                                    <div class="flex items-center">
                                                        <input type="checkbox" class="block w-full" name="req[0][role][]"
                                                            value="{{ $role->id }}"
                                                            class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <label
                                                            class="ml-2 text-sm text-gray-700 dark:text-white">{{ $role->role }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr class="h-px my-8 bg-gray-200">
                                    </div>
                                </div>
                                {{-- <div id="clone" class="mt-5 mt-4">

                        </div> --}}


                                <div class="mb-4 mt-4">
                                    <button type="button" id="tambahSoal"
                                        class="mb-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                                        Tambah Soal
                                    </button>
                                    <button type="submit"
                                        class="mb-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
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
            var i = 0;
            $("#tambahSoal").click(function() {
                ++i;
                $('#divSoal').append(`
                <div class="mt-5 mt-4">

                    <input type="text" name="req[`+ i +`][acara_id]" value="{{ $getAcara->id }}" class="hidden">

                    <div class="mb-5 mt-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                        <textarea name="req[`+ i +`][pertanyaan]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>

                    <div class="mb-5 mt-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>

                        <div class="flex flex-wrap gap-4">
                            @foreach ($getRoles as $role)
                                <div class="flex items-center">
                                    <input type="checkbox" class="block w-full" name="req[`+ i +`][role][]" value="{{ $role->id }}" class="text-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label class="ml-2 text-sm text-gray-700 dark:text-white">{{ $role->role }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-200">
                    </div>
                `);
            });
        </script>
    @endpush
@endsection
