<hr class="sidebar-divider my-0">



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item @if (request()->routeIs('pendaftaran', 'detail-terima', 'detail-tolak', 'detail-pendaftaran')) active @endif">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pendaftaran</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('pendaftaran') }}">Data Pendaftar</a>
            <a class="collapse-item" href="{{ route('detail-terima') }}">Diterima</a>
            <a class="collapse-item" href="{{ route('detail-tolak') }}">Ditolak</a>
        </div>
    </div>
</li>

<li class="nav-item @if (request()->routeIs('alat', 'create-alat', 'edit-alat')) active @endif">
    <a class="nav-link" href="{{ route('alat') }}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Alat</span></a>
</li>



<hr class="sidebar-divider my-0">



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item @if (request()->routeIs('peminjaman', 'pengembalian')) active @endif">
    <a class="nav-link collapsed " data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Transaksi</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('peminjaman') }}">Peminjaman Alat</a>
            <a class="collapse-item" href="{{ route('pengembalian') }}">Pengembalian Alat</a>
        </div>
    </div>
</li>
