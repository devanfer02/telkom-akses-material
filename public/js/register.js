document.getElementById('registerForm').addEventListener('submit', function (e) {
  e.preventDefault();
  
  // Simulasi sukses daftar
  alert("Pendaftaran berhasil! Silakan login.");
  
  // Pindah ke halaman login (pastikan file login.html ada)
  window.location.href = "login.html";
});