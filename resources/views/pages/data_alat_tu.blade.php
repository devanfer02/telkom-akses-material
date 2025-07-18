<!DOCTYPE html>
<html lang="id">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Alat Terbaru - Telkom Akses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f2f2f2;
    }


    .navbar {
      background-color: #e5e5e5;
      padding: 0 0 0 0;
    }


    .navbar .nav-link.active {
      background-color: #ccc;
      border-radius: 5px;
    }


    .nav-link {
    color: rgb(10, 10, 10);
    }


    .nav-link:hover {
    color: #b71c1c; /* Warna merah saat hover */
    }


    .header-title {
      background-color: #b30000;
      color: white;
      padding: 20px;
      border-radius: 12px;
      margin: 30px auto;
      max-width: 400px;
      text-align: center;
      font-size: 28px;
      font-weight: 600;
    }


    .table-wrapper {
      background-color: #fff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 50px;
    }


    .table th {
      background-color: #c8102e;
      color: white;
      text-align: center;
    }


    .table td {
      text-align: center;
      vertical-align: middle;
    }


    .btn-add {
      background-color: #c8102e;
      color: white;
    }


    .btn-add:hover {
      background-color: #a20d23;
    }


    .footer {
      background-color: #1b1b1b;
      color: white;
      padding: 30px 50px;
      margin-top: 50px;
    }


    .footer .social-icons i {
      font-size: 1.5rem;
      margin-right: 15px;
      cursor: pointer;
    }


    .footer .map {
      max-width: 250px;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>


<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light px-4">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/LogoTA.png') }}" alt="Telkom Akses" class="telkom-mini">
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Data Material</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-search search-icon"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Header -->
  <div class="header-title">Data Material</div>


  <!-- Tabel -->
  <div class="container table-wrapper">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>TGL</th>
          <th>NAMA ALAT</th>
          <th>JUMLAH</th>
          <th>LOKASI</th>
          <th>MITRA</th>
          <th>TEKNISI</th>
          <th>STATUS</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>19/02/24</td>
          <td>Kabel Fiber</td>
          <td>200</td>
          <td>Madiun</td>
          <td>Putratel</td>
          <td>Ayu</td>
          <td>IN</td>
        </tr>
        <tr>
          <td>2</td>
          <td>25/03/24</td>
          <td>s-clamp<br>springer</td>
          <td>150</td>
          <td>Karangjati</td>
          <td>Indotel</td>
          <td>Putri</td>
          <td>OUT</td>
        </tr>
        <tr>
          <td>3</td>
          <td>06/04/24</td>
          <td>Komputer</td>
          <td>50</td>
          <td>Sumberejo</td>
          <td>Telkom</td>
          <td>Suci</td>
          <td>OUT</td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-add"><i class="fas fa-plus"></i> Tambah Alat</button>
  </div>


  <!-- Footer -->
  @include('partials.footer')


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</body>
  </html>
