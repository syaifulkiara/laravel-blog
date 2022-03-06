@extends('layouts.frontend')

@section('content')
  <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$posts->judul}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on 
                            {{strftime("%A, %d %B %Y",strtotime($posts->created_at))}} 
                            by {{$posts->penulis}}
                            </div>
                            <!-- Post categories-->
                            @if (!empty($posts->kategori->nama))
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$posts->kategori->nama}}</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                            @else
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">null</a>
                            @endif    
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{asset($posts->gambar)}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{!! $posts->konten !!}</p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form action="{{route('main.store')}}" method="POST" class="mb-4">
                                    @csrf
                                    <input type="hidden" name="artikel_id" value="{{$posts->id}}">
                                    <textarea class="form-control @error('konten') is-invalid @enderror" name="konten" value="{{ old('konten') }}" rows="3"></textarea>
                                    @error('konten')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    <div class="form-grup mt-2">   
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-send"></i> Kirim</button>
                                    </div>
                                </form>

                                <!-- Comment with nested comments-->
                                @foreach($posts->komentar()->orderBy('created_at','DESC')->get() as $item)
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle" src="{{asset($item->user->avatar)}}" height="60" alt="..." />
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{$item->user->name}}</div>
                                        {!! $item->konten !!}
                                    </div>
                                </div>
                                @endforeach
                        
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
