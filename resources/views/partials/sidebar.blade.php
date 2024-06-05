<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-volleyball-ball"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UKM OLAHRAGA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- @if (auth()->check() && auth()->user()->current_role_id)
        @includeIf('layouts.menu.' . auth()->user()->currentRole->name)
    @endif --}}

    <!-- Menampilkan Navigasi Berdasarkan Role -->
    @if (auth()->check())
        @if (auth()->user()->current_role_id)
            @includeIf('layouts.menu.' . auth()->user()->currentRole->name)
        @elseif (auth()->user()->hasRole('admin'))
            @includeIf('layouts.menu.admin')
        @elseif (auth()->user()->hasRole('pengurus'))
            @includeIf('layouts.menu.pengurus')
        @elseif (auth()->user()->hasRole('anggota'))
            @includeIf('layouts.menu.anggota')
        @endif
    @endif



    <!-- Pembatas -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
