@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Tambah Galeri</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/galeri/simpan" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Silahkan isi nama">
                @error('nama')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" placeholder="Silahkan isi nama">
                @error('gambar')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
              
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-sm btn-primary mr-2">Tambah</button>
                  <div>
                    <a href="/anggota" class="btn btn-sm btn-danger">Kembali</a>
                  </div>
                </div>
               </form>
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