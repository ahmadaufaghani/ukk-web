<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\User;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi_semua =  DB::select("SELECT transaksi.*, users.name, buku.judul FROM `transaksi` LEFT JOIN buku ON buku.id = transaksi.buku_id LEFT JOIN users ON users.id = transaksi.users_id;");
        return view('admin.transaksi.index', [
            'title' => 'Peminjaman'
        ], compact('transaksi_semua'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku_all = Buku::all();
        $anggota_all = User::where('status','!=','admin')->get();
        return view('admin.transaksi.create', [
            'title' => 'Tambah Peminjaman'
        ], compact('buku_all','anggota_all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_transaksi = $request->validate([
            'buku_id' => 'required',
            'users_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
            'jumlah_pinjaman' => 'required',
        ]);

        Transaksi::create($validasi_transaksi);
        return redirect('/peminjaman')->with('success','Data berhasil ditambahkan!');
    }

    public function store_pengguna(Request $request)
    {
        $validasi_transaksi = $request->validate([
            'buku_id' => 'required',
            'users_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
            'jumlah_pinjaman' => 'required',
        ]);

        Transaksi::create($validasi_transaksi);
        return redirect('/semua_buku');
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
        $transaksi_update = DB::select("SELECT transaksi.*, users.name, buku.judul FROM `transaksi` LEFT JOIN buku ON buku.id = transaksi.buku_id LEFT JOIN users ON users.id = transaksi.users_id WHERE transaksi.id = '$id';");
        $buku_all = Buku::all();
        $anggota_all = User::where('status','!=','admin')->get();
        return view('admin.transaksi.edit',[
            'title' => 'Perbarui Peminjaman'
        ], compact('transaksi_update','buku_all','anggota_all'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $transaksi_update_final = Transaksi::find($id);
        $validasi_transaksi = $request->validate([
            'buku_id' => 'required',
            'users_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
            'jumlah_pinjaman' => 'required',
        ]);

        $transaksi_update_final->buku_id = $validasi_transaksi["buku_id"];
        $transaksi_update_final->users_id = $validasi_transaksi["users_id"];
        $transaksi_update_final->tgl_pinjam = $validasi_transaksi["tgl_pinjam"];
        $transaksi_update_final->tgl_kembali = $validasi_transaksi["tgl_kembali"];
        $transaksi_update_final->status = $validasi_transaksi["status"];
        $transaksi_update_final->jumlah_pinjaman =  $validasi_transaksi["jumlah_pinjaman"];

        $transaksi_update_final->update();
        $transaksi_update_final->save();
        return redirect('/peminjaman')->with('success','Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi_delete = Transaksi::find($id);
        $transaksi_delete->delete();
        return redirect('/peminjaman')->with('success','Data berhasil dihapus!');
    }
}
