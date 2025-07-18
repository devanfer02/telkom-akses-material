@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #fff;
        color: #333;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .main-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        padding: 2rem;
        max-width: 1200px;
        margin: auto;
    }
    .camera-section, .preview-section {
        flex: 1;
        min-width: 300px;
    }
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #c8102e;
        margin-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 0.5rem;
    }
    #camera-container {
        position: relative;
        width: 100%;
        background: #000;
        border-radius: 0.5rem;
        overflow: hidden;
        border: 1px solid #ddd;
    }
    video {
        width: 100%;
        display: block;
    }
    canvas {
        display: none;
    }
    .camera-overlay {
        position: absolute;
        color: white;
        text-shadow: 1px 1px 3px #000;
        user-select: none;
        pointer-events: none;
    }
    #timestamp {
        bottom: 10px;
        left: 10px;
        font-size: 1.2rem;
        font-weight: bold;
    }
    #location {
        bottom: 40px;
        left: 10px;
        font-size: 0.8rem;
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
    .btn-main {
        background-color: #c8102e;
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 0.3rem;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-main:hover {
        background-color: #a20d23;
    }
    .btn-secondary {
        background-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
    #preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 1rem;
    }
    .preview-item {
        position: relative;
        border: 1px solid #ddd;
        border-radius: 0.3rem;
        overflow: hidden;
    }
    .preview-item img {
        width: 100%;
        height: auto;
        display: block;
    }
    .preview-item .delete-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="main-container">
    <div class="camera-section">
        <h2 class="section-title">Ambil Bukti Foto</h2>
        <div id="camera-container">
            <video id="video" autoplay muted playsinline></video>
            <div id="timestamp" class="camera-overlay"></div>
            <div id="location" class="camera-overlay">Mendapatkan lokasi...</div>
        </div>
        <div class="action-buttons">
            <button id="shot-button" class="btn-main"><i class="fas fa-camera"></i> Ambil Foto</button>
        </div>
    </div>

    <div class="preview-section">
        <h2 class="section-title">Pratinjau</h2>
        <div id="preview-grid">
            <!-- Captured photos will be appended here -->
        </div>
        <div class="action-buttons">
            <button id="save-button" class="btn-main"><i class="fas fa-save"></i> Simpan</button>
            <button id="cancel-button" class="btn-main btn-secondary"><i class="fas fa-times"></i> Batal</button>
        </div>
    </div>

    <canvas id="canvas"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const timestampEl = document.getElementById("timestamp");
    const locationEl = document.getElementById("location");
    const shotButton = document.getElementById("shot-button");
    const saveButton = document.getElementById("save-button");
    const cancelButton = document.getElementById("cancel-button");
    const previewGrid = document.getElementById("preview-grid");

    let capturedPhotos = [];

    function formatDateTime(date) {
        const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
        return new Intl.DateTimeFormat('id-ID', options).format(date).replace(/\./g, ':');
    }

    async function getAddress(lat, lon) {
        try {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
            const response = await fetch(url, { headers: { "User-Agent": "Mozilla/5.0" }});
            if (!response.ok) return "Alamat tidak ditemukan";
            const data = await response.json();
            return data.display_name || "Alamat tidak ditemukan";
        } catch(e) {
            return "Gagal mendapatkan alamat";
        }
    }

    function updateOverlay() {
        timestampEl.textContent = formatDateTime(new Date());
    }

    async function startCamera() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } });
            video.srcObject = stream;
            await video.play();
        } catch (error) {
            alert("Tidak dapat mengakses kamera: " + error.message);
        }
    }

    function getLocation() {
        navigator.geolocation.getCurrentPosition(async (pos) => {
            const { latitude, longitude } = pos.coords;
            const address = await getAddress(latitude, longitude);
            locationEl.textContent = address;
        }, (error) => {
            locationEl.textContent = "Lokasi tidak diizinkan.";
        }, { enableHighAccuracy: false });
    }

    function drawOverlayOnCanvas(ctx) {
        const now = new Date();
        const timestampText = formatDateTime(now);
        const locationText = locationEl.textContent;

        ctx.font = "bold 20px Arial";
        ctx.fillStyle = "white";
        ctx.shadowColor = "black";
        ctx.shadowBlur = 7;

        ctx.fillText(timestampText, 10, canvas.height - 40);
        ctx.fillText(locationText, 10, canvas.height - 15);
    }

    function renderPreviews() {
        previewGrid.innerHTML = '';
        capturedPhotos.forEach((photoDataUrl, index) => {
            const item = document.createElement('div');
            item.className = 'preview-item';

            const img = document.createElement('img');
            img.src = photoDataUrl;
            item.appendChild(img);

            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'delete-btn';
            deleteBtn.innerHTML = '<i class="fas fa-times"></i>';
            deleteBtn.onclick = () => {
                capturedPhotos.splice(index, 1);
                renderPreviews();
            };
            item.appendChild(deleteBtn);

            previewGrid.appendChild(item);
        });
    }

    async function capturePhoto() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const ctx = canvas.getContext("2d");
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        drawOverlayOnCanvas(ctx);

        const finalImageUrl = canvas.toDataURL("image/jpeg", 0.9);
        capturedPhotos.push(finalImageUrl);
        renderPreviews();
    }

    shotButton.addEventListener("click", capturePhoto);

    cancelButton.addEventListener("click", () => {
        capturedPhotos = [];
        renderPreviews();
    });

    saveButton.addEventListener("click", () => {
        if (capturedPhotos.length === 0) {
            alert("Silakan ambil foto terlebih dahulu.");
            return;
        }
        localStorage.setItem('capturedEvidence', JSON.stringify(capturedPhotos));
        window.location.href = "{{ route('material.create') }}";
    });

    // Initialize
    startCamera();
    getLocation();
    setInterval(updateOverlay, 1000);
});
</script>
@endsection
