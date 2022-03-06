@extends('layouts.backend')

@section('content')
<section class="content-header">
  <h1>
    Artikel
   <a href="{{route('artikel.create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Buat Baru</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Artikel</li>
  </ol>
</section>
    
<section class="content">
      <div class="box box-warning">
        <div class="box-body">
          <table id="categories" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th><i class="fa fa-comments-o"></i></th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($artikels as $item)
              <tr class="text-primary">
                <td><a href="{{route('artikel.show', $item->id)}}">{{$item->judul}}</a></td>
                <td>{{$item->penulis}}</td>
                @if (!empty($item->kategori->nama))
                <td>{{$item->kategori->nama}}</td>
                @else
                <td class="text-danger"><i>no_category</i></td>
                @endif
                <td>{{$item->komentar->count()}}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
                <td>
                  <form action="{{route('artikel.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('artikel.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')"><i class="fa fa-trash"></i></button>
                  </form> 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
