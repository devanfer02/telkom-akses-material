<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biodata Diri - Telkom Akses</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <img src="{{ asset('images/logoTA.png') }}" height="40" alt="Telkom Akses">
    </a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Data Alat</a></li>
      <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
      <li class="nav-item"><a class="nav-link active fw-bold" href="#">Profil</a></li>
    </ul>
  </div>
</nav>

<!-- Biodata Section -->
<section class="biodata py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="btn btn-danger text-white px-5 py-2">BIODATA DIRI</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6 profile-card p-4 border rounded-3">
        <div class="text-center mb-3">
          <img src="{{ asset('images/image 1.png') }}" alt="Foto Profile" class="rounded-circle">
          <p class="fw-bold mt-2">Dolor Dolar</p>
        </div>

        <!-- Tampilan Data -->
        <div id="profileData">
          <p><strong>Nama Lengkap:</strong> <span id="profileNama">-</span></p>
          <p><strong>Jenis Kelamin:</strong> <span id="profileGender">-</span></p>
          <p><strong>City:</strong> <span id="profileCity">-</span></p>
          <p><strong>Alamat Email:</strong> <span id="profileEmail">-</span></p>
          <button class="btn btn-outline-danger w-100" onclick="editProfile()">Edit</button>
        </div>

        <!-- Form Edit -->
        <form id="editForm" style="display: none;">
          <div class="mb-2">
            <label>Nama Pengguna</label>
            <input type="text" id="inputNama" class="form-control">
          </div>
          <div class="mb-2">
            <label>Jenis Kelamin</label>
            <input type="text" id="inputGender" class="form-control">
          </div>
          <div class="mb-2">
            <label>City</label>
            <input type="text" id="inputCity" class="form-control">
          </div>
          <div class="mb-2">
            <label>Email Address</label>
            <input type="email" id="inputEmail" class="form-control">
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Kembali</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
@include('partials.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/script4.js') }}"></script>

</body>
</html>
