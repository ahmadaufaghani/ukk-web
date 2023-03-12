<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri_all = Galeri::all();
       return view('admin.galeri.index',[
        'title'=>'Galeri'
       ], compact('galeri_all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create',[
            'title'=>'Tambah Galeri'
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_galeri = validator($request->all(),[
            "nama"=>"required",
            "gambar"=>"required|max:2048"
        ]);

        if($validasi_galeri->fails()) {
            return back()->withInput()->withErrors($validasi_galeri);
        }
        $validasi_galeri_final = $validasi_galeri->validated();
        
        $nama_gambar = $request->gambar;
        $nama_akhir = time().rand(100,999).".".$nama_gambar->getClientOriginalName();
        if($request->file('gambar')) {
            $validasi_galeri_final["gambar"] = $nama_akhir;
            $request->file('gambar')->move('admin/img/galeri/',$nama_akhir);
        }
        Galeri::create($validasi_galeri_final);
        toastr()->success("Data berhasil ditambahkan!");
        return redirect('/galeri');
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
        $galeri_edit = Galeri::find($id);
        return view('admin.galeri.edit', [
            'title'=>'Perbarui galeri'
        ], compact('galeri_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri_update = Galeri::find($id);
        $validasi_galeri = validator($request->all(),[
            "nama"=>"required",
            "gambar"=>"max:2048"
        ]);
        if($validasi_galeri->fails()) {
            return back()->withInput()->withErrors($validasi_galeri);
        }
        $validasi_galeri_final = $validasi_galeri->validated();
        $nama_gambar = $galeri_update->gambar;
        if($request->file('gambar')) {
            $validasi_galeri_final["gambar"] = $nama_gambar;
            $request->file('gambar')->move('admin/img/galeri/',$nama_gambar);
        } else {
            $validasi_galeri_final["gambar"] = $nama_gambar;
        }
        $galeri_update->nama = $validasi_galeri_final["nama"];
        $galeri_update->gambar = $validasi_galeri_final["gambar"];
        $galeri_update->update();
        $galeri_update->save();

        toastr()->success("Data berhasil diperbarui!");
        return redirect('/galeri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri_delete = Galeri::find($id);
        $file_gambar = public_path('admin/img/galeri/').$galeri_delete->gambar;
        if(file_exists($file_gambar)) {
            @unlink($file_gambar);
        }
        $galeri_delete->delete();
        toastr()->success('Data berhasil dihapus!');
        return redirect('/galeri');
    }
}
