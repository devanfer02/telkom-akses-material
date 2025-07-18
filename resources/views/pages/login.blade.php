@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <div class="container">
    <div class="left">
      <img src="{{ asset('images/logoTA.png') }}" alt="Telkom Akses Logo" class="logo">
      <h2>WELCOME TO SIALAT</h2>
    </div>
    <div class="right">
      <h3>Login</h3>
      <form id="loginForm">
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>

        <div class="other-login">
          <p>Atau login dengan:</p>
          <button class="google">Google</button>
          <button class="facebook">Facebook</button>
        </div>
        <p class="register-link">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
@endsection
