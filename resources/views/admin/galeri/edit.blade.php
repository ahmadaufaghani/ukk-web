@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Perbarui Galeri</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/galeri/perbarui/{{$galeri_edit->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror mb-3" name="nama" placeholder="Silahkan isi nama" value="{{$galeri_edit->nama}}">
                @error('nama')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror mb-3" name="gambar" placeholder="Silahkan isi nama">
                @error('gambar')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label">Preview</label>
                <div>
                  <img src="{{asset('admin/img/galeri/'.$galeri_edit->gambar)}}" width="180" alt="">
                </div>
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-sm btn-warning mr-2">Perbarui</button>
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