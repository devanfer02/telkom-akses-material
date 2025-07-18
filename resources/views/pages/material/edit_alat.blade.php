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
    <div class="title-box">Perbaharui Data Material</div>
    <div class="form-container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('material.update', $material->id) }}" method="POST" id="editAlatForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Material</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $material->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                    value="{{ old('quantity', $material->quantity) }}">
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <select class="form-select @error('location') is-invalid @enderror" name="location">
                    <option value="Madiun" {{ old('location', $material->location) == 'Madiun' ? 'selected' : '' }}>Madiun
                    </option>
                    <option value="Karangjati" {{ old('location', $material->location) == 'Karangjati' ? 'selected' : '' }}>
                        Karangjati</option>
                    <option value="Sumberejo" {{ old('location', $material->location) == 'Sumberejo' ? 'selected' : '' }}>
                        Sumberejo</option>
                </select>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mitra</label>
                <input type="text" class="form-control @error('mitra') is-invalid @enderror" name="mitra"
                    value="{{ old('mitra', $material->mitra) }}">
                @error('mitra')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Teknisi</label>
                <input type="text" class="form-control @error('teknisi') is-invalid @enderror" name="teknisi"
                    value="{{ old('teknisi', $material->teknisi) }}">
                @error('teknisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Status Alat</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status">
                    <option value="IN" {{ old('status', $material->status) == 'IN' ? 'selected' : '' }}>IN</option>
                    <option value="OUT" {{ old('status', $material->status) == 'OUT' ? 'selected' : '' }}>OUT</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                    value="{{ old('date', $material->date) }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" style="resize: none" name="keterangan" rows="5" placeholder="Masukkan keterangan (opsional)" >{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-actions">
                <button type="reset" class="btn btn-danger">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmModal">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Notifikasi -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-confirm">
                <p>"Apakah Anda yakin data yang diisi sudah benar?"</p>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-light" type="submit" form="editAlatForm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
