@extends('layouts.backend')

@section('content')
<section class="content-header">
  <h1>
    Komentar
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Komentar</li>
  </ol>
</section>

<section class="content">
  <div class="box box-info">
    <div class="box-body">
      <div class="table-responsive">
        <table id="komentar" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Penulis</th>
              <th>Komentar</th>
              <th>Hapus</th>
              <th>Artikel</th>
              <th>Waktu</th>
            </tr>
          </thead>
          <tbody>
            @foreach($komentars as $item)
            <tr class="text-primary">
              <td>
                <div>
                    <img src="{{asset($item->user->avatar)}}" class="img-circle" width="50">
                </div>
                </td>
              <td>{!! Str::limit($item->konten,100) !!}...</td>
              <td>
                  <form action="{{route('komentar.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')"><i class="fa fa-trash"></i></button>
                  </form> 
                </td>
              @if (!empty($item->artikel->judul))
              <td>
                <a href="{{route('artikel.show', $item->artikel_id)}}" title="{{$item->artikel_id}}">
                  {!! Str::limit($item->artikel->judul) !!}..
                </a>
              </td>
               @else
                <td class="text-danger"><i>Tidak Tersedia / Dihapus</i></td>
                @endif
              <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
    $('#komentar').DataTable()
  })
</script>
@endpush
