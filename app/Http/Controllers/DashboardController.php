<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampul;
use App\Models\Fitur;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampul_all = Sampul::all();
        $fitur_all = Fitur::all();
        return view('admin.dashboard.index',[
            'title'=>'Dashboard'
        ], compact('sampul_all','fitur_all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.create',[
            'title'=>'Tambah Sampul'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_sampul = validator($request->all(),[
            "judul"=>"required",
            "deskripsi"=>"required",
            "gambar"=>"required|max:2048"
        ]);

        if($validasi_sampul->fails()) {
            return back()->withInput()->withErrors($validasi_sampul);
        }
        $validasi_sampul_final = $validasi_sampul->validated();
        
        $nama_gambar = $request->gambar;
        $nama_akhir = time().rand(100,999).".".$nama_gambar->getClientOriginalName();
        if($request->file('gambar')) {
            $validasi_sampul_final["gambar"] = $nama_akhir;
            $request->file('gambar')->move('admin/img/sampul/',$nama_akhir);
        }
        Sampul::create($validasi_sampul_final);
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
        $sampul_edit = Sampul::find($id);
        return view('admin.dashboard.edit',[
            'title'=>'Perbarui Sampul'
        ], compact('sampul_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sampul_update = Sampul::find($id);
        $validasi_sampul = validator($request->all(),[
            "judul"=>"required",
            "deskripsi"=>"required",
            "gambar"=>"max:2048"
        ]);
        if($validasi_sampul->fails()) {
            return back()->withInput()->withErrors($validasi_sampul);
        }
        $validasi_sampul_final = $validasi_sampul->validated();
        $nama_gambar = $sampul_update->gambar;
        if($request->file('gambar')) {
            $validasi_sampul_final["gambar"] = $nama_gambar;
            $request->file('gambar')->move('admin/img/sampul/',$nama_gambar);
        } else {
            $validasi_sampul_final["gambar"] = $nama_gambar;
        }
        $sampul_update->judul = $validasi_sampul_final["judul"];
        $sampul_update->deskripsi = $validasi_sampul_final["deskripsi"];
        $sampul_update->gambar = $validasi_sampul_final["gambar"];
        $sampul_update->update();
        $sampul_update->save();

        toastr()->success("Data berhasil diperbarui!");
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sampul_delete = Sampul::find($id);
        $file_gambar = public_path('admin/img/sampul/').$sampul_delete->gambar;
        if(file_exists($file_gambar)) {
            @unlink($file_gambar);
        }
        $sampul_delete->delete();
        toastr()->success('Data berhasil dihapus!');
        return redirect('/dashboard');
    }
}
