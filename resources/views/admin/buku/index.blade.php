@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Daftar Buku</h6>
                    </div>
                    <div>
                        <a href="/buku/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover" style="width:100%;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Gambar</th>
                      <th>Stok</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $index => $item)
                    <tr>                        
                      <td>{{$index + 1}}</td>
                      <td>{{$item->judul}}</td>
                      <td>{{$item->pengarang}}</td>
                      <td>{{$item->penerbit}}</td>
                      <td><img src="{{asset('admin/img/buku/'.$item->gambar)}}" width="100" alt=""></td>
                      <td>{{$item->stok}}</td>
                      <td>
                            <a href="/buku/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                            <a href="/buku/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
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
  @if(session('success'))
  <script>
        toastr.success("{{session('success')}}")
  </script>
  @endif
@endsection