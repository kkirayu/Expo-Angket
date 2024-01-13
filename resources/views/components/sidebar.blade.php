<!-- sidenav  -->
<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
            <img src="{{ asset('assets') }}/img/Kukicha.png"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Expo Dashboard</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ Request::is('Admin') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fas fa-house"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft  {{ Request::is('Admin') ? 'text-white' : '' }}">Dashboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ Request::is('table') || Request::is('createAcara') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }}"
                    href="{{ route('table') }}">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft  {{ Request::is('table') || Request::is('createAcara') ? 'text-white' : '' }}">Acara</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ Request::is('tableSoal') || Request::is('soals*') || Request::is('soals/*/edit') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }}"
                    href="{{ route('tableSoal') }}">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft  {{ Request::is('tableSoal') || Request::is('soals*') || Request::is('soals/*/edit') ? 'text-white' : '' }}">Soal</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ Request::is('role*') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }}"
                    href="{{ route('roles.index') }}">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft  {{ Request::is('role*') ? 'text-white' : '' }}">Role</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ Request::is('user*') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 bg-gradient-to-tl from-purple-700 to-pink-500 ' : '' }}"
                    href="{{ route('profile.index') }}">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft  {{ Request::is('user*') ? 'text-white' : '' }}">Users</span>
                </a>
            </li>


</aside>

<!-- end sidenav -->
