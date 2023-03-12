@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Edit Buku</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/buku/perbarui/{{$tampil_buku->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Silahkan isi judul" value="{{$tampil_buku->judul}}">
                @error('judul')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Pengarang</label>
                <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" placeholder="Silahkan isi pengarang" value="{{$tampil_buku->pengarang}}">
                @error('pengarang')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" placeholder="Silahkan isi penerbit" value="{{$tampil_buku->penerbit}}">
                @error('penerbit')
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
                <label class="form-label mt-3">Stok</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="Silahkan isi stok" value="{{$tampil_buku->stok}}">
                @error('stok')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Stok</label>
                <div class="mb-3">
                    <img src="{{asset('admin/img/buku/'.$tampil_buku->gambar)}}" alt="">
                </div>
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-sm btn-warning mr-2">Perbarui</button>
                  <div>
                    <a href="/buku" class="btn btn-sm btn-danger">Kembali</a>
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