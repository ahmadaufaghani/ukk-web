<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna_all = User::all();
        return view('admin.anggota.index',[
            'title'=>'Anggota'
        ], compact('pengguna_all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggota.create',[
            'title'=>'Tambah Anggota'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_anggota = validator($request->all(), [
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'status'=>'required'
        ]);

        if ($validasi_anggota->fails()) {
            return back()->withInput()->withErrors($validasi_anggota);
        }

        $validated = $validasi_anggota->validated();
        $validated["password"] = Hash::make($request->password);
        User::create($validated);
        toastr()->success('Data berhasil ditambahkan!');
        return redirect('/anggota');
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
        $anggota_update = User::find($id);
        return view('admin.anggota.edit',[
            'title'=>'Perbarui Anggota'
        ], compact('anggota_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggota_update_final = User::find($id);
        $validasi = validator($request->all(),[
            'name'=>'required',
            'username'=>'required',
            'status'=>'required'
        ]);
        
        if($validasi->fails()) {
            return back()->withInput()->withErrors($validasi);
        }

        $validasi_final = $validasi->validated();
        $anggota_update_final->name = $validasi_final["name"];
        $anggota_update_final->username = $validasi_final["username"];
        $anggota_update_final->status = $validasi_final["status"];
        $anggota_update_final->update();
        $anggota_update_final->save();
        toastr()->success('Data berhasil diperbarui!');
        return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota_delete_final = User::find($id);
        $anggota_delete_final->delete();
        toastr()->success('Data berhasil dihapus!');
        return redirect('/anggota');
    }

    public function tampilan_update_passsword(string $id) {
        $pengguna_update_reset = User::find($id);
        return view('admin.anggota.resetpassword',[
            'title'=>'Perbarui Kata Sandi'
        ], compact('pengguna_update_reset'));
    }

    public function update_password(Request $request, $id)
    {
       $password_update = User::findOrFail($id);
       $current_password = $request->current_password;
       $validasi_password = $request->validate([
            'current_password' => ['required','min:4'],
            'password' => ['required','min:4'],
            'password_confirmation' => ['required','same:password','min:4']
       ]);

       if(Hash::check($current_password, $password_update->password)) {
        $password_update->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect('/anggota')->with('success', 'Password berhasil diganti!');
       } else {
        throw ValidationException::withMessages([
            "current_password" => "The password doesn't match in our database"
        ]);
       }
    }
}
