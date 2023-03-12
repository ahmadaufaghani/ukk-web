@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Daftar Anggota</h6>
                    </div>
                    <div>
                        <a href="/anggota/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover" style="width:100%;">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Nama Pengguna</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengguna_all as $index => $item)
                    <tr>                        
                      <td>{{$index + 1}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->username}}</td>
                      <td>{{$item->status}}</td>
                      <td>
                            <a href="/anggota/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                            <a href="/anggota/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                            <a href="/anggota/reset_katasandi/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-lock fa-sm"></i></a>
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
@endsection