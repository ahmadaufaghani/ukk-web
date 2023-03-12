<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitur;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.create-fitur',[
            'title'=>'Tambah Fitur'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_fitur = validator($request->all(),[
            "judul"=>"required",
            "deskripsi"=>"required",
            "gambar"=>"required|max:2048"
        ]);

        if($validasi_fitur->fails()) {
            return back()->withInput()->withErrors($validasi_fitur);
        }
        $validasi_fitur_final = $validasi_fitur->validated();
        
        $nama_gambar = $request->gambar;
        $nama_akhir = time().rand(100,999).".".$nama_gambar->getClientOriginalName();
        if($request->file('gambar')) {
            $validasi_fitur_final["gambar"] = $nama_akhir;
            $request->file('gambar')->move('admin/img/fitur/',$nama_akhir);
        }
        Fitur::create($validasi_fitur_final);
        toastr()->success("Data berhasil ditambahkan!");
        return redirect('/dashboard');
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
        $fitur_edit = Fitur::find($id);
        return view('admin.dashboard.edit-fitur',[
            'title'=>'Perbarui Fitur'
        ], compact('fitur_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fitur_update = Fitur::find($id);
        $validasi_fitur = validator($request->all(),[
            "judul"=>"required",
            "deskripsi"=>"required",
            "gambar"=>"max:2048"
        ]);
        if($validasi_fitur->fails()) {
            return back()->withInput()->withErrors($validasi_fitur);
        }
        $validasi_fitur_final = $validasi_fitur->validated();
        $nama_gambar = $fitur_update->gambar;
        if($request->file('gambar')) {
            $validasi_fitur_final["gambar"] = $nama_gambar;
            $request->file('gambar')->move('admin/img/fitur/',$nama_gambar);
        } else {
            $validasi_fitur_final["gambar"] = $nama_gambar;
        }
        $fitur_update->judul = $validasi_fitur_final["judul"];
        $fitur_update->deskripsi = $validasi_fitur_final["deskripsi"];
        $fitur_update->gambar = $validasi_fitur_final["gambar"];
        $fitur_update->update();
        $fitur_update->save();

        toastr()->success("Data berhasil diperbarui!");
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fitur_delete = Fitur::find($id);
        $file_gambar = public_path('admin/img/fitur/').$fitur_delete->gambar;
        if(file_exists($file_gambar)) {
            @unlink($file_gambar);
        }
        $fitur_delete->delete();
        toastr()->success('Data berhasil dihapus!');
        return redirect('/dashboard');
    }
}
