@extends('layouts.layouts')
@section('content')
<main id="main">
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0; margin-top: 80px;">
      <div class="container mt-5 mb-5 pe-0">
        <div class="col-lg-2">
          <h5 style="color:#0387BF;margin-bottom:30px;font-weight: 600;">Daftar Pinjaman Buku</h5> 
        </div>
        <div class="row">
            @if(count($pinjaman_pengguna))
            @foreach($pinjaman_pengguna as $item)
            <div class="col-lg-3">
              <div class="card" style="width: 18rem;">
                <img src="{{asset('admin/img/buku/'.$item->gambar)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$item->judul}}</h5>
                  <p class="mb-3">{{$item->pengarang}}</p>
                  <p style="color : #ab1616;">{{ (date('Y-m-d') == $item->tgl_kembali) ? 'Segera kembalikan!' : '' }}</p>
                  <a href="/kembalikan/{{$item->transaksiId}}" class="btn w-100" style="background-color: #ab1616;color:#fff;font-weight: 500;">Kembalikan</a>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <h5 class="text-center">Data pinjaman anda kosong!</h5>
            @endif
        </div>
     </div>
  </main><!-- End #main -->
@endsection