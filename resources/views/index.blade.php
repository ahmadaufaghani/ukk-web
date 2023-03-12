@extends('layouts.layouts')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators active" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        @foreach($sampul_all as $index => $item)
        <div class="carousel-item {{$index == 0 ? 'active' : ''}}" style="background-image: url({{asset('admin/img/sampul/'.$item->gambar)}}">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">{{$item->judul}}</span></h2>
              <p class="animate__animated animate__fadeInUp">{{$item->deskripsi}}</p>
              <a href="#menu" class="jelajahiButton">Jelajahi</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->


  <main id="main">
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0; background: rgb(0,212,255);
    background: linear-gradient(160deg, rgba(0,212,255,1) 0%, rgba(23,134,181,1) 60%);">
      <div class="container mt-5 mb-5">
        <div class="col-lg-12 col-md-12 col-12 mt-2">
          <div class="row justify-content-center">
            @foreach($fitur_all as $item)
            <div class="col-lg-3 col-md-4 col-6  bg-white text-center mb-lg-0 ms-4 mb-md-3 mb-3 me-4" style="border-radius: 10px; padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px;">
              <img src="{{asset('admin/img/fitur/'.$item->gambar)}}" width="20%" alt="">
              <h5 style="margin-top: 15px; color: #0387BF;">{{$item->judul}}</h5>
              <p style="margin-top: 15px; font-size: 14px;">{{$item->deskripsi}}</p>
            </div>
            @endforeach
        </div>
    </section><!-- End About Section -->
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0;"> 
      <div class="container mt-5 mb-5">
        <h5 style="color:#0387BF;margin-bottom:25px;font-weight: 600;">Buku Terbaru</h5>
        <div class="col-lg-12 col-md-12 mt-2">
          <div class="row">
            @foreach($buku_terbaru as $item)
            <div class="col-lg-3 col-md-4 mb-4">
              <div class="card h-100">
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
        </div>
    </section><!-- End About Section -->
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0; background: rgb(0,212,255);
    background: linear-gradient(160deg, rgba(0,212,255,1) 0%, rgba(23,134,181,1) 60%);">
      <div class="container mt-5 mb-5">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="text-center text-white">
            <h1><b>Yuk pilih penulis favoritmu!</b></h1>
          </div>
          <div class="row justify-content-center">
            @foreach($penulis_buku as $item)
              <a href="/penulis/{{$item->pengarang}}" class="col-lg-2 col-4 bg-white text-center pt-2 pb-0 mt-4 me-3" style="border-radius: 20px;">
                <h6 style="color: #0387BF;">{{$item->pengarang}}</h6>
              </a>
            @endforeach 
          </div> 
        </div>
    </section><!-- End About Section -->
    <section id="menu" class="about" style="padding-bottom: 0px; padding-top: 0;margin-bottom: 70px; margin-top:50px;">
      <div class="container">
        <h5 style="color:#0387BF;margin-bottom:25px;font-weight: 600;">Galeri</h5>
        <div class="col-lg-12 col-md-12 row justify-content-start">
            @foreach($galeri_all as $item)
            <div class="col-lg-4 col-md-4" style="margin-right: 0px; margin-bottom: 20px; border-radius: 20px;">
              <img src="{{asset('admin/img/galeri/'.$item->gambar)}}" class="w-100 h-100 img-thumbnail" alt="">
            </div>
            @endforeach
        </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->
@endsection