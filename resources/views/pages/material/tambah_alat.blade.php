@extends('layouts.app')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(#f8f8f8, #e0e0e0);
    }


    .navbar {
      background-color: #e5e5e5;
      width: 100%;
        padding: 0;
        margin: 0;
        border-radius: 5px;
    }


    .navbar .nav-link.active {
      background-color: #ccc;
      border-radius: 5px;
    }


    .header-bar {
      background-color: #f3f3f3;
      display: flex;
      align-items: center;
    }


    .nav-link {
    color: rgb(10, 10, 10);
    }


    .nav-link:hover {
    color: #b71c1c;
    }


    .nav-link.active {
      background-color: #ccc;
      border-radius: 5px;
      padding: 5px 10px;
    }


    .search-icon {
      font-size: 1.2rem;
      cursor: pointer;
    }


    .title-box {
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


    .form-container {
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 30px;
      border: 2px solid #000;
      border-radius: 10px;
    }


    .form-label {
      font-weight: 500;
    }


    .form-actions {
      display: flex;
      justify-content: space-between;
    }


    .btn-danger {
      background-color: #b71c1c;
      border: none;
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


    .modal-confirm {
      background-color: #b71c1c;
      color: white;
      padding: 30px;
      border-radius: 20px;
      text-align: center;
    }
  </style>

  <!-- Box -->
  <div class="title-box">Data Material</div>
  <div class="form-container">
    <form id="alatForm">
      <div class="mb-3">
        <label class="form-label">Nama Material</label>
        <input type="text" class="form-control" value="Faber Optik">
      </div>
      <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="text" class="form-control" value="111">
      </div>
      <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <select class="form-select">
          <option selected>Madiun</option>
          <option selected>Karangjati</option>
          <option selected>Sumberejo</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Mitra</label>
        <input type="text" class="form-control" value="Putratel">
      </div>
      <div class="mb-3">
        <label class="form-label">Teknisi</label>
        <input type="text" class="form-control" value="Ayu Sukmawati">
      </div>
      <div class="mb-3">
        <label class="form-label">Status Alat</label>
        <select class="form-select">
          <option selected>IN</option>
          <option selected>OUT</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" class="form-control" value="2024-02-18">
      </div>
      <div class="form-actions">
        <button type="reset" class="btn btn-danger">Batal</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Simpan</button>
      </div>
    </form>
  </div>


  <!-- Notifikasi -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-confirm">
        <p>"Apakah Anda yakin data yang diisi sudah benar? Data tidak dapat diubah setelah disimpan."</p>
        <div class="d-flex justify-content-between">
          <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-light">Simpan</button>
        </div>
      </div>
    </div>
  </div>

@endsection
