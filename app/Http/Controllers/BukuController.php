<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('admin.buku.index',[
            "title"=>"Buku"
        ], compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku.create',[
            "title"=>"Tambah Buku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku_validasi = $request->validate([
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'gambar'=>'required|max:2048',
            'stok'=>'required'
        ]);
        
        $nama_file = $request->gambar;
        $nama_file_akhir = time().rand(100,999).".".$nama_file->getClientOriginalName();
        if($request->file('gambar')) {
            $buku_validasi['gambar'] =  $nama_file_akhir;
            $request->file('gambar')->move('admin/img/buku/',$nama_file_akhir);
        }

        Buku::create($buku_validasi);
        return redirect('/buku')->with('success', 'Data berhasil ditambahkan!');
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
        $tampil_buku = Buku::find($id);
        return view('admin.buku.edit',[
            'title'=>'Perbarui Buku'
        ], compact('tampil_buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tampil_buku = Buku::find($id);
        $validasi_buku = $request->validate([
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'gambar'=>'max:2048',
            'stok'=>'required'
        ]);
        $tampil_buku->judul = $validasi_buku['judul'];
        $tampil_buku->pengarang = $validasi_buku['pengarang'];
        $tampil_buku->penerbit = $validasi_buku['penerbit'];
        $tampil_buku->stok = $validasi_buku['stok'];
        
        $nama_file = $tampil_buku->gambar;
        if($request->file('gambar')) {
            $buku_validasi['gambar'] =  $nama_file;
            $request->file('gambar')->move('admin/img/buku/',$nama_file);
        } else {
            $buku_validasi['gambar'] =  $nama_file;
        }
        $tampil_buku->update();
        $tampil_buku->save();
        return redirect('/buku')->with("Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tampil_buku = Buku::find($id);
        $file_location = public_path('admin/img/buku/').$tampil_buku->gambar;
        if(file_exists($file_location)) {
            @unlink($file_location);
        }
        $tampil_buku->delete();
        return redirect('/buku')->with("Data berhasil dihapus!");

    }
}
