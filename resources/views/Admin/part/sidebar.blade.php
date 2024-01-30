<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backadmin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="color: #02ba5a">EXPO<b style="color: #3d3d3d">2024</b></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li >
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="{{ Request::is('admin-acara*') ? 'mm-active' :'' }}">
            <a href="{{ route('admin.acara') }}">
                <div class="parent-icon"><i class='bx bx-calendar-event'></i>
                </div>
                <div class="menu-title">Acara</div>
            </a>
        </li>
        <li class="{{ Request::is('admin-roles*') ? 'mm-active' :'' }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-shield'></i>
                </div>
                <div class="menu-title">Role</div>
            </a>
            <ul>
                @php
                    $getAcara = App\Models\Acara::where('id','!=',1)->where('status','!=',0)->get();
                @endphp
                <li class="{{ Request::is('admin-roles/user/acara') ? 'mm-active' :'' }}"> <a href="{{ route('admin.role-acara', 'user') }}"><i class="bx bx-radio-circle"></i>Role Users</a>
                </li>
                @foreach ($getAcara as $acara)
                    <li class="{{ Request::is('admin-roles/'.$acara->slug.'/acara') ? 'mm-active' :'' }}"> <a href="{{ route('admin.role-acara', $acara->slug) }}"><i class="bx bx-radio-circle"></i>{{ $acara->nama_acara }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ Request::is('admin-soal*') ? 'mm-active' :'' }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-spreadsheet'></i>
                </div>
                <div class="menu-title">Soal Angket</div>
            </a>
            <ul>
                @php
                    $getAcara = App\Models\Acara::where('id','!=',1)->where('status','!=',0)->get();
                @endphp
                @foreach ($getAcara as $acara)
                    <li class="{{ Request::is('admin-soal/'.$acara->slug.'/acara') ? 'mm-active' :'' }}"> <a href="{{ route('admin.soal', $acara->slug) }}"><i class="bx bx-radio-circle"></i>{{ $acara->nama_acara }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ Request::is('admin-jawaban*') ? 'mm-active' :'' }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-box'></i>
                </div>
                <div class="menu-title">Jawaban</div>
            </a>
            <ul>
                @php
                    $getAcara = App\Models\Acara::where('id','!=',1)->where('status','!=',0)->get();
                @endphp
                @foreach ($getAcara as $acara)
                    <li class="{{ Request::is('admin-jawaban/'.$acara->slug.'/acara') ? 'mm-active' :'' }}"> <a href="{{ route('admin.jawaban-acara', $acara->slug) }}"><i class="bx bx-radio-circle"></i>{{ $acara->nama_acara }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ Request::is('admin-user*') ? 'mm-active' :'' }}">
            <a href="{{ route('admin-user.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
