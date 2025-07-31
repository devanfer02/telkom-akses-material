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
      <form method="POST" action="{{ route('action.login') }}" id="loginForm">
        @csrf
        <input type="text" name="no_hp" id="no_hp" placeholder="No. HP" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>

        <p class="register-link">Belum punya akun? <a href="/auth/register">Daftar di sini</a></p>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
@endsection
