<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/buku" class="brand-link">
      <img src="{{asset('admin/img/logo_perpustakaan_putih.png')}}" alt="AdminLTE Logo" class="img-fluid" >
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{($title == 'Dashboard' || $title == 'Tambah Sampul' || $title == 'Perbarui Sampul') ? "active" : ""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/buku" class="nav-link {{($title == 'Buku' || $title == 'Tambah Buku' || $title == 'Perbarui Buku') ? "active" : ""}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/peminjaman" class="nav-link  {{($title == "Peminjaman" || $title == "Tambah Peminjaman" || $title == 'Perbarui Peminjaman') ? "active" : ""}}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/anggota" class="nav-link  {{($title == "Anggota" || $title == "Tambah Anggota" || $title == "Perbarui Anggota") ? "active"  : ""}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/galeri" class="nav-link  {{($title == "Galeri" || $title == "Tambah Galeri" || $title == "Perbarui Galeri") ? "active"  : ""}}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>