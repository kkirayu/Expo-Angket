@extends('layouts.template')
@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <h3>User</h3>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
        <div class="mt-4 p-0 overflow-x-auto">
            <div class="container mt-4">
                <h4>Tambah User</h4>

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

                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Name" value="{{$user->name}}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email" value="{{$user->email}}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Password" value="{{$user->password}}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="pilihan" placeholder="Pilihan" value="{{$user->pilihan}}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <select name="role" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                            <option value="" disabled selected>---Pilih Role---</option>
                            @foreach($role as $item)
                                <option value="{{ $item->id}}" {{ $user->role_id == $item->id ? 'selected' : ''}}>{{ $item->role }}</option>
                            @endforeach
                        </select>
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
