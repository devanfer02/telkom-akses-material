@extends('layouts.app')

@section('content')

<style>
    /* Custom CSS to match the design */
    body {
        background-color: #f8f8f8; /* Light grey background */
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .section-title-wrapper {
        margin-top: 4rem;
        margin-bottom: 1.5rem;
    }

    .section-title {
        background-color: #d93646; /* Red color from the image */
        color: white;
        padding: 0.6rem 2.5rem;
        border-radius: 50px;
        display: inline-block;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .about-card {
        border-radius: 1.5rem;
        border: none;
    }

    .about-card ul {
        padding-left: 1.2rem;
    }

    .about-card ul li {
        margin-bottom: 0.5rem;
    }

    .icon {
        font-size: 3.5rem;
        margin-top: 3rem;
        margin-bottom: -1rem; /* Pull the title up */
    }

    .vision-text {
        color: #212529;
        font-weight: 700;
        font-size: 1.75rem;
    }

    .mission-list {
        list-style: none;
        padding-left: 0;
        counter-reset: mission-counter;
    }

    .mission-list li {
        counter-increment: mission-counter;
        margin-bottom: 0.75rem;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .mission-list li::before {
        content: counter(mission-counter) ". ";
        font-weight: 700;
    }

    .team-container {
        background-color: #d93646;
        border-radius: 1.5rem;
    }

    .team-member-card {
        background-color: white;
        padding: 0.6rem;
        border-radius: 1.2rem;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .team-member-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .team-member-card img {
        border-radius: 0.8rem;
    }

</style>
</head>
<body>

<div class="container my-5">

    <div class="text-center section-title-wrapper">
        <h2 class="section-title">Tentang Sialat</h2>
    </div>

    <div class="card about-card shadow-sm p-3 p-md-4 mb-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-4 text-center">
                <img src="https://placehold.co/1200x1000" class="img-fluid" style="max-width: 250px;" alt="Phone Illustration">
            </div>
            <div class="col-lg-8">
                <p><strong>SIALAT (Sistem Informasi Alat)</strong> adalah platform digital internal yang dikembangkan oleh PT Telkom Akses Madtun untuk mempermudah proses permintaan, pencatatan, dan pengelolaan alat kerja. Sistem ini dirancang agar seluruh kegiatan operasional yang melibatkan penggunaan alat dapat dipantau secara efisien, transparan, dan terintegrasi. Dengan SIALAT, tim operasional dapat:</p>
                <ul>
                    <li>Mengetahui lokasi dan status alat secara real-time,</li>
                    <li>Mengelola inventaris dengan akurat,</li>
                    <li>Membuat laporan otomatis yang mendukung efisiensi kerja harian.</li>
                </ul>
            </div>
        </div>
    </div>
    <p class="text-center px-md-5">
        SIALAT menjadi bagian dari komitmen kami dalam mendukung transformasi digital dan meningkatkan kualitas layanan di lapangan.
    </p>

    <div class="text-center icon">💡</div>
    <div class="text-center section-title-wrapper">
        <h2 class="section-title">Visi</h2>
    </div>
    <h3 class="text-center vision-text px-md-5">
        Menjadi Mitra Strategis Pilihan Telco Di Indonesia Untuk Memajukan Masyarakat
    </h3>

    <div class="text-center icon">🎯</div>
    <div class="text-center section-title-wrapper">
        <h2 class="section-title">Misi</h2>
    </div>
    <div class="d-flex justify-content-center">
        <ol class="mission-list text-start">
            <li>Mempercepat Pembangunan Infrastruktur Digital Dan Pengelolaan Layanan Yang Berkualitas</li>
            <li>Mengorkestrasi Ekosistem Infrastruktur Digital Untuk Memberikan Pengalaman Pelanggan Yang Unggul</li>
            <li>Mengembangkan Talenta Digital Unggul Dan Kapabilitas Digital Baru Untuk Memaksimalkan Nilai Bagi Semua Pemangku Kepentingan</li>
        </ol>
    </div>

    <div class="text-center section-title-wrapper">
        <h2 class="section-title">Our Team Member</h2>
    </div>

    <div class="team-container p-4 p-md-5 shadow">
        <div class="row g-4 justify-content-center">
            <div class="col-sm-6 col-md-4">
                <div class="team-member-card shadow-sm">
                    <img src="https://placehold.co/800x1200" class="img-fluid" alt="Team Member 1">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="team-member-card shadow-sm">
                    <img src="https://placehold.co/800x1200" class="img-fluid" alt="Team Member 2">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="team-member-card shadow-sm">
                    <img src="https://placehold.co/800x1200" class="img-fluid" alt="Team Member 3">
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection
