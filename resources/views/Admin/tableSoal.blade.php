@extends('layouts.template')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="mb-4">Tabel Soal</h6>
                    <button type="button" onclick="window.location.href='{{ route('soals.create') }}'"
                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        Tambah Soal
                    </button>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top mt-6 pl-4 border-gray-200 text-slate-500">
                            <thead class="">
                                <tr>
                                    <th class="text-left">Pertanyaan</th>
                                    <th class="text-left">Jawaban</th>
                                    <th class="text-left">Role</th>
                                    <th class="text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="align-bottom">
                                @foreach ($soal as $a)
                                    <tr>
                                        <td class="text-left">{{ $a->pertanyaan }}</td>
                                        <td class="text-left">{{ $a->jawaban }}</td>
                                        <td class="text-left">{{ $a->role }}</td>
                                        <td>
                                            <button type="submit" href="{{ route('soals.edit', ['soal' => $a->id]) }}"
                                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                                                Edit
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
