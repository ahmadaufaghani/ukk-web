@extends('layouts.layouts')
@section('content')
<!-- ======= Hero Section ======= -->
<main id="main">
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0; margin-top: 80px;">
      <div class="container mt-5 mb-5 pe-0 d-flex justify-content-center">
        <div class="col-lg-4 col-md-12 col-10  mt-2 me-2">
            <div class="card shadow col-lg-12 col-md-12 d-flex p-3">
              <form action="/daftar/proses" method="POST">
                @csrf
                <h4 class="text-center">Daftar</h4>
                <div class="col-lg-12 col-md-12 col-12">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-3" name="name" placeholder="Silahkan isi nama">
                    <label class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control mb-3" name="username" placeholder="Silahkan isi nama pengguna">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control mb-3" name="password" placeholder="Silahkan kata sandi pengguna">
                </div>
                <div class="mt-4">
                  <button class="pinjamButton w-100">Daftar</button>
              </div>
              </form>
            </div>
            
            
        </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->
@endsection