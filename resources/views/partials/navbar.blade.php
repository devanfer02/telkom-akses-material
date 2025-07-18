<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" aria-label="Logo Telkom Akses by Telkom Indonesia">
            <img src="{{ asset('images/logoTA.png') }}" alt="Logo Telkom Akses">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/material">Data Alat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                @if(auth('web')->user())
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profil</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/auth/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/login">Login</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link nav-search" href="#" aria-label="Search">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
