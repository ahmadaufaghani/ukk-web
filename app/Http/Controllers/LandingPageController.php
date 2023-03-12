<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Galeri;
use App\Models\Transaksi;
use App\Models\Sampul;
use App\Models\Fitur;
use DB;
use Auth;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku_terbaru = Buku::orderBy('created_at','desc')->limit(8)->get();
        $penulis_buku = Buku::select('pengarang')->limit(5)->distinct()->get();
        $sampul_all = Sampul::all();
        $fitur_all = Fitur::all();
        $galeri_all = Galeri::all();
        return view('index',[
            'title'=>'Beranda'
        ], compact('buku_terbaru','galeri_all','penulis_buku','sampul_all','fitur_all'));
    }

    public function buku_index() {
        $buku_all = Buku::all();
        return view('buku',[
            'title'=>'Buku'
        ], compact('buku_all'));
    }

    public function cari_buku(Request $request) {
        $nama_buku = $request->judul;
        $buku_all = Buku::where('judul','like','%'.$nama_buku.'%')->get();
        return view('cari-buku', [
            'title'=>'Buku'
        ], compact('buku_all','nama_buku'));
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
        $buku_pinjam = Buku::find($id);
        return view('pinjam',[
            'title'=>'Pinjam'
        ], compact('buku_pinjam'));
    }

    public function show_pinjam(string $id)
    {
        $pinjaman_pengguna =  DB::select("SELECT buku.*, transaksi.id AS transaksiId, transaksi.tgl_kembali  FROM `transaksi` LEFT JOIN buku ON buku.id = transaksi.buku_id LEFT JOIN users ON users.id = transaksi.users_id WHERE users.id = '$id' AND transaksi.status = 'pinjam';");
        return view('pinjaman',[
            'title'=>'Pinjaman'
        ], compact('pinjaman_pengguna'));
    }

    public function kembalikan_pinjaman(string $id)
    {
        $kembali_pinjaman =  Transaksi::find($id);
        $kembali_pinjaman->status = 'kembali';
        $kembali_pinjaman->update();
        $kembali_pinjaman->save();
        return redirect('/data_pinjam/'.Auth::user()->id);
    }

    public function cari_penulis(string $nama) {
        $buku_penulis = Buku::where('pengarang',$nama)->get();
        return view('cari-penulis',[
            'title'=>'Pencarian Penulis'
        ], compact('buku_penulis','nama'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
