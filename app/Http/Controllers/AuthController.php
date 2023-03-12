<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function tampil_login() {
    return view('admin.login',[
        'title'=>'Login'
    ]);
   }

   public function tampil_login_pengguna() {
    return view('masuk',[
        'title'=>'Masuk'
    ]);
   }

   public function tampil_register_pengguna() {
    return view('daftar',[
        'title'=>'Daftar'
    ]);
   }

   public function register(Request $request) {
        $validasi_register = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        $validasi_register["password"] = Hash::make($request->password);
        User::create($validasi_register);

        return redirect('/login')->with('success','Pengguna berhasil dibuat!');
        
   }

   public function register_pengguna(Request $request) {
        $validasi_register = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        $validasi_register["password"] = Hash::make($request->password);
        User::create($validasi_register);

        return redirect('/masuk');
        toastr()->success('Berhasil daftar!');
   }

   public function login(Request $request) {
        $validasi_login = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($validasi_login)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            throw ValidationException::withMessages([
                "password"=>"Username atau password salah!"
            ]);
        }
   }

   public function login_pengguna(Request $request) {
        $validasi_login = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($validasi_login)) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            throw ValidationException::withMessages([
                "password"=>"Username atau password salah!"
            ]);
        }
   }

   public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login_admin');

   }
   public function logout_pengguna(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk');
        toastr()->success('Berhasil keluar!');

   }
}
