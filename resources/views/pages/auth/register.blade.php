@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
  <style>
    .password-container {
      position: relative;
    }
    .password-container input {
      width: 100%;
      padding-right: 40px; /* Make space for the icon */
    }
    .password-container .toggle-password {
      position: absolute;
      top: 22px;
      right: 15px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>

  <div class="container">
    <div class="left">
      <img src="{{ asset('images/logoTA.png') }}" alt="Telkom Akses Logo" class="logo">
      <h2>Let's Your Journey Begin</h2>
    </div>
    <div class="right">
      <h3>Sign Up</h3>
      <form method="POST" action="{{ route('action.register') }}" id="registerForm">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required value="{{ old('name') }}" />
        @error('name')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <input type="text" name="no_hp" placeholder="No. HP" required value="{{ old('no_hp') }}" />
        @error('no_hp')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="password-container">
          <input type="password" name="password" id="password" placeholder="Password" required />
          <i class="fas fa-eye toggle-password" id="togglePassword"></i>
        </div>
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="password-container">
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required />
          <i class="fas fa-eye toggle-password" id="togglePasswordConfirm"></i>
        </div>
        @error('password_confirmation')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <input type="text" name="city" placeholder="Masukkan Kota Asal" required value="{{ old('city') }}" />
        @error('city')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <select name="gender" class="form-select" style="margin-bottom: 20px" required>
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="wanita" {{ old('gender') == 'wanita' ? 'selected' : '' }}>Wanita</option>
        </select>
        @error('gender')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <button type="submit" class="daftar-btn">Daftar</button>
        <p class="login-link">Sudah punya akun? <a href="/auth/login">Login</a></p>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/register.js') }}"></script>
@endsection
