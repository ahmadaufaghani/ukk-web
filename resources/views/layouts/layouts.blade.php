<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website Perpustakaan - {{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/icon/perpus_logo.ico')}}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700;900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center shadow">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">Sailor</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto"><img src="{{asset('img/logo_perpustakaan.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="{{$title == 'Beranda' ? 'active' : ''}}">Beranda</a></li>
          <li><a href="/semua_buku" class="{{$title == 'Buku' || $title == 'Pencarian Penulis' ? 'active' : ''}}">Buku</a></li>
          @if(Auth::check() && Auth::user()->status == 'user')
          <li><a href="/data_pinjam/{{Auth::user()->id}}" class="{{$title == 'Pinjaman' ? 'active' : ''}}">Pinjaman</a></li>
          <li><a href="/keluar" class="logoutButton">Keluar</a></li>
          @else
          <li><a href="/masuk" class="{{$title == 'Masuk' ? 'active' : ''}}">Masuk</a></li>
          <li><a href="/daftar" class="registerButton">Daftar Member</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="col-lg-12">
          <div class="d-lg-flex d-md-block">
            <div class="col-lg-6 col-md-12 text-center ps-3 pe-3 me-lg-4">
              <div class="footer-info">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.092476716856!2d109.2494613!3d-7.4350009!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e9d1768e4d1%3A0x959269c10818fa0c!2sSMK%20Telkom%20Purwokerto!5e0!3m2!1sid!2sid!4v1678604501942!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 ms-3">
              <div>
                <ul class="list-unstyled lh-lg">
                  <li><b>Alamat : </b>Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kulon, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53141</li>
                  <li><b>No. Hp : </b>(0281) 632138</li>
                  <li><b>Website : </b>https://smktelkom-pwt.sch.id/</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="copyright">
              SMK Telkom Purwokerto &copy; 2023 
            </div>
          </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>