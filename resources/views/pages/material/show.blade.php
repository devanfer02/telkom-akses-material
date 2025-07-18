@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .details-container {
        max-width: 900px;
        margin: 2rem auto;
        background: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .details-header {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }
    .details-header h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #c8102e;
    }
    .details-header .sub-text {
        color: #6c757d;
        font-size: 1rem;
    }
    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    .detail-item {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 0.25rem;
    }
    .detail-item strong {
        display: block;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    .evidence-section h3 {
        font-size: 1.5rem;
        color: #c8102e;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .evidence-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
    }
    .evidence-grid img {
        width: 100%;
        height: auto;
        border-radius: 0.25rem;
        border: 2px solid #dee2e6;
        transition: transform 0.2s;
    }
    .evidence-grid img:hover {
        transform: scale(1.05);
    }
    .back-button {
        margin-top: 2rem;
    }
</style>

<div class="details-container">
    <div class="details-header">
        <h1>{{ $material->name }}</h1>
        <p class="sub-text">Detail Material | Ditambahkan pada {{ $material->created_at->format('d M Y') }}</p>
    </div>

    <div class="details-grid">
        <div class="detail-item"><strong>Jumlah:</strong> {{ $material->quantity }}</div>
        <div class="detail-item"><strong>Lokasi:</strong> {{ $material->location }}</div>
        <div class="detail-item"><strong>Mitra:</strong> {{ $material->mitra }}</div>
        <div class="detail-item"><strong>Teknisi:</strong> {{ $material->teknisi }}</div>
        <div class="detail-item"><strong>Status:</strong> <span class="badge bg-{{ $material->status == 'IN' ? 'success' : 'danger' }}">{{ $material->status }}</span></div>
        <div class="detail-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($material->date)->format('d M Y') }}</div>
    </div>

    <div class="detail-item" style="grid-column: 1 / -1;">
        <strong>Keterangan:</strong>
        <p>{{ $material->keterangan ?: 'Tidak ada keterangan.' }}</p>
    </div>

    <div class="evidence-section">
        <h3><i class="fas fa-camera"></i> Bukti Foto</h3>
        @if($material->evidence && count(json_decode($material->evidence)) > 0)
            <div class="evidence-grid">
                @foreach(json_decode($material->evidence) as $evidence)
                    <a href="{{ Storage::url($evidence) }}" target="_blank">
                        <img src="{{ Storage::url($evidence) }}" alt="Bukti Foto">
                    </a>
                @endforeach
            </div>
        @else
            <p>Tidak ada bukti foto yang dilampirkan.</p>
        @endif
    </div>

    <a href="{{ route('material.index') }}" class="btn btn-secondary back-button"><i class="fas fa-arrow-left"></i> Kembali ke Daftar</a>
</div>
@endsection
