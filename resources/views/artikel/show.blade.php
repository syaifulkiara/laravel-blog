@extends('layouts.backend')

@section('content')
<section class="content-header">
  <a href="{{route('artikel.index')}}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i></a>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Pratinjau Artikel</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="{{asset('themes/back/dist/img/user1-128x128.jpg')}}" alt="User Image">
        <span class="username"><a href="#">{{$artikels->judul}}</a></span>
        <span class="description">{{strtoupper($artikels->kategori->nama)}}  - {{ Carbon\Carbon::parse($artikels->created_at)->diffForHumans()}}</span>
      </div>
    </div>
    <div class="box-body">
      <img class="img-responsive pad" src="{{asset($artikels->gambar)}}" alt="Photo">
      <p>{!! $artikels->konten !!}</p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted"><b>{{$artikels->komentar->count()}}</b> komentar</span>
    </div>
    <div class="box-footer box-comments">
      @foreach($artikels->komentar()->orderBy('created_at','DESC')->get() as $item)
      <div class="box-comment">
        <img class="img-circle img-sm" src="{{asset($item->user->avatar)}}" alt="User Image">
        <div class="comment-text">
          <span class="username">
            {{$item->user->name}}
            <span class="text-muted pull-right">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
          </span>
          {!! $item->konten !!}
        </div>
      </div>
       @endforeach
    </div>
    <div class="box-footer">
      <form action="{{route('komentar.store')}}" method="POST" class="form-horizontal">
        @csrf
        <input type="hidden" name="artikel_id" value="{{$artikels->id}}">
        <div class="form-group margin-bottom-none">
          <div class="col-sm-9">
            <input class="form-control input-sm @error('konten') is-invalid @enderror" name="konten" value="{{ old('konten') }}" placeholder="Komentar">
              @error('konten')
              <strong class="text-danger">{{ $message }}</strong>
              @enderror
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-success pull-right btn-block btn-sm"><i class="fa fa-fw fa-send-o"></i> Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
@endsection