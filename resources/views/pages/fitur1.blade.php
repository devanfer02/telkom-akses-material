@extends('layouts.app')

@section('content')
<style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      background-color: #fff;
      color: #222;
    }
    .navbar-light {
      background-color: #d9d9d9;
      padding: 0.75rem 1.5rem;
    }
    .navbar-brand {
      font-weight: 700;
      font-size: 1.4rem;
      color: #434343;
      display: flex;
      align-items: center;
      gap: 0.25rem;
    }
    .navbar-brand .akses {
      color: #e02020;
      font-weight: 700;
    }
    .navbar-brand .subtext {
      font-size: 0.55rem;
      color: #6a6a6a;
      font-weight: 400;
      margin-left: 1rem;
      display: flex;
      align-items: center;
      gap: 0.3rem;
    }
    .navbar-brand .subtext img {
      height: 16px;
      width: auto;
      display: block;
    }
    /* Nav item spacing */
    .navbar-nav .nav-link {
      color: #121212;
      font-weight: 500;
      font-size: 1rem;
      padding-right: 1.25rem;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: #e02020;
      text-decoration: none;
    }
    /* Search icon */
    .nav-search {
      cursor: pointer;
      font-size: 1.25rem;
      color: #121212;
    }
    .nav-search:hover {
      color: #e02020;
    }
    /* Hero area */
    .hero {
      max-width: 960px;
      margin: 2.5rem auto 5rem;
      background: linear-gradient(180deg, #E71C24 0%, #7A1011 100%);
      border-radius: 12px;
      padding: 3rem 2rem;
      color: white;
      text-align: center;
      box-shadow: 0 6px 18px rgb(255 36 41 / 0.5);
    }
    .hero-icons {
      display: flex;
      justify-content: center;
      gap: 3rem;
      margin-bottom: 1.3rem;
      flex-wrap: wrap;
    }
    .hero-icons svg, .hero-icons img {
      width: 120px;
      height: auto;
      max-width: 100%;
    }
    .hero-title {
      font-weight: 700;
      font-size: 1.9rem;
      margin-bottom: 1.2rem;
      text-shadow: 0 1px 6px rgb(0 0 0 / 0.3);
    }
    .hero-text {
      font-size: 1.1rem;
      max-width: 720px;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.5;
      text-shadow: 0 1px 8px rgb(0 0 0 / 0.25);
    }
    /* Button */
    .btn-kembali {
      margin-top: 2.5rem;
      background-color: white;
      color: #121212;
      font-weight: 600;
      padding-left: 1.25rem;
      padding-right: 1.25rem;
      border-radius: 6px;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      border: none;
      transition: background-color 0.3s ease, color 0.3s ease;
      user-select: none;
    }
    .btn-kembali:hover, .btn-kembali:focus {
      background-color: #f3f3f3;
      color: #e02020;
      outline: none;
    }
    /* Footer */
    footer {
      background-color: #130b10;
      color: white;
      padding: 1.75rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 400;
      font-size: 0.9rem;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .footer-text {
      flex-grow: 1;
      min-width: 220px;
    }
    .social-icons {
      display: flex;
      gap: 1.5rem;
      font-size: 1.5rem;
    }
    .social-icons a {
      color: white;
      transition: color 0.3s ease;
    }
    .social-icons a:hover,
    .social-icons a:focus {
      color: #e02020;
      text-decoration: none;
      outline: none;
    }
    /* Responsive */
    @media (max-width: 575.98px) {
      .hero {
        padding: 2rem 1.25rem;
      }
      .hero-icons {
        gap: 2rem;
      }
      footer {
        flex-direction: column;
        align-items: flex-start;
      }
      .social-icons {
        font-size: 1.3rem;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->


  <!-- Hero Section -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="hero-icons" role="img" aria-label="Illustration of smartphone map with clock icons and server with stopwatch icon">
      <img src="{{ asset('images/Group 32.png') }}" alt="Isometric smartphone with map showing locations and clock, representing real-time tracking" onerror="this.style.display='none'" />
    </div>
    <h1 class="hero-title" id="hero-title">Pelacakan Alat Secara Real-Time</h1>
    <p class="hero-text">
      Pantau posisi dan status alat secara langsung, sehingga memudahkan pengawasan penggunaan alat di lapangan dengan akurat dan efisien. Dengan demikian, pengawasan di lapangan menjadi lebih efisien, meminimalkan kehilangan, dan mendukung pengambilan keputusan yang cepat serta tepat.
    </p>
    <button type="button" class="btn btn-kembali" aria-label="Kembali ke halaman sebelumnya" id="btn-kembali">
      <i class="bi bi-arrow-left"></i> Kembali
    </button>
  </section>

  <!-- Bootstrap JS bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Example behavior for 'Kembali' button - navigating back
    document.getElementById('btn-kembali').addEventListener('click', function () {
      if (window.history.length > 1) {
        window.history.back();
      } else {
        // fallback if no history
        window.location.href = '#';
      }
    });
  </script>
@endsection
