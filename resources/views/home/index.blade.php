<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PT Telkom Akses Madiun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script>
  function toggleSearch() {
    const box = document.getElementById('searchBox');
    if (box.style.display === 'none' || box.style.display === '') {
      box.style.display = 'flex';
    } else {
      box.style.display = 'none';
    }
  }
</script>

  <style>
    /* Reset some default stylings */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
      color: #212529;
      margin: 0;
      padding: 0;
    }
    /* Header Navbar */
    .navbar-light {
      background-color: #f8f9fa;
      padding: 0.8rem 2rem;
      box-shadow: 0 2px 6px rgb(0 0 0 / 0.05);
      font-weight: 600;
    }

    .navbar-brand {
      font-weight: 800;
      color: #B6252A !important;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.2rem;
    }
    .navbar-brand small {
      font-size: 0.52rem;
      font-weight: 300;
      color: #666;
      display: block;
      margin-left: 0.4rem;
      font-family: 'Poppins', sans-serif;
    }
    /* To replicate the "Akses" with red star and Telkom Indonesia logo */
    .brand-red-text {
      color: #B6252A;
      font-weight: 800;
    }
    .brand-star {
      position: relative;
      display: inline-block;
      margin-left: 4px;
      width: 14px;
      height: 14px;
    }
    .brand-star svg {
      fill: #B6252A;
      width: 14px;
      height: 14px;
    }
    .telkom-mini {
      height: 40px;
      width: auto;
      display: inline-block;
    }

    /* Navigation links */
    .nav-link {
      color: #212529;
      font-weight: 600;
      margin-left: 1rem;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .nav-link:hover {
      color: #B6252A;
      text-decoration: none;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* HERO section */
    .hero {
      position: relative;
      overflow: hidden;
      padding: 2rem 2rem 2rem 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('Teknisi-Telkom-Indihome.jpg');
      background-size: cover;
      background-position: center;
      color: #212529;
      min-height: 650px;
    }
    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(255, 255, 255, 0.75);
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 620px;
    }
    .hero-content h1 {
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: #212529;
    }
    .hero-content p {
      font-size: 1.05rem;
      line-height: 1.5;
      color: #212529;
      margin-bottom: 2rem;
    }
    .btn-primary {
      background-color: #B6252A;
      border-color: #B6252A;
      font-weight: 600;
    }
    .btn-primary:hover {
      background-color: #B6252A;
      border-color: #B6252A;
    }
    .btn-outline-primary {
      color: #212529;
      border-color: #212529;
      font-weight: 600;
    }
    .btn-outline-primary:hover {
      background-color: #B6252A;
      border-color: #B6252A;
      color: white;
    }
    .navbar .search-icon {
      cursor: pointer;
      width: 18px;
      height: 18px;
      stroke-width: 2;
      stroke: #333333;
    }

    /* Features Section */
    .features {
      padding: 4rem 2rem 6rem 2rem;
      background-color: #fff;
      text-align: center;
    }
    .features h2 {
      font-weight: 700;
      margin-bottom: 3rem;
      font-size: 2rem;
      color: #212529;
    }
    .feature-card {
      background: linear-gradient(135deg, #ED1E28 0%, #501012 100%);
      padding: 2rem;
      border-radius: 0.75rem;
      box-shadow: 0 8px 15px rgb(198 46 50 / 0.35);
      color: #fff;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: box-shadow 0.3s ease;
    }
    .feature-card:hover {
      box-shadow: 0 12px 24px rgb(198 46 50 / 0.6);
    }
    .feature-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 1rem;
      filter: drop-shadow(0px 1px 2px rgba(0,0,0,0.2));
      align-self: center;
    }
    .feature-title {
      font-weight: 700;
      font-size: 1.2rem;
      margin-bottom: 0.75rem;
    }
    .feature-desc {
      font-size: 0.95rem;
      flex-grow: 1;
      line-height: 1.4;
      margin-bottom: 1.5rem;
    }
    .feature-btn {
      color: white;
      font-weight: 600;
      text-decoration: none;
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      justify-content: center;
    }
    .feature-btn svg {
      stroke: white;
      stroke-width: 2;
    }
    .feature-btn:hover {
      text-decoration: underline;
    }

    /* AHLAK Section */
    .img-akhlak {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 20px auto; /* biar center dan ada jarak */
      max-height: 450px;  /* batas tinggi supaya gak kedean */
      object-fit: contain;
    }

    /* Footer */
    footer {
      background-color: #100000;
      color: #dadada;
      padding: 3rem 2rem 1rem 2rem;
      font-size: 0.9rem;
    }
    .footer-top {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 2rem;
      margin-bottom: 2rem;
      color: #dadada;
    }
    .social-icons a {
      color: #dadada;
      margin-right: 1rem;
      font-size: 1.4rem;
      transition: color 0.3s ease;
      text-decoration: none;
    }
    .social-icons a:hover {
      color: #B6252A;
    }
    .social-icons svg {
      vertical-align: middle;
    }
    .office-info p, .office-info strong {
      margin: 0;
    }
    .office-info strong {
      font-weight: 600;
    }
    .footer-map iframe, .footer-map img {
      border-radius: 0.6rem;
      width: 100%;
      height: 180px;
      object-fit: cover;
      box-shadow: 0 2px 6px rgb(198 46 50 / 0.15);
    }
    .footer-bottom {
      border-top: 1px solid #3a0808;
      text-align: center;
      padding-top: 1rem;
      color: #9c9c9c;
      font-size: 0.85rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2rem;
      }
      .ahlak-container {
        flex-direction: column;
      }
      .ahlak-image, .ahlak-text {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="logoTA.png" alt="Telkom Indonesia" class="telkom-mini" />
      </a>

      <button
        class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="#dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#data-alat">Data Alat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about-us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profil">Profil</a>
          </li>
          <svg
              class="search-icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
              aria-label="Search icon"
              role="img">
              <circle cx="11" cy="11" r="7" />
              <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" role="banner" aria-label="Welcome hero section with worker image">
    <div class="hero-content" tabindex="0">
      <h1>Selamat Datang di<br>SIALAT PT. Telkom Akses Madiun</h1>
      <p>
        Kami hadir untuk mendukung operasional PT Telkom Akses Madiun melalui sistem pelacakan alat yang efisien, transparan, dan terintegrasi. Temukan kemudahan dalam memantau pergerakan alat, pencatatan inventaris, serta pengelolaan logistik secara real-time.
      </p>
      <div>
        <button type="button" class="btn btn-primary me-3">Mulai</button>
        <button type="button" class="btn btn-outline-primary">Bergabung &rarr;</button>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section class="features container" aria-labelledby="features-heading">
    <h2 id="features-heading">Fitur Yang Disediakan</h2>
    <div class="row g-4">
      <article class="col-md-4">
        <div class="feature-card" tabindex="0" aria-label="Pelacakan Alat Secara Real-Time feature">
          <img src="image 4.png" alt="Illustration of map with location pins and a compass" class="feature-icon" />
          <h3 class="feature-title">Pelacakan Alat Secara Real-Time</h3>
          <p class="feature-desc">
            Pantau posisi dan status alat secara langsung, sehingga memudahkan pengawasan penggunaan alat di lapangan dengan akurat dan efisien.
          </p>
          <a href="#" class="feature-btn" aria-label="Learn more about Pelacakan Alat Secara Real-Time">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right" aria-hidden="true" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
        </div>
      </article>

      <article class="col-md-4">
        <div class="feature-card" tabindex="0" aria-label="Manajemen Inventaris Alat feature">
          <img src="image 5.png" alt="Illustration of warehouse inventory and barcode scanner equipment" class="feature-icon" />
          <h3 class="feature-title">Manajemen Inventaris Alat</h3>
          <p class="feature-desc">
            Catat dan kelola seluruh data alat mulai dari jumlah, kondisi, hingga riwayat penggunaan dalam satu sistem terpusat yang mudah diakses.
          </p>
          <a href="#" class="feature-btn" aria-label="Learn more about Manajemen Inventaris Alat">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right" aria-hidden="true" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
        </div>
      </article>

      <article class="col-md-4">
        <div class="feature-card" tabindex="0" aria-label="Laporan Otomatis dan Terintegrasi feature">
          <img src="image 8.png" alt="Illustration of computer screen showing graphs and charts" class="feature-icon" />
          <h3 class="feature-title">Laporan Otomatis & Terintegrasi</h3>
          <p class="feature-desc">
            Hasilkan laporan penggunaan alat, aktivitas tim, dan logistik dengan cepat dan otomatis untuk mendukung pengambilan keputusan yang lebih tepat.
          </p>
          <a href="#" class="feature-btn" aria-label="Learn more about Laporan Otomatis dan Terintegrasi">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right" aria-hidden="true" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
        </div>
      </article>
    </div>
  </section>

  <!-- AKHLAK Section -->
  <section class="ahlak-section" aria-labelledby="ahlak-heading">
    <div class="ahlak-container container">
      <div class="ahlak-image" aria-hidden="true">
        <img src="AKHLAK.png" alt="Nilai AKHLAK" class="img-akhlak" />
      </div>
    </div>
  </section>

  <!-- Footer -->
  <div class="custom-footer">
  <div class="footer-container">
    <div class="footer-left">
      <h3>Follow sosial media kami</h3>
      <div class="social-icons">
        <a href="https://www.instagram.com/telkomaksesindonesia/" target="_blank" aria-label="Instagram Telkom Akses">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/@TelkomAksesOfficial" target="_blank" aria-label="YouTube Telkom Akses">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://telkomakses.co.id/" target="_blank" aria-label="Website Telkom Akses">
          <i class="fa fa-globe"></i>
        </a>
        <a href="https://www.tiktok.com/@telkomaksesindonesia" target="_blank" aria-label="TikTok Telkom Akses">
          <i class="fab fa-tiktok"></i>
        </a>
      </div>

      <h3>Hubungi kami</h3>
      <p><strong>Kantor Telkom Akses Madiun</strong><br>
        Jl. S. Parman No.31, Oro-oro Ombo,<br>
        Kec. Kartoharjo, Kota Madiun, Jawa Timur 63119<br><br>
        info@telkomakses.co.id
      </p>
    </div>

    <div class="footer-right">
      <h3>Lokasi Kantor</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.481842533782!2d111.5234926!3d-7.1863426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bee4a9c117db%3A0xefd7c8ab1b60c05e!2sJl.%20S.%20Parman%2C%20Oro-oro%20Ombo%2C%20Kec.%20Kartoharjo%2C%20Kota%20Madiun%2C%20Jawa%20Timur%2063119!5e0!3m2!1sen!2sid!4v1655118361180!5m2!1sen!2sid"
        width="100%"
        height="200"
        style="border:0; border-radius: 10px;"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </div>

  <hr>
  <p class="copyright">copyright © 2025 - PT Telkom Akses Madiun.</p>
</div>

<!-- STYLE -->
<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

.custom-footer {
  background-color: #000000;
  color: #fff;
  padding: 50px 20px 20px 20px;
  font-family: 'Poppins', sans-serif;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;
}

.footer-left,
.footer-right {
  flex: 1 1 300px;
}

.footer-left h3,
.footer-right h3 {
  margin-bottom: 15px;
}

.footer-left p {
  margin-top: 10px;
  line-height: 1.7;
}

.social-icons {
  display: flex;
  gap: 15px;
  margin-bottom: 25px;
}

.social-icons a {
  color: white;
  font-size: 22px;
  transition: color 0.3s ease;
}

.social-icons a:hover {
  color: #c8102e;
}

hr {
  border: none;
  border-top: 1px solid #ffffff33;
  margin: 40px 0 20px 0;
}

p.copyright {
  text-align: center;
  font-size: 14px;
  color: #ccc;
}
.custom-footer {
  width: 100vw !important;
  margin-left: calc(-50vw + 50%);
  background-color: #000 !important;
  color: #fff !important;
}

.custom-footer h3, .custom-footer p {
  color: #fff !important;
}
</style>

</body>
</html>
