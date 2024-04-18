@extends('layouts.applogin')
@section('title', 'Login')
@section('content')

<div class="login-box" width="60%">
  <!-- /.login-logo -->
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
      <a href="#" class="h1"> <img src="{{asset('backend/dist/img/TPL.png')}}" style="width: 100%; height: auto;"></a>
    </div>
    <div class="card-body" style="background-color: #F5F7F8">
      <p class="login-box-msg">Log In</p>

      <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder= "correo@example.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="text-center">
          <div class="row text-center">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-outline-secondary" style="background-color: #495E57; color:white">Sign In</button>
            </div>

            <div class="col-4">
              <a href="{{route('register')}}" class="btn btn-outline-secondary" style="background-color: #495E57; color:white">Register</a>
            </div>
            <!-- /.col -->
          </div>
        </div>

      </form>
      <br>
      <div class= "row; text-center">
        <div class= "col-12">
          <p>
            @if(Route::has('password.request'))
            <a href="{{route('password.request')}}" style= "color: black">I Fotgot My Password</a>
            @endif
          </p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection