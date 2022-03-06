@extends('layouts.auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Laravel Blog</b>'s</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Daftar Akun Baru</p>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Alamat Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
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
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="{{route('login')}}" class="text-center">Sudah Punya Akun? Masuk</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection
