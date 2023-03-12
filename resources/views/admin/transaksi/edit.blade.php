@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold">Tambah Transaksi</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
              @foreach ($transaksi_update as $item)
              <form action="/peminjaman/perbarui/{{$item->id}}" method="POST" >
              @endforeach
                @csrf
                <label class="form-label">Judul</label>
               
                <select name="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                  @foreach ($transaksi_update as $item)
                  <option value="{{$item->buku_id}}" hidden="">{{$item->judul}} - Pilihan sebelumnya</option>
                  @endforeach
                  @foreach ($buku_all as $item)
                    <option value="{{$item->id}}">{{$item->judul}}</option>  
                  @endforeach
                </select>
                @error('buku_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Peminjam</label>
                <select name="users_id" class="form-control @error('users_id') is-invalid @enderror">
                  @foreach ($transaksi_update as $item)
                  <option value="{{$item->users_id}}" hidden="">{{$item->name}} - Pilihan sebelumnya</option>
                  @endforeach
                  @foreach ($anggota_all as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>  
                  @endforeach
                </select>
                @error('users_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Tanggal Pinjam</label>
                @foreach ($transaksi_update as $item)
                <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam" value="{{$item->tgl_pinjam}}">
                @error('tgl_pinjam')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Tanggal Kembali</label>
                <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali" value="{{$item->tgl_kembali}}">
                @error('tgl_kembali')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Silahkan isi status" value="{{$item->status}}">
                @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                <label class="form-label mt-3">Jumlah Pinjaman</label>
                <input type="number" class="form-control @error('jumlah_pinjaman') is-invalid @enderror" name="jumlah_pinjaman" placeholder="Silahkan isi jumlah pinjaman" value="{{$item->jumlah_pinjaman}}"> 
                @error('jumlah_pinjaman')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
                @endforeach
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-sm btn-warning mr-2">Perbarui</button>
                  <div>
                    <a href="/peminjaman" class="btn btn-sm btn-danger">Kembali</a>
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