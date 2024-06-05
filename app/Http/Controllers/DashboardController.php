<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin|pengurus|anggota');
    }

    public function index()
    {


        $totalPendaftar = Pendaftaran::all()->count();
        $totalDivisi = Divisi::all()->count();
        $pendaftarTerima = Pendaftaran::where('status', 'terima')->count();
        $pendaftarTolak = Pendaftaran::where('status', 'tolak')->count();

        $persentaseTerima = ($pendaftarTerima / $totalPendaftar) * 100;
        $persentaseTolak = ($pendaftarTolak / $totalPendaftar) * 100;

        // dd(auth()->user()->getRoleNames());

        // if (auth()->user()->can('view_dashboard')) {
        //     return view('dashboard.index', compact('totalPendaftar', 'totalDivisi', 'pendaftarTerima', 'pendaftarTolak', 'persentaseTerima', 'persentaseTolak'));
        // }
        // return abort(403); // keamanan lewat controller

        return view('dashboard.index', compact('totalPendaftar', 'totalDivisi', 'pendaftarTerima', 'pendaftarTolak', 'persentaseTerima', 'persentaseTolak'));

    }
}
