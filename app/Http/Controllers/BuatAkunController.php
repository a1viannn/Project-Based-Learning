<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuatAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtAnggota = Pendaftaran::all();
        return view('buatAkun.index', compact('dtAnggota'));
    }

    public function detail($id){
        $detail = Pendaftaran::where('id', $id)->first();
        return view('buatAkun.detail', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftaran::find($id);
        $pendaftar->update([
            'jabatan_2' => $request->input('jabatan_2'),
        ]);

        return redirect()->route('pengurus')->withSuccess('Jabatan Berhasil Diubah.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
