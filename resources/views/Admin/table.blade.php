@extends('layouts.template')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="mb-4">Tabel Acara</h6>
                    <button type="button" onclick="window.location.href='{{ route('acaraCreate') }}'"
                        class="mb-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        Tambah Acara
                    </button>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2 mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Acara
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                            Soal Tersedia
                                        </th> --}}
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acaras as $a)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $a->nama_acara }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $a->deskripsi }}
                                        </td>

                                        {{-- <td class="px-6 py-4">
                                                {{  }}
                                            </td> --}}

                                        <td class="px-6 py-4">
                                            <button type="button"
                                                onclick="window.location.href='{{ route('soals.create') }}'"
                                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                                                Tambah Soal
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
