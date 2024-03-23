@extends('layouts.applogin')
@section('title', 'Login')
@section('content')

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{asset('backend/index2.html')}}" class="h1"><b>PARQUEADERO</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

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
              <button type="submit" class="btn btn-light btn-block" style="background-color: #92C7CF; color:white">Sign In</button>
            </div>

            <div class="col-4">
              <a href="{{route('register')}}" class="btn btn-light btn-block" style="background-color: #92C7CF; color:white">Register</a>
            </div>
            <!-- /.col -->
          </div>
        </div>

      </form>
      <br>
      <div class= "row">
        <div class= "col-12">
          <p>
            @if(Route::has('password.request'))
            <a href="{{route('password.request')}}">Olvide mi contraseña</a>
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