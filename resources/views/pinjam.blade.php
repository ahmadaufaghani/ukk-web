@extends('layouts.layouts')
@section('content')
<main id="main">
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0; margin-top: 80px;">
      <div class="container mt-5 mb-5 pe-0">
        <h5 style="color:#0387BF;margin-bottom:25px;font-weight: 600;">Formulir Peminjaman Buku</h5>
        <form action="/pinjam/simpan" method="POST">
        @csrf
        <div class="col-lg-12 col-md-12 col-12 mt-2 me-2 pe-3">
            <div class="col-lg-12 col-md-12 d-flex">
                    <div class="col-lg-6 col-md-6 col-6 me-lg-1 me-md-1 me-1">
                        <label class="form-label">Buku</label>
                    <select name="buku_id" class="form-control mb-3 @error('buku_id') is-invalid @enderror">
                        <option value="{{$buku_pinjam->id}}" hidden>{{$buku_pinjam->judul}}</option>
                    </select>
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam">
                </div>
                <input type="text" name="users_id" value="{{Auth::user()->id}}" hidden="">
                <div class="col-lg-6 col-md-6 col-6">
                    <label class="form-label">Jumlah Pinjaman</label>
                    <input type="number" class="form-control mb-3 @error('jumlah_pinjaman') is-invalid @enderror" name="jumlah_pinjaman" placeholder="Silahkan isi jumlah pinjaman">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali">
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="" hidden="">- Silahkan Pilih Status -</option>
                    <option value="pinjam">Pinjam</option>
                    <option value="kembali">Kembali</option>
                </select>
            </div>
            <div class="mt-4">
                <button class="pinjamButton w-100">Pinjam Buku</button>
            </div>
        </div>
        </form>
    </section><!-- End About Section -->
  </main><!-- End #main -->
@endsection()