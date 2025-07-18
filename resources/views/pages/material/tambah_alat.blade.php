@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
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
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .form-label {
            font-weight: 500;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }
        .btn-custom {
            background-color: #c8102e;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #a20d23;
            color: white;
        }
        #evidence-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 5px;
            min-height: 50px;
        }
        .preview-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>

    <div class="title-box">Tambah Data Material</div>
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

        <form action="{{ route('material.store') }}" method="POST" id="alatForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Material</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan Nama Material">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Masukkan Jumlah Material">
                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <select class="form-select @error('location') is-invalid @enderror" name="location">
                    <option value="Madiun" {{ old('location') == 'Madiun' ? 'selected' : '' }}>Madiun</option>
                    <option value="Karangjati" {{ old('location') == 'Karangjati' ? 'selected' : '' }}>Karangjati</option>
                    <option value="Sumberejo" {{ old('location') == 'Sumberejo' ? 'selected' : '' }}>Sumberejo</option>
                </select>
                @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mitra</label>
                <input type="text" class="form-control @error('mitra') is-invalid @enderror" name="mitra" value="{{ old('mitra') }}" placeholder="Masukkan Nama Mitra">
                @error('mitra')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Teknisi</label>
                <input type="text" class="form-control @error('teknisi') is-invalid @enderror" name="teknisi" value="{{ old('teknisi') }}" placeholder="Masukkan Nama Teknisi">
                @error('teknisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Status Alat</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status">
                    <option value="IN" {{ old('status') == 'IN' ? 'selected' : '' }}>IN</option>
                    <option value="OUT" {{ old('status') == 'OUT' ? 'selected' : '' }}>OUT</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', date('Y-m-d')) }}">
                @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" style="resize: none" name="keterangan" rows="5" placeholder="Masukkan keterangan (opsional)" >{{ old('keterangan') }}</textarea>
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label d-block" style="">Bukti Foto</label>
                <a href="{{ route('material.timestamp') }}" class="btn btn-secondary btn-sm mb-2 w-100 py-2">
                    <i class="fas fa-camera"></i> Ambil Foto Bukti
                </a>
                <div id="evidence-preview-container">
                    <!-- Previews will be loaded here by JS -->
                </div>
                <div id="evidence-hidden-inputs">
                    <!-- Hidden inputs for base64 data will be added here -->
                </div>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewContainer = document.getElementById('evidence-preview-container');
        const hiddenInputsContainer = document.getElementById('evidence-hidden-inputs');
        const evidenceData = localStorage.getItem('capturedEvidence');

        if (evidenceData) {
            const photos = JSON.parse(evidenceData);
            if (Array.isArray(photos) && photos.length > 0) {
                previewContainer.innerHTML = ''; // Clear placeholder
                photos.forEach(photoBase64 => {
                    // Display preview image
                    const img = document.createElement('img');
                    img.src = photoBase64;
                    img.className = 'preview-image';
                    previewContainer.appendChild(img);

                    // Create hidden input for the form
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'evidence[]';
                    hiddenInput.value = photoBase64;
                    hiddenInputsContainer.appendChild(hiddenInput);
                });

                // Clear localStorage after loading to prevent re-submission
                localStorage.removeItem('capturedEvidence');
            }
        }
    });
    </script>
@endsection
