@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />

  <div class="container">
    <div class="left">
      <img src="{{ asset('images/logoTA.png') }}" alt="Telkom Akses Logo" class="logo">
      <h2>Let's Your Journey Begin</h2>
    </div>
    <div class="right">
      <h3>Sign Up</h3>
      <form method="POST" action="{{ route('action.register') }}" id="regsiterForm">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required />
        <input type="email" name="email" placeholder="Email Telkom" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
        <input type="text" name="city" placeholder="Masukkan Kota Asal" required />
        <select name="gender" class="form-select" style="margin-bottom: 20px" required>
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="wanita">Wanita</option>
        </select>
        <button type="submit" class="daftar-btn">Daftar</button>
        <p class="login-link">Sudah punya akun? <a href="/auth/login">Login</a></p>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/register.js') }}"></script>
@endsection
