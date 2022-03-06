<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('themes/back/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/dist/css/skins/_all-skins.min.css')}}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @stack('styles')
  <script type="text/javascript">
    window.onload = function() {jam();}
    function jam(){
      var a = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      a.innerHTML = h + ":" + m + ":" + s;

      setTimeout('jam()', 1000);
    }

    function set(a) {
      a = a < 10 ? '0' + a : a;
      return a;
    }
  </script>
</head>
<!-- <body class="hold-transition skin-blue sidebar-collapse sidebar-mini"> -->
<body class="hold-transition skin-purple fixed sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="{{route('home')}}" class="logo">
      <span class="logo-mini">Blog's</span>
      <span class="logo-lg"><b>Blog</b>'s</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu navbar-left">
       <ul class="nav navbar-nav">
          <li>
            <a href="{{url('/')}}" target="_blank">
              <i class="fa fa-firefox"></i> Website
            </a>
          </li>
          <li>
            <a href=""> {{ Carbon\Carbon::now()->locale('id_ID')->isoFormat('LL')}}</a>
          </li>
          <li>
            <a href="" id="jam" style="font-size: 25px; font-family: arial; color: #fff; "></a>
          </li>
        </ul>
      </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="{{ route('profil.index')}}">
              <img src="{{ asset(Auth::user()->avatar)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Keluar</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      @if(Auth::user()->is_admin === 1)
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="{{ (request()->is('home')) ? 'active' : '' }}">
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dasbor</span>
          </a>
        </li>
        <li class="treeview {{ (request()->is('artikel','artikel/create')) ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Artikel</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">
                @php
                $data = \App\Models\Artikel::all();
                @endphp
                {{ $data->count() }}
              </span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('artikel.index')}}"><i class="fa fa-circle-o"></i> Semua Artikel</a></li>
            <li><a href="{{route('artikel.create')}}"><i class="fa fa-circle-o"></i> Buat Artikel</a></li>
          </ul>
        </li>
        <li class="{{ (request()->is('kategori')) ? 'active' : '' }}">
          <a href="{{route('kategori.index')}}">
            <i class="fa fa-table"></i> <span>Kategori</span>
          </a>
        </li>
        <li class="{{ (request()->is('komentar')) ? 'active' : '' }}">
          <a href="{{route('komentar.index')}}">
            <i class="fa fa-comments-o"></i> <span>Komentar</span>
             <span class="pull-right-container">
              <span class="label label-primary pull-right">
                @php
                $data = \App\Models\Komentar::all();
                @endphp
                {{ $data->count() }}
              </span>
            </span>
          </a>
        </li>
        <li class="{{ (request()->is('halaman','halaman/create')) ? 'active' : '' }}">
          <a href="{{route('halaman.index')}}">
            <i class="fa  fa-pagelines"></i> <span>Halaman</span>
          </a>
        </li>
      </ul>
       @else
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="{{ (request()->is('home')) ? 'active' : '' }}">
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dasbor</span>
          </a>
        </li>
         <li class="{{ (request()->is('profil')) ? 'active' : '' }}">
          <a href="{{route('profil.index')}}">
            <i class="fa  fa-user"></i> <span>Profil</span>
          </a>
        </li>
      </ul>
       @endif
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sweetalert::alert')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('themes/back/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('themes/back/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScro -->
<script src="{{ asset('themes/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('themes/back/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themes/back/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('themes/back/dist/js/demo.js')}}"></script>
@stack('scripts')
</body>
</html>
