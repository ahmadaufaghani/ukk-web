@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Daftar Transaksi</h6>
                    </div>
                    <div>
                        <a href="/peminjaman/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover" style="width:100%;">
                    <thead>
                    <tr>
                      <th>#</th>	
                      <th>Judul</th>
                      <th>Peminjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Status</th>
                      <th>Jumlah Pinjaman</th>
                      <th>Aksi</th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi_semua as $index => $item)
                    <tr>                        
                      <td>{{$index + 1}}</td>
                      <td>{{$item->judul}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->tgl_pinjam}}</td>
                      <td>{{$item->tgl_kembali}}</td>
                      <td>{{$item->status}}</td>
                      <td>{{$item->jumlah_pinjaman}}</td>
                      <td>
                            <a href="/peminjaman/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                            <a href="/peminjaman/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
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