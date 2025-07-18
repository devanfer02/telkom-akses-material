<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - SIALAT</title>
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
</head>
<body>

  <div class="container">
    <div class="left">
      <img src="{{ asset('images/logoTA.png') }}" alt="Telkom Akses Logo" class="logo">
      <h2>Let's Your Journey Begin</h2>
    </div>
    <div class="right">
      <h3>Sign Up</h3>
      <form id="registerForm">
        <input type="text" placeholder="Nama Lengkap" required />
        <input type="email" placeholder="Email Telkom" required />
        <input type="password" placeholder="Password" required />
        <input type="password" placeholder="Konfirmasi Password" required />
        <button type="submit" class="daftar-btn">Daftar</button>
        <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
