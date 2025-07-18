<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Alat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-light px-4">
  <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="{{ asset('images/logoTA.png') }}" alt="Logo" class="logo-img">
  </a>
  <div class="collapse navbar-collapse justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item mx-3"><a class="nav-link" href="#">Dashboard</a></li>
      <li class="nav-item mx-3"><a class="nav-link active bg-secondary-subtle rounded px-2" href="#">Data Alat</a></li>
      <li class="nav-item mx-3"><a class="nav-link" href="#">About Us</a></li>
      <li class="nav-item mx-3"><a class="nav-link" href="#">Profil</a></li>
    </ul>
  </div>
  <button class="btn"><i class="bi bi-search"></i></button>
</nav>

<!-- JUDUL -->
<section class="py-4 text-center">
  <h2 class="bg-danger text-white d-inline-block px-5 py-2 rounded">Data Alat Terbaru</h2>
</section>

<!-- TABEL DATA ALAT -->
<section class="container mb-5">
  <div class="card shadow-sm p-4 rounded table-container">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead class="table-danger text-center">
          <tr>
            <th>No</th>
            <th>KODE ALAT</th>
            <th>NAMA ALAT</th>
            <th>KATEGORI</th>
            <th>STATUS</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td>1</td>
            <td>19453</td>
            <td>Kabel Fiber</td>
            <td>Kabel</td>
            <td>Dipinjam/Tersedia</td>
            <td>
              <button class="btn btn-sm text-danger"><i class="bi bi-pencil-fill"></i></button>
              <button class="btn btn-sm text-dark"><i class="bi bi-trash-fill"></i></button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>33463</td>
            <td>s-clamp springer</td>
            <td>Aksesoris</td>
            <td>Dipinjam/Tersedia</td>
            <td>
              <button class="btn btn-sm text-danger"><i class="bi bi-pencil-fill"></i></button>
              <button class="btn btn-sm text-dark"><i class="bi bi-trash-fill"></i></button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>567214</td>
            <td>Komputer</td>
            <td>Perangkat</td>
            <td>Dipinjam/Tersedia</td>
            <td>
              <button class="btn btn-sm text-danger"><i class="bi bi-pencil-fill"></i></button>
              <button class="btn btn-sm text-dark"><i class="bi bi-trash-fill"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <button class="btn btn-danger mt-3"><i class="bi bi-plus-lg"></i> Tambah Alat</button>
  </div>
</section>

<!-- FOOTER -->
@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>
