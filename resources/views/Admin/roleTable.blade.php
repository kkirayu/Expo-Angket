@extends('layouts.template')
@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
      <h6>Role Table</h6>
      <button type="button" onclick="window.location.href='{{ route('roles.create') }}'" class="mb-4 mt-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
        Tambah Role
    </button>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Role</th>
              <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($role as $r)
            <tr>
              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <div class="flex px-2 py-1">
                  <div class="flex flex-col justify-center">
                    <h6 class="mb-0 leading-normal text-sm">{{ $r->id}}</h6>
                  </div>
                </div>
              </td>
              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <p class="mb-0 font-semibold leading-tight text-xs">{{ $r->role }}</p>
              </td>

              <td class="px-6 py-4">
                <div class="flex space-x-4">
                    <a href="{{ route('roles.edit', $r) }}"
                      class="mr-4 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        Edit
                    </a>
            
                    <form action="{{ route('roles.destroy', $r) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                            Delete
                        </button>
                    </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  
@endsection