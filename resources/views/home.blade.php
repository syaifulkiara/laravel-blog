@extends('layouts.backend')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Selamat Datang &nbsp;  <b class="text-success"> {{Auth::user()->name}}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$artikel->count()}}</h3>

              <p>Artikel</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$kategori->count()}}</h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$user->count()}}</h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$komentar->count()}}</h3>

              <p>Komentar</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments-o"></i>
            </div>
            <a href="{{route('komentar.index')}}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$halamans->count()}}</h3>

              <p>Halaman</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="{{route('halaman.index')}}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
       @if(Auth::user()->is_admin === 1)
      <div class="row">
        <!-- Left col -->
        <div class="col-md-7">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel Terbaru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
               <table id="categories" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Gambar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($artikels as $item)
              <tr class="text-primary">
                <td><a href="{{route('artikel.show', $item->id)}}">{{$item->judul}}</a></td>
                @if (!empty($item->kategori->nama))
                <td>{{$item->kategori->nama}}</td>
                @else
                <td class="text-danger"><i>no_category</i></td>
                @endif
                <td><img src="{{asset($item->gambar)}}" height="80"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{route('artikel.create')}}" class="btn btn-sm btn-success btn-flat pull-left"><i class="fa fa-fw fa-send-o"></i> Buat Artikel Baru</a>
              <a href="{{route('artikel.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Selengkapnya..</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-5">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Komentar Terbaru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach($komentars->take(6) as $item)
                <li class="item">
                  <div class="product-img">
                    <img src="{{asset($item->user->avatar)}}" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="" class="text-success"><b>{{$item->user->name}}</b></a><br/>
                    @if (!empty($item->artikel->judul))
                    <a href="" class="product-title">{!! Str::limit($item->artikel->judul) !!}..
                      <span class="label label-warning pull-right">
                        {{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}
                      </span>
                    </a>
                    @else
                    <td class="text-danger"><i>Artikel Tidak Tersedia / Dihapus</i></td>
                    @endif
                    <span class="product-description">
                          {!! $item->konten !!}
                        </span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{route('komentar.index')}}" class="uppercase">Selengkapnya</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
       @endif
    </section>
    <!-- /.content -->
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
