@extends('layouts.backend')

@section('content')
<section class="content-header">
  <h1>
    Halaman
   <a href="{{route('halaman.create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Buat Halaman</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Halaman</li>
  </ol>
</section>
    
<section class="content">
      <div class="box box-warning">
        <div class="box-body">
          <table id="halamans" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($halamans as $item)
              <tr class="text-primary">
                <td>{{$item->judul}}</a></td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
                <td>
                  <form action="{{route('halaman.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('halaman.show', $item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{route('halaman.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
    $('#halamans').DataTable()
  })
</script>
@endpush
