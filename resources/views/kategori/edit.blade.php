@extends('layouts.backend')

@section('content')
<section class="content-header">
  <h1>
    Ubah Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Ubah Kategori</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Kategori</h3>
        </div>
        <div class="box-body">
          <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$kategori->nama}}">
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3">{{$kategori->keterangan}}</textarea>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-send-o"></i> Perbarui Categori</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-9">
      <div class="box box-warning">
        <div class="box-body">
          <table id="categories" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Slug</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kategoris as $item)
              <tr class="text-primary">
                <td>{{$item->nama}}</td>
                <td>{{$item->keterangan}}</td>
                <td>{{$item->slug}}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
                <td>
                  <form action="{{route('kategori.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('kategori.edit', $item->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')">Hapus</button>
                  </form> 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>    
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('themes/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('themes/back/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('themes/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#categories').DataTable()
  })
</script>
@endpush