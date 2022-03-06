@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Laravel Blog</b>'s</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai sesi</p>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama atau Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">
            <i class="fa fa-sign-in"></i> Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="{{route('register')}}" class="text-center">Daftar Akun Baru</a>
  </div>
  <!-- /.login-box-body -->
</div>
@endsection