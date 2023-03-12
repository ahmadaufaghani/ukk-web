@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Tambah Anggota</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/anggota/simpan" method="POST" >
                @csrf
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Silahkan isi nama">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Nama Pengguna</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Silahkan isi nama pengguna">
                @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Silahkan isi kata sandi">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Silahkan isi status">
                @error('status')
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