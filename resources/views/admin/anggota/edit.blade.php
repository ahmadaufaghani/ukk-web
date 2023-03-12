@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Perbarui Anggota</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <form action="/anggota/perbarui/{{$anggota_update->id}}" method="POST" >
                @csrf
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Silahkan isi nama" value="{{$anggota_update->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Nama Pengguna</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Silahkan isi nama pengguna" value = "{{$anggota_update->username}}">
                @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Silahkan isi status" value="{{$anggota_update->status}}">
                @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
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