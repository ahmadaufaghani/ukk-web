@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Kunjungi halaman utama</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12 text-center">
                    <div>
                        <img src="{{asset('img/pages_icon.png')}}" class="img-fluid mb-3" alt="">
                    </div>
                    <a href="/" target="_blank" class="btn btn-success mb-3"><i class="fas fa-link
                        "></i>&nbsp;Kunjungi halaman utama</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Daftar Sampul</h6>
                    </div>
                    <div>
                        <a href="/sampul/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover" style="width:100%;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sampul_all as $index => $item)
                    <tr>                        
                      <td>{{$index + 1}}</td>
                      <td>{{$item->judul}}</td>
                      <td>{{$item->deskripsi}}</td>
                      <td> <img src="{{asset('admin/img/sampul/'. $item->gambar)}}" width="120" alt=""></td>
                      <td>
                            <a href="/sampul/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                            <a href="/sampul/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Daftar Fitur</h6>
                    </div>
                    <div>
                        <a href="/fitur/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fitur_all as $index => $item)
                    <tr>                        
                      <td>{{$index + 1}}</td>
                      <td>{{$item->judul}}</td>
                      <td>{{$item->deskripsi}}</td>
                      <td> <img src="{{asset('admin/img/fitur/'. $item->gambar)}}" width="120" alt=""></td>
                      <td>
                            <a href="/fitur/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                            <a href="/fitur/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(function () {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection