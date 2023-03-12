@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <b>Perbarui Password</b>
            </div>
            <div class="card-body">
                <form action="/anggota/perbarui_katasandi/{{$pengguna_update_reset->id}}" method="POST">
                    @csrf
                    <label class="form-label">Kata Sandi Saat Ini</label>
                    <input type="password" class="form-control mb-3 @error('current_password') is-invalid @enderror" name="current_password" placeholder="Silahkan masukkan password saat ini">
                    @error('current_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 
                    <label class="form-label">Kata Sandi  Baru</label>
                    <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" placeholder="Silahkan masukkan password baru">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 
                    <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" class="form-control mb-3 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Silahkan masukkan konfirmasi password baru">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger mr-2" href="/anggota">Kembali</a>
                        <button class="btn btn-sm btn-warning" type="submit">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection