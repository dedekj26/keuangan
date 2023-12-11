<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangan = Keuangan::all();

        return view('keuangan.index', compact('keuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('keuangan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
        ]);

        Keuangan::create([
            'id_kategori' => $request->id_kategori,
            'id_pengguna' => Auth::user()->id,
            'jumlah' => $request->jumlah,
            'tanggal' => Carbon::now(),
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);

        return redirect(route('keuangan.index'))->withSuccess('Data Keuangan baru berhasil dibuat');
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
    public function edit(Keuangan $keuangan)
    {
        $kategori = Kategori::all();

        return view('keuangan.edit', compact('keuangan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'id_kategori' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
        ]);

        $keuangan->update([
            'id_kategori' => $request->id_kategori,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);

        return redirect(route('keuangan.index'))->withSuccess('Data Keuangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect(route('keuangan.index'))->withSuccess('Data Keuangan berhasil dihapus');
    }
}
