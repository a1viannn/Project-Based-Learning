<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <hr class="sidebar-divider my-0">

    <li class="nav-item @if (request()->routeIs('pengurus')) active @endif">
        <a class="nav-link" href="{{ route('pengurus') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Buat Akun</span></a>
    </li>


    <li class="nav-item  mb-0 @if (request()->routeIs('divisi', 'create-divisi', 'edit-divisi')) active @endif">
        <a class="nav-link" href="{{ route('divisi') }}">
            <i class="fas fa-shield-alt"></i>
            <span>Divisi</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('jadwal', 'create-jadwal', 'edit-jadwal')) active @endif">
        <a class="nav-link" href="{{ route('jadwal') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jadwal Latihan</span></a>
    </li>

</ul>
