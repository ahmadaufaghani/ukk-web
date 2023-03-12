@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Perbarui Sampul</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/sampul/perbarui/{{$sampul_edit->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Silahkan isi judul" value="{{$sampul_edit->judul}}">
                @error('judul')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Silahkan isi deskripsi" value="{{$sampul_edit->deskripsi}}">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label class="form-label mt-3">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                @error('gambar')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Preview</label>
                <div>
                  <img src="{{asset('admin/img/sampul/'.$sampul_edit->gambar)}}" width="230px" alt="">
                </div>
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-sm btn-warning mr-2">Perbarui</button>
                  <div>
                    <a href="/dashboard" class="btn btn-sm btn-danger">Kembali</a>
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