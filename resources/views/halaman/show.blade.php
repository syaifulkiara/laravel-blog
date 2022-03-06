@extends('layouts.backend')

@section('content')
<section class="content-header">
  <a href="{{route('halaman.index')}}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i></a>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Pratinjau Halaman</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="{{asset('themes/back/dist/img/user1-128x128.jpg')}}" alt="User Image">
        <span class="username"><a href="#">{{$halamans->judul}}</a></span>
        <span class="description">Shared publicly - 7:30 PM Today</span>
      </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <img class="img-responsive pad" src="{{asset($halamans->gambar)}}" alt="Photo">
      <p>{!! $halamans->konten !!}</p>
    </div>
  </div>
</div>
</section>
@endsection