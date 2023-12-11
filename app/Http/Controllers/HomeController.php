<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\Kategori;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $keuangan = Keuangan::all();
        $pdf = PDF::loadview('dashboard.report', ['keuangan' => $keuangan]);

        return $pdf->stream();
    }

    public function dashboard()
    {
        // data untuk card
        $uang_masuk = Keuangan::where('jenis', 0)->sum('jumlah');
        $uang_keluar = Keuangan::where('jenis', 1)->sum('jumlah');
        $kategori = Kategori::count();
        $pengguna = User::count();

        // data untuk pie chart
        $pie_label = [];
        $pie_data = [];
        $pie_color = [];
        foreach(Kategori::all() as $data) {
            $jumlah_data = Keuangan::where('id_kategori', $data->id)->count();
            array_push($pie_data, $jumlah_data);
            array_push($pie_label, $data->nama);
            array_push($pie_color, '#' . dechex(rand(0,10000000)));
        }

        // data untuk area chart
        $area_data = [];
        for ($i = 1; $i <= 12; $i++) {
            $jumlah_data = Keuangan::where('jenis', 0)->whereYear('tanggal', Carbon::now()->format('Y'))->whereMonth('tanggal', $i)->sum('jumlah');
            array_push($area_data, $jumlah_data);
        }

        return view('dashboard.index', compact([
            'uang_masuk', 'uang_keluar', 'kategori', 'pengguna', 'pie_label', 'pie_data', 'pie_color', 'area_data'
        ]));
    }

    public function import()
    {
        $kategori = Http::get('https://1e14a06a-e2b6-4d51-a56a-3a165dbd830e.mock.pstmn.io/api/kategori')->json();

        return view('import.index', ['kategori' => $kategori['data']]);
    }

    public function import_kategori()
    {
        $kategori = Http::get('https://1e14a06a-e2b6-4d51-a56a-3a165dbd830e.mock.pstmn.io/api/kategori')->json();

        foreach($kategori['data'] as $data) {
            Kategori::create([
                'nama' => $data['nama'],
            ]);
        }

        return redirect(url('/import'))->withSuccess('Data kategori berhasil diimport');
    }
}
