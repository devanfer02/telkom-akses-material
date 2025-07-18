@extends('layouts.app')

@section('content')
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: #1a1a1a;
      color: #f9f9f9;
    }
    #camera-container {
      position: relative;
      width: 100%;
      max-width: 480px;
      margin: 0 auto;
      background: #000;
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.8);
    }
    video {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 0.5rem 0.5rem 0 0;
    }
    canvas {
      display: none;
    }
    #timestamp {
      position: absolute;
      bottom: 70px;
      left: 15px;
      font-weight: 700;
      line-height: 1.1;
      color: #fff;
      text-shadow:
         -1px -1px 0 #000,
          1px -1px 0 #000,
         -1px  1px 0 #000,
          1px  1px 0 #000;
      user-select: none;
    }
    #location {
      position: absolute;
      bottom: 35px;
      left: 15px;
      max-width: 70%;
      font-weight: 400;
      color: #ddd;
      text-shadow:
         -1px -1px 0 #000,
          1px -1px 0 #000,
         -1px  1px 0 #000,
          1px  1px 0 #000;
      font-size: 0.7rem;
      user-select: none;
    }
    #photo-code {
      position: absolute;
      bottom: 15px;
      left: 15px;
      font-weight: 600;
      font-size: 0.7rem;
      color: #bbb;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      text-shadow:
         -1px -1px 0 #000,
          1px -1px 0 #000,
         -1px  1px 0 #000,
          1px  1px 0 #000;
      user-select: none;
    }
    #watermark-top {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 0.95rem;
      line-height: 1.1;
      text-align: right;
      user-select: none;
    }
    #watermark-top .title {
      font-weight: 700;
      color: #fbbf24; /* amber-400 */
    }
    #watermark-top .subtitle {
      font-weight: 500;
      color: #eee;
      font-size: 0.85rem;
      margin-top: 2px;
    }
    #watermark-right {
      position: absolute;
      top: 50%;
      right: 5px;
      transform: translateY(-50%) rotate(90deg);
      transform-origin: center;
      font-size: 0.75rem;
      color: #ddd;
      user-select: none;
      letter-spacing: 0.08em;
    }
    #shot-button {
      margin-top: 1rem;
      width: 100%;
      max-width: 480px;
      background-color: #fbbf24;
      color: #111;
      font-weight: bold;
      border: none;
      padding: 1rem;
      border-radius: 0.5rem;
      cursor: pointer;
      box-shadow: 0 5px 10px rgb(251 191 36 / 0.6);
      transition: background-color 0.3s ease;
    }
    #shot-button:hover {
      background-color: #d19c1f;
    }
    #upload-section {
      margin-top: 1rem;
      max-width: 480px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }
    #uploaded-photo {
      max-width: 100%;
      margin-top: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 15px rgba(251,191,36,0.8);
    }
    #message {
      margin-top: 0.75rem;
      color: #fbbf24;
      font-weight: 600;
      font-size: 0.9rem;
    }
  </style>
  <main class="p-4 flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-3xl mb-6 font-semibold text-yellow-400 select-none">Camera Evidence with Timestamp</h1>

    <div id="camera-container" aria-label="Camera preview with timestamp overlay">
      <video id="video" autoplay muted playsinline></video>

      <div id="timestamp" aria-live="polite" aria-atomic="true"></div>
      <div id="location" title="Lokasi otomatis dari browser, jika diizinkan oleh pengguna">Mendapatkan lokasi...</div>
      <div id="photo-code" aria-hidden="true"></div>

      <div id="watermark-top">
        <div class="title">Timemark</div>
        <div class="subtitle">Foto 100% akurat</div>
      </div>
      <div id="watermark-right">Timemark Verified</div>
    </div>

    <button id="shot-button" aria-label="Ambil foto bukti">Ambil Foto Bukti</button>

    <div id="upload-section" role="region" aria-live="polite" aria-atomic="true" aria-relevant="additions">
      <p id="message"></p>
      <img id="uploaded-photo" alt="Foto bukti dengan cap waktu ditampilkan setelah pengambilan foto" / src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6fb8fe6e-f3e5-4ea6-b781-bd9d69b1bd96.png">
    </div>

    <canvas id="canvas"></canvas>
  </main>

  <script>
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const timestampEl = document.getElementById("timestamp");
    const locationEl = document.getElementById("location");
    const photoCodeEl = document.getElementById("photo-code");
    const watermarkRight = document.getElementById("watermark-right");
    const shotButton = document.getElementById("shot-button");
    const uploadedPhoto = document.getElementById("uploaded-photo");
    const message = document.getElementById("message");

    let currentPosition = null;

    // Random Alphanumeric Code generator for Foto Kode
    function generatePhotoCode(length = 14) {
      const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      let result = "";
      for (let i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return result;
    }

    // Format date for timestamp in Indonesian
    function formatDateTime(date) {
      const days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
      const dayName = days[date.getDay()];
      let hh = date.getHours();
      let mm = date.getMinutes();
      if (hh < 10) hh = "0" + hh;
      if (mm < 10) mm = "0" + mm;
      const day = ("0" + date.getDate()).slice(-2);
      const month = ("0" + (date.getMonth()+1)).slice(-2);
      const year = date.getFullYear();
      return {
        time: `${hh}:${mm}`,
        dateStr: `${day}/${month}/${year}`,
        dayName: dayName
      };
    }

    // Reverse geocoding to get address from coordinates
    async function getAddress(lat, lon) {
      try {
        // Using OpenStreetMap Nominatim API (free without API key, reasonable usage limits)
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;
        const response = await fetch(url, { headers: { "User-Agent": "Mozilla/5.0 CameraEvidenceApp" }});
        if (!response.ok) return null;
        const data = await response.json();
        if (!data.address) return null;

        let addr = "";
        if(data.address.road) addr += data.address.road + " ";
        if(data.address.house_number) addr += data.address.house_number + ", ";
        if(data.address.suburb) addr += data.address.suburb + ", ";
        if(data.address.city) addr += data.address.city + ", ";
        else if(data.address.town) addr += data.address.town + ", ";
        else if(data.address.village) addr += data.address.village + ", ";
        if(data.address.state) addr += data.address.state + ", ";
        if(data.address.country) addr += data.address.country;
        return addr.trim().replace(/,\s*$/, "");
      } catch(e) {
        return null;
      }
    }

    // Update timestamp and location on overlay every second
    function updateOverlay() {
      const now = new Date();
      const {time, dateStr, dayName} = formatDateTime(now);
      timestampEl.innerHTML = `<span style="font-size:2.5rem">${time}</span> <span style="font-weight:500;opacity:0.85">| ${dateStr}<br>${dayName}</span>`;
    }

    // Setup video camera feed
    async function startCamera() {
      try {
        const constraints = {
          audio: false,
          video: { facingMode: "environment" }
        };
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        video.srcObject = stream;
        await video.play();
      } catch (error) {
        alert("Tidak dapat mengakses kamera: " + error.message);
      }
    }

    // Get current location and address
    function getLocation() {
      if (!navigator.geolocation) {
        locationEl.textContent = "Geolokasi tidak tersedia";
        return;
      }
      navigator.geolocation.getCurrentPosition(async (pos) => {
        currentPosition = pos.coords;
        locationEl.textContent = "Mencari alamat...";
        const address = await getAddress(pos.coords.latitude, pos.coords.longitude);
        if (address) {
          locationEl.textContent = address;
        } else {
          locationEl.textContent = `Lat: ${pos.coords.latitude.toFixed(5)}, Lon: ${pos.coords.longitude.toFixed(5)}`;
        }
      }, (error) => {
        locationEl.textContent = "Lokasi tidak diizinkan atau gagal diperoleh";
      }, {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
      });
    }

    // Draw overlay text on canvas along with captured image
    function drawOnCanvas(img) {
      const ctx = canvas.getContext("2d");
      canvas.width = img.width;
      canvas.height = img.height;

      // Draw the original image
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

      // Overlay styling
      ctx.fillStyle = "rgba(0,0,0,0.5)";
      ctx.fillRect(0, canvas.height - 150, canvas.width, 150);

      // Text shadow for readability
      ctx.shadowColor = "black";
      ctx.shadowBlur = 10;
      ctx.shadowOffsetX = 2;
      ctx.shadowOffsetY = 2;

      // Get current datetime and text for stamping with Indonesian format
      const now = new Date();
      const {time, dateStr, dayName} = formatDateTime(now);

      const paddingLeft = 30;
      const bottomLine = canvas.height - 20;

      // Large time text
      ctx.font = Math.floor(canvas.height / 10) + "px Arial Black";
      ctx.fillStyle = "#FFF";
      ctx.fillText(time, paddingLeft, bottomLine - 80);

      // Vertical separator line
      ctx.fillStyle = "#fbbf24"; // amber-400
      ctx.fillRect(paddingLeft + ctx.measureText(time).width + 10, bottomLine - 130, 3, 60);

      // Date and weekday below time
      ctx.font = "28px Arial";
      ctx.fillStyle = "#fff";
      ctx.fillText(dateStr, paddingLeft + ctx.measureText(time).width + 25, bottomLine - 45);
      ctx.fillText(dayName, paddingLeft + ctx.measureText(time).width + 25, bottomLine - 15);

      // Location text multiline with smaller font
      ctx.font = "20px Arial";
      ctx.fillStyle = "#ddd";
      const locationText = locationEl.textContent || "Lokasi tidak tersedia";
      const maxWidth = canvas.width - paddingLeft * 2;
      const lines = wrapText(ctx, locationText, maxWidth);
      lines.forEach((line, i) => {
        ctx.fillText(line, paddingLeft, bottomLine - 80 + (i * 26));
      });

      // Horizontal line above photo code
      ctx.strokeStyle = "#666";
      ctx.lineWidth = 1;
      ctx.beginPath();
      ctx.moveTo(paddingLeft, bottomLine - 10);
      ctx.lineTo(canvas.width - paddingLeft, bottomLine - 10);
      ctx.stroke();

      // Photo code text
      const photoCode = photoCodeEl.textContent || generatePhotoCode();
      ctx.font = "18px Arial Black";
      ctx.fillStyle = "#999";
      ctx.fillText("Kode Foto: ", paddingLeft, bottomLine + 15);
      ctx.fillStyle = "#ccc";
      ctx.fillText(photoCode, paddingLeft + ctx.measureText("Kode Foto: ").width, bottomLine + 15);

      // Watermark top right
      ctx.font = "22px Arial Black";
      ctx.fillStyle = "#fbbf24";
      const watermarkTitle = "Timemark";
      ctx.fillText(watermarkTitle, canvas.width - paddingLeft - ctx.measureText(watermarkTitle).width, 40);
      ctx.font = "18px Arial";
      ctx.fillStyle = "#eee";
      const watermarkSub = "Foto 100% akurat";
      ctx.fillText(watermarkSub, canvas.width - paddingLeft - ctx.measureText(watermarkSub).width, 70);

      // Watermark vertical right
      ctx.save();
      ctx.translate(canvas.width - 10, canvas.height / 2);
      ctx.rotate(Math.PI / 2);
      ctx.font = "18px Arial";
      ctx.fillStyle = "#ddd";
      ctx.fillText("Timemark Verified", 0, 0);
      ctx.restore();
    }

    // Helper function to wrap text for canvas
    function wrapText(ctx, text, maxWidth) {
      const words = text.split(" ");
      let lines = [];
      let line = "";
      for (let n = 0; n < words.length; n++) {
        let testLine = line + words[n] + " ";
        let metrics = ctx.measureText(testLine);
        let testWidth = metrics.width;
        if (testWidth > maxWidth && n > 0) {
          lines.push(line.trim());
          line = words[n] + " ";
        } else {
          line = testLine;
        }
      }
      lines.push(line.trim());
      return lines;
    }

    // Capture photo with overlay
    async function capturePhoto() {
      try {
        // Create image from video
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const ctx = canvas.getContext("2d");
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Create image object from canvas capture to add overlays also on the canvas of photo
        const imgUrl = canvas.toDataURL("image/png");
        const img = new Image();
        img.src = imgUrl;

        await new Promise(resolve => (img.onload = resolve));

        // Generate photo code and set on overlay text
        let photoCode = generatePhotoCode();
        photoCodeEl.textContent = photoCode;

        // Draw all overlays on canvas with image
        drawOnCanvas(img);

        // Prepare final image URL with overlays
        const finalImageUrl = canvas.toDataURL("image/jpeg", 1.0);

        // Show captured photo with overlays on UI
        uploadedPhoto.src = finalImageUrl;
        uploadedPhoto.alt = `Foto bukti dengan cap waktu dan lokasi, diambil pada ${timestampEl.textContent}`;

        // Display success message
        message.textContent = "Foto bukti berhasil diambil dan terintegrasi time stamp dengan lokasi.";

        // MOCK upload simulation
        // Normally here you upload finalImageUrl (base64) or blob to a server endpoint
        // For demo, we just simulate delay
        // await uploadPhoto(finalImageUrl);

      } catch (error) {
        message.textContent = "Gagal mengambil foto: " + error.message;
      }
    }

    // Initialize camera and location, update timestamp every second
    async function init() {
      await startCamera();
      getLocation();
      updateOverlay();
      setInterval(updateOverlay, 1000);
    }

    shotButton.addEventListener("click", () => {
      capturePhoto();
    });

    init();
  </script>
@endsection
