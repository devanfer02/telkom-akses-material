document.getElementById('loginForm')?.addEventListener('submit', function (e) {
  e.preventDefault();
  alert("Login berhasil!");
  // window.location.href = 'dashboard.html';
});

document.getElementById('registerForm')?.addEventListener('submit', function (e) {
  e.preventDefault();
  alert("Pendaftaran berhasil!");
  // window.location.href = 'index.html';
});