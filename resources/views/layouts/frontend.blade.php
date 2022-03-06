<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('themes/front/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('themes/front/css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('themes/front/css/carousel.css')}}" rel="stylesheet">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        @php
                        $kategoris = \App\Models\Kategori::orderBy('created_at','DESC')->take(2)->get();
                        @endphp
                        @foreach($kategoris as $item)
                        <li class="nav-item"><a class="nav-link" href="">{{$item->nama}}</a></li>
                        @endforeach
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><i class="fa fa-sign-out"></i>Login</a></li>
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light me-2" type="submit">Search</button>
                  </form>
                   <div class="dropdown text-end">
                      <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="32" height="32">
                      </a>
                      <ul class="dropdown-menu dropdown-menu-macos mx-0 shadow" style="width: 220px;">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </nav>
        
          
        <!-- Page header with logo and tagline-->
       @yield('content')
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('themes/front/js/scripts.js')}}"></script>
    </body>
</html>
