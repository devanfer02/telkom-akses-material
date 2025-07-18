<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Alat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
  
  <!-- NAVBAR TELKOM AKSES -->
<nav class="custom-navbar d-flex align-items-center justify-content-between px-4">
  <div class="d-flex align-items-center gap-2">
    <img src="{{ asset('images/logoTA.png') }}" alt="Logo" class="logo-img">
    <div>
      <div class="fw-bold fs-4" style="color: #222;"><span style="color:#B6252A;"></span></div>
    </div>
  </div>
  
  <ul class="nav gap-4">
    <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link fw-semibold active text-danger" aria-current="page" href="#" style="background-color: #ded8d8; border-radius: 4px;">Data Alat</a></li>
    <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Laporan</a></li>
    <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">About Us</a></li>
    <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="#">Profil</a></li>
    <li class="nav-item d-flex align-items-center">
      <i class="bi bi-search fs-5"></i>
    </li>
  </ul>
</nav>

</head>
<body>

  <div class="container">
    <div class="form-container">
      <h4 class="form-title bg-danger text-white p-2 rounded text-center">Data Alat Terbaru</h4>
 
      <form id="alatForm">
        <div class="mb-3">
          <label for="kodeAlat" class="form-label">Kode Alat</label>
          <input type="text" class="form-control" id="kodeAlat" placeholder="Masukkan kode alat" required>
        </div>
        <div class="mb-3">
          <label for="namaAlat" class="form-label">Nama Alat</label>
          <input type="text" class="form-control" id="namaAlat" placeholder="Masukkan nama alat" required>
        </div>
        <div class="mb-3">
          <label for="kategoriAlat" class="form-label">Kategori Alat</label>
          <input type="text" class="form-control" id="kategoriAlat" placeholder="Masukkan kategori alat" required>
        </div>
        <div class="mb-3">
          <label for="statusAlat" class="form-label">Status Alat</label>
          <select class="form-select" id="statusAlat" required>
            <option value="">-- Pilih Status --</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Rusak">Rusak</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
          <button type="reset" class="btn btn-outline-secondary">Batal</button>
          <button type="submit" class="btn btn-danger">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  
  @include('partials.footer')

  <script src="{{ asset('js/script3.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
