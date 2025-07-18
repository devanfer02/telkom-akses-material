@extends('layouts.app')

@section('content')
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


    .table td button {
        padding: 5px 8px;
        font-size: 14px;
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

  <!-- Header -->
  <div class="header-title">Data Material</div>


  <!-- Tabel -->
  <div class="container table-wrapper">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <a href="{{ route('material.create') }}" class="btn btn-add mb-3"><i class="fas fa-plus"></i> Tambah Alat</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>TGL</th>
          <th>NAMA MATERIAL</th>
          <th>JUMLAH</th>
          <th>LOKASI</th>
          <th>MITRA</th>
          <th>TEKNISI</th>
          <th>STATUS</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($materials as $material)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $material->date }}</td>
          <td>{{ $material->name }}</td>
          <td>{{ $material->quantity }}</td>
          <td>{{ $material->location }}</td>
          <td>{{ $material->mitra }}</td>
          <td>{{ $material->teknisi }}</td>
          <td>{{ $material->status }}</td>
          <td>
            <a href="{{ route('material.edit', $material->id) }}" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i></a>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-id="{{ $material->id }}">
                <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form id="deleteForm" method="POST" action="">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteConfirmModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var materialId = button.getAttribute('data-id');
            var form = document.getElementById('deleteForm');
            var action = "{{ route('material.destroy', ':id') }}";
            action = action.replace(':id', materialId);
            form.action = action;
        });
    });
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
