@extends('layouts.layouts')
@section('content')
<main id="main" style="margin-top:80px">
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0;"> 
      <div class="container mt-5 mb-5">
        <div class="col-lg-12 col-md-12 mt-2">
          <div class="row">
            <h4 class="mb-4 mt-3">Penulis : {{$nama}}</h4>
            @if(count($buku_penulis))
              @foreach($buku_penulis as $item)
              <div class="col-lg-3 col-md-4">
                <div class="card mb-3">
                  <img src="{{asset('admin/img/buku/'.$item->gambar)}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{Str::limit($item->judul,25)}}</h5>
                    <p class="m-0">{{$item->pengarang}}</p>
                    <p class="mb-3">{{$item->stok != 0 ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                    @if(Auth::check() && Auth::user()->status == "user")
                    <a href="/pinjam/tambah/{{$item->id}}" class="btn w-100" style="background-color: #0387BF;color:#fff;font-weight: 500;">Pinjam</a>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <h5 class="text-center">Maaf data yang anda cari tidak ditemukan!</h5>
            @endif
        </div>
    </section>
  </main><!-- End #main -->
@endsection