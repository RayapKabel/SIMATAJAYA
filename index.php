<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMATA - Sistem Informasi Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --smt-blue: #007dabac;
            --smt-yellow: #ffd700;
        }
        /* Gaya yang sudah ada tetap dipertahankan */
        .smt-header {
            background-color: var(--smt-blue);
            color: white;
            padding: 15px 0;
            border-bottom: 4px solid var(--smt-yellow);
        }
        .smt-logo {
            height: 80px;
        }
        .smt-nav {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .smt-nav-link {
            color: var(--smt-blue) !important;
            font-weight: 500;
            padding: 15px 20px !important;
        }
        .smt-hero {
            position: relative;
            color: white;
            padding: 80px 0;
            overflow: hidden;
        }
        .background-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .background-slider .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: slideShow 32s infinite;
        }
        .background-slider .slide:nth-child(1) {
            animation-delay: 0s;
        }
        .background-slider .slide:nth-child(2) {
            animation-delay: 8s;
        }
        .background-slider .slide:nth-child(3) {
            animation-delay: 16s;
        }
        .background-slider .slide:nth-child(4) {
            animation-delay: 24s;
        }
        @keyframes slideShow {
            0% { opacity: 0; }
            6.25% { opacity: 1; }
            25% { opacity: 1; }
            31.25% { opacity: 0; }
            100% { opacity: 0; }
        }
        .smt-hero .container {
            position: relative;
            z-index: 2;
        }
        .smt-hero h2, .smt-hero p {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .smt-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .smt-card:hover {
            transform: translateY(-5px);
        }
        .smt-card-icon {
            font-size: 2.5rem;
            color: var(--smt-blue);
        }
        .smt-footer {
            background-color: var(--smt-blue);
            color: white;
            padding: 40px 0;
        }
        /* Button Styles */
        .login-btn {
            background-color: var(--smt-yellow);
            color: var(--smt-blue);
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #ffca28;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .dropdown-item {
            color: var(--smt-blue);
            padding: 10px 20px;
        }
        .dropdown-item:hover {
            background-color: rgba(0,71,171,0.1);
        }
        .dropdown-toggle::after {
            margin-left: 5px;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--smt-blue);
        }
        .input-group {
            position: relative;
        }
        .search-results {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .search-results h4 {
            color: var(--smt-blue);
            margin-bottom: 20px;
        }
        .search-results .result-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .search-results .result-item:last-child {
            border-bottom: none;
        }
        .no-results {
            color: #666;
            font-style: italic;
        }
        /* Gaya untuk bagian Berita & Event */
        .news-event-section .smt-card {
            margin-bottom: 20px;
        }
        .news-event-section .badge {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        /* Gaya tambahan untuk modal Tautan Cepat */
        .quick-link-modal .modal-header {
            background-color: var(--smt-blue);
            color: white;
        }
        .quick-link-modal .modal-title {
            font-weight: bold;
        }
        .quick-link-modal .btn-close {
            filter: invert(1);
        }
        .quick-link-modal .btn-primary {
            background-color: var(--smt-yellow);
            color: var(--smt-blue);
            border: none;
        }
        .quick-link-modal .btn-primary:hover {
            background-color: #ffca2c;
        }
        /* Tambahan untuk accessibility di modal login/register */
        .modal-header {
            background-color: var(--smt-blue);
            color: white;
            border-bottom: 2px solid var(--smt-yellow);
        }
        .modal-title {
            font-weight: bold;
        }
        .modal-body .form-control {
            border-color: var(--smt-blue);
        }
        .modal-body .btn-warning {
            background-color: var(--smt-yellow);
            color: var(--smt-blue);
            border: none;
        }
        .modal-body .btn-warning:hover {
            background-color: #ffca28;
        }
        .password-toggle {
            top: 70%; /* Adjusted to align with lokasi-kuliner.html */
            z-index: 1000;
        }
        .input-group .form-label {
            width: 100%;
        }
        .input-group .form-control {
            padding-right: 40px;
        }
        /* Posisi tombol login di pojok kanan atas header */
        .login-btn {
    background-color: var(--smt-yellow);
    color: var(--smt-blue);
    font-weight: bold;
    margin-left: 0.5rem;
}

    </style>
</head>
<body>
    <!-- Header -->
    <header class="smt-header position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="images/logo1.png" alt="Logo SIMATA!" class="smt-logo me-3">
                        <div>
                            <h1 class="mb-0">SIMATA</h1>
                            <p class="mb-0">Sistem Informasi Pariwisata</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <span class="me-3">
                            <i class="fas fa-user-circle"></i>
                            <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
                        </span>
                        <a href="logout.php" class="btn btn-sm logout-btn me-2">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    <?php else : ?>
                        <a href="#" class="btn btn-sm login-btn me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fas fa-user me-1"></i> Login
                        </a>
                    <?php endif; ?>
                    <a href="#" class="btn btn-sm btn-outline-light">
                        <i class="fas fa-question-circle me-1"></i> Bantuan
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg smt-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka atau tutup menu navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link smt-nav-link active" href="index.php"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link smt-nav-link dropdown-toggle" href="#" id="destinasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-map-marked-alt me-1"></i> Destinasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><a class="dropdown-item" href="lokasi-wisata.php"><i class="fas fa-location-dot me-2"></i> Lokasi Wisata</a></li>
                            <li><a class="dropdown-item" href="dokumentasi.html"><i class="fas fa-camera me-2"></i> Dokumentasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link smt-nav-link dropdown-toggle" href="#" id="akomodasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-alt me-1"></i> Akomodasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="akomodasiDropdown">
                            <li><a class="dropdown-item" href="lokasi-hotel.html"><i class="fas fa-hotel me-2"></i> Hotel</a></li>
                            <li><a class="dropdown-item" href="lokasi-villa.html"><i class="fas fa-home me-2"></i> Villa</a></li>
                            <li><a class="dropdown-item" href="lokasi-homestay.html"><i class="fas fa-bed me-2"></i> Homestay</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smt-nav-link" href="lokasi-kuliner.html"><i class="fas fa-utensils me-2"></i> Kuliner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smt-nav-link" href="event.php"><i class="fas fa-calendar-alt me-1"></i> Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smt-nav-link" href="#" data-bs-toggle="modal" data-bs-target="#informasiModal"><i class="fas fa-info-circle me-1"></i> Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section dengan slider latar belakang tanpa overlay biru -->
    <section class="smt-hero">
        <div class="background-slider">
            <div class="slide" style="background-image: url('images/bg6.jpeg');"></div>
            <div class="slide" style="background-image: url('images/bg1.jpeg');"></div>
            <div class="slide" style="background-image: url('images/bg4.jpeg');"></div>
            <div class="slide" style="background-image: url('images/bg3.jpeg');"></div>
        </div>
        <div class="container text-center">
            <h2 class="display-4 fw-bold mb-4">INFORMASI PARIWISATA</h2>
            <p class="lead mb-5">Layanan digital untuk destinasi wisata, destinasi kuliner, dan informasi pariwisata</p>
            <div class="row g-3 justify-content-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" id="searchInput" placeholder="Cari destinasi wisata, kuliner, akomodasi, atau event..." aria-label="Cari destinasi atau event">
                        <button class="btn btn-warning btn-lg" type="button" id="searchButton" aria-label="Tombol pencarian"><i class="fas fa-search me-1"></i> Cari</button>
                    </div>
                </div>
            </div>
            <div id="searchResults" class="search-results d-none"></div>
        </div>
    </section>

    <!-- Bagian Berita & Event -->
    <section class="py-5 bg-light news-event-section">
        <div class="container">
            <h3 class="mb-4">BERITA & EVENT</h3>
            <div class="row">
                <!-- Item Berita -->
                <div class="col-md-6">
                    <div class="card smt-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="imgev/carnivalnight.jpg" class="img-fluid" alt="Berita Semarang Night Carnival" onerror="this.src='https://via.placeholder.com/200x150?text=Gambar+Tidak+Tersedia'">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-primary">Berita</span>
                                    <h5 class="card-title">Semarang Night Carnival 2025 Segera Digelar</h5>
                                    <p class="card-text">Parade budaya dengan kostum spektakuler akan berlangsung di Simpang Lima pada 15 Juni 2025.</p>
                                    <p class="card-text"><small class="text-muted">30 Mei 2025</small></p>
                                    <a href="event.php" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item Event 1 -->
                <div class="col-md-6">
                    <div class="card smt-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="imgev/kotalama.jpeg" class="img-fluid" alt="Festival Kota Lama 2025" onerror="this.src='https://via.placeholder.com/200x150?text=Gambar+Tidak+Tersedia'">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-success">Event</span>
                                    <h5 class="card-title">Festival Kota Lama 2025</h5>
                                    <p class="card-text">Acara tahunan di Kota Lama akan diadakan pada 25-27 Juni 2025.</p>
                                    <p class="card-text"><small class="text-muted">29 Mei 2025</small></p>
                                    <a href="event.php" class="btn btn-sm btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item Event 2 -->
                <div class="col-md-6">
                    <div class="card smt-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="imgev/kuliner.jpeg" class="img-fluid" alt="Pameran Kuliner Semarang" onerror="this.src='https://via.placeholder.com/200x150?text=Gambar+Tidak+Tersedia'">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-success">Event</span>
                                    <h5 class="card-title">Pameran Kuliner Semarang</h5>
                                    <p class="card-text">Nikmati kuliner khas Semarang di PRPP pada 10-12 Juni 2025.</p>
                                    <p class="card-text"><small class="text-muted">28 Mei 2025</small></p>
                                    <a href="event.php" class="btn btn-sm btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="smt-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>KONTAK KAMI</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Gubernur Mochtar, Tembalang, Semarang 50275</p>
                    <p><i class="fas fa-phone me-2"></i> 08998639593</p>
                    <p><i class="fas fa-envelope me-2"></i> info@wisatayuk.go.id</p>
                </div>
                <div class="col-md-4">
                    <h5>TAUTAN CEPAT</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" data-bs-toggle="modal" data-bs-target="#privacyModal">Kebijakan Privasi</a></li>
                        <li><a class="text-white" data-bs-toggle="modal" data-bs-target="#termsModal">Syarat dan Ketentuan</a></li>
                        <li><a class="text-white" data-bs-toggle="modal" data-bs-target="#faqModal">FAQ</a></li>
                        <li><a class="text-white" data-bs-toggle="modal" data-bs-target="#sitemapModal">Peta Situs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>TERHUBUNG</h5>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="https://www.instagram.com/ptrp.jaya/#" class="text-white me-2"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">© 2025 SIMATA - Sistem Informasi Pariwisata.</p>
            </div>
        </div>
    </footer>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login ke SIMATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="loginEmail" required>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="loginPassword" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('loginPassword', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                            <a href="#" class="text-primary d-block mt-1 mb-2" style="font-size: 0.95rem;">Lupa Password?</a>
                            <button type="submit" class="btn btn-warning w-100 d-block mx-auto" style="max-width: 100%;">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" id="registerLink">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Daftar Akun SIMATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" id="registerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="registerEmail" required>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="registerPassword" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('registerPassword', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="registerConfirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="registerConfirmPassword" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('registerConfirmPassword', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 d-block mx-auto" style="max-width: 100%;">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Informasi -->
    <div class="modal fade quick-link-modal" id="informasiModal" tabindex="-1" aria-labelledby="informasiModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="informasiModalLabel">Informasi SIMATA</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal"></button>
                 </div>
                 <div class="modal-body">
                     <p>SIMATA (Sistem Informasi Pariwisata) adalah platform digital untuk informasi lengkap seputar pariwisata di Semarang dan sekitarnya. Kami menawarkan:</p>
                     <ul>
                         <li>Pencarian destinasi wisata populer.</li>
                         <li>Informasi akomodasi mulai dari hotel hingga homestay.</li>
                         <li>Rekomendasi kuliner khas daerah.</li>
                         <li>Detail event dan berita terkini seputar pariwisata.</li>
                     </ul>
                     <p>Hubungi kami di <a href="mailto:info@wisatayuk.go.id">info@wisatayuk.go.id</a> untuk pertanyaan lebih lanjut!</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>
     
    <!-- Modal Kebijakan Privasi -->
    <div class="modal fade quick-link-modal" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Kebijakan Privasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal kebijakan privasi"></button>
                </div>
                <div class="modal-body">
                    <p>Kami di SIMATA berkomitmen untuk melindungi privasi pengguna. Informasi pribadi yang dikumpulkan hanya digunakan untuk meningkatkan pengalaman pengguna dan tidak akan dibagikan tanpa persetujuan.</p>
                    <p>Untuk detail lebih lanjut, silakan hubungi kami di info@wisatayuk.go.id.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Syarat dan Ketentuan -->
    <div class="modal fade quick-link-modal" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Syarat dan Ketentuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal syarat dan ketentuan"></button>
                </div>
                <div class="modal-body">
                    <p>Dengan menggunakan SIMATA, Anda setuju untuk mematuhi syarat dan ketentuan kami. Semua konten di situs ini hanya untuk tujuan informasi dan dapat berubah tanpa pemberitahuan.</p>
                    <p>Harap baca syarat lengkap di situs resmi kami.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FAQ -->
    <div class="modal fade quick-link-modal" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel">FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal FAQ"></button>
                </div>
                <div class="modal-body">
                    <h6>Bagaimana cara memesan akomodasi?</h6>
                    <p>Gunakan fitur pencarian untuk menemukan hotel, villa, atau homestay, lalu ikuti tautan untuk reservasi.</p>
                    <h6>Apakah SIMATA menyediakan pemesanan tiket event?</h6>
                    <p>Belum, tetapi Anda dapat melihat detail lokasi kuliner di halaman Event.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Peta Situs -->
    <div class="modal fade quick-link-modal" id="sitemapModal" tabindex="-1" aria-labelledby="sitemapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sitemapModalLabel">Peta Situs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal peta situs"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="lokasi-wisata.html">Destinasi - Lokasi Wisata</a></li>
                        <li><a href="dokumentasi.html">Dokumentasi</a></li>
                        <li><a href="lokasi-hotel.html">Akomodasi - Hotel</a></li>
                        <li><a href="lokasi-villa.html">Akomodasi - Villa</a></li>
                        <li><a href="lokasi-homestay.html">Akomodasi - Homestay</a></li>
                        <li><a href="lokasi-kuliner.html">Kuliner</a></li>
                        <li><a href="event.php">Event</a></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bootstrap & Custom -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            if (input.type === "password") {
                input.type = "text";
                btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = "password";
                btn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        // Penanganan link registrasi dalam modal login
        document.getElementById('registerLink')?.addEventListener('click', function(e) {
            e.preventDefault();
            const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
            loginModal.hide();
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        });
    </script>
</body>
</html>
