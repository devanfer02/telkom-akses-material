<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Alat Terbaru - Telkom Akses Madiun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #fafafa url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6322094c-2bfa-4295-9311-68b05082b631.png') no-repeat center center;
      background-size: cover;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #1a1a1a;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    /* Navbar Custom */
    nav.navbar {
      background: transparent !important;
      padding-top: 1rem;
      padding-bottom: 1rem;
      font-size: 1rem;
      font-weight: 500;
    }
    nav.navbar a.nav-link {
      color: #222222;
      transition: color 0.3s ease;
      font-weight: 500;
    }
    nav.navbar a.nav-link:hover {
      color: #b81d23;
      text-decoration: none;
    }
    nav.navbar a.nav-link.active,
    nav.navbar a.nav-link[data-active="true"] {
      background-color: #c73237;
      color: rgb(20, 2, 2) !important;
      border-radius: 0.2rem;
      pointer-events: none;
    }
    .logo-img {
    height: 40px;
    width: auto;
    }
    /* Search icon styling */
    .navbar-search-icon {
      cursor: pointer;
      color: #222;
      font-size: 1.2rem;
    }
    .navbar-brand img {
      height: 42px;
      width: auto;
      margin-right: 8px;
    }
    /* Header Title */
    .header-title {
      max-width: 700px;
      margin: 1.8rem auto 1.5rem;
      padding: 0.4rem 1.5rem;
      background-color: #c73237;
      border-radius: 0.5rem;
      color: white;
      font-weight: 700;
      font-size: 1.9rem;
      text-align: center;
      user-select: none;
      box-shadow: 0 4px 8px rgb(199 50 55 / 0.4);
    }
    /* Table Container */
    .table-container {
      max-width: 900px;
      margin: 0 auto 3rem;
      background: linear-gradient(180deg, #ededed, #b9b9b9);
      border: 2px solid #222;
      border-radius: 12px;
      box-shadow: 4px 4px 12px rgb(0 0 0 / 0.2);
      padding: 1rem;
      overflow-x: auto;
    }
    /* Table Custom */
    table.table thead tr th {
      background-color: #c73237;
      color: white;
      text-align: center;
      font-weight: bold;
      vertical-align: middle;
      white-space: nowrap;
    }
    /* Status column style */
    .status-text {
      font-weight: 700;
      font-size: 0.8rem;
      color: #222222;
    }
    /* Hover effect on rows */
    table.table tbody tr:hover {
      background-color: #f6f6f6;
    }
    /* Buttons container */
    .btns-row {
      display: flex;
      justify-content: space-between;
      margin-top: 1rem;
    }
    .btn-custom {
      background-color: #c73237;
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.45rem 1.25rem;
      font-size: 1rem;
      border-radius: 0.3rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      user-select: none;
    }
    .btn-custom:hover, .btn-custom:focus {
      background-color: #9c262a;
      outline: none;
      box-shadow: 0 0 6px #9c262acc;
    }
    .btn-icon {
      font-weight: bold;
      font-size: 1.2rem;
      line-height: 1;
      user-select: none;
    }
    /* Footer styles */
    footer {
      background-color: #170b0b;
      color: #ddd;
      padding: 2rem 1rem 1rem;
      font-size: 0.95rem;
      margin-top: auto;
    }
    footer a {
      color: #ddd;
      text-decoration: none;
      margin-right: 1rem;
      font-size: 1.6rem;
    }
    footer a:hover {
      color: #c73237;
    }
    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 1.5rem;
    }
    .footer-social {
      flex: 1 1 200px;
    }
    .footer-contact {
      flex: 1 1 300px;
      min-width: 280px;
      white-space: pre-line;
    }
    .footer-map {
      flex: 1 1 300px;
      min-width: 280px;
    }
    .footer-map iframe {
      width: 100%;
      height: 200px;
      border-radius: 8px;
      border: 0;
      box-shadow: 0 0 8px rgb(199 50 55 / 0.5);
    }
    hr.footer-divider {
      border-color: #3d2626;
      margin-top: 1rem;
      margin-bottom: 0.7rem;
    }
    .copyright {
      text-align: center;
      font-weight: 500;
      font-size: 0.85rem;
      color: #aa9f9f;
      user-select: none;
    }
    /* Responsive */
    @media (max-width: 768px) {
      .header-title {
        font-size: 1.5rem;
        padding: 0.3rem 1rem;
      }
      .btns-row {
        flex-direction: column;
        gap: 0.8rem;
      }
      .btn-custom {
        width: 100%;
        justify-content: center;
      }
      table.table thead tr th,
      table.table tbody tr td {
        white-space: normal;
        font-size: 0.9rem;
      }
      .footer-container {
        flex-direction: column;
      }
      .footer-map iframe {
        height: 180px;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
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

  <!-- Header Title -->
  <h1 class="header-title" tabindex="0" aria-label="Data Alat Terbaru">Data Alat Terbaru</h1>

  <!-- Table container -->
  <div class="table-container" role="region" aria-labelledby="tableTitle" tabindex="0" >
    <table class="table table-striped table-hover mb-0" aria-describedby="tableDesc">
      <thead>
        <tr>
          <th scope="col" style="width: 50px;">No</th>
          <th scope="col" style="width: 110px;">KODE ALAT</th>
          <th scope="col">NAMA ALAT</th>
          <th scope="col" style="width: 130px;">KATEGORI</th>
          <th scope="col" style="width: 110px;">STATUS</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="text-center">1</th>
          <td class="text-center">19453</td>
          <td>Kabel Fiber</td>
          <td class="text-center">Kabel</td>
          <td class="text-center status-text">Dipinjam/<br /><strong>Tersedia</strong></td>
        </tr>
        <tr>
          <th scope="row" class="text-center">2</th>
          <td class="text-center">33463</td>
          <td>s-clamp springer</td>
          <td class="text-center">Aksesoris</td>
          <td class="text-center status-text">Dipinjam/<br /><strong>Tersedia</strong></td>
        </tr>
        <tr>
          <th scope="row" class="text-center">3</th>
          <td class="text-center">567214</td>
          <td>Komputer</td>
          <td class="text-center">Perangkat</td>
          <td class="text-center status-text">Dipinjam/<br /><strong>Tersedia</strong></td>
        </tr>
        <tr>
          <th scope="row" class="text-center">4</th>
          <td class="text-center">567213</td>
          <td>Mouse</td>
          <td class="text-center">Perangkat</td>
          <td class="text-center status-text">Dipinjam/<br /><strong>Tersedia</strong></td>
        </tr>
      </tbody>
    </table>
    <div class="btns-row mt-3">
      <button type="button" class="btn-custom" id="btn-back" aria-label="Kembali ke halaman sebelumnya">Kembali</button>
      <button type="button" class="btn-custom" id="btn-add" aria-label="Tambah alat baru">
        <span class="btn-icon" aria-hidden="true">+</span> Tambah Alat
      </button>
    </div>
  </div>

  <!-- Footer -->
  @include('partials.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Simple handlers for demo buttons:
    document.getElementById('btn-back').addEventListener('click', function(event) {
      event.preventDefault();
      alert('Tombol Kembali ditekan. Anda bisa mengatur fungsi navigasi halaman di sini.');
    });
    document.getElementById('btn-add').addEventListener('click', function(event) {
      event.preventDefault();
      alert('Tombol Tambah Alat ditekan. Anda bisa mengatur fungsi tambah alat di sini.');
    });
  </script>
</body>
</html>
