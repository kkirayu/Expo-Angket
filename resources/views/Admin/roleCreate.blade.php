@extends('layouts.template')
@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <h3>Role</h3>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
        <div class="mt-4 p-0 overflow-x-auto">
            <div class="container mt-4">
                <h4>Tambah Role</h4>

                 <x-input-error :messages="$errors->all()" />

                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    
                    <div class="mb-4">
                        <input type="text" name="role" placeholder="Role" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Submit</button>
                    </div>
                </form>

            </div>

        </div>
        </div>
    </div>
    </div>
</div>
@endsection