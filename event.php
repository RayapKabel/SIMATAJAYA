<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Event - Semarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous">
    <style>
        :root {
            --bpn-blue: #007dabac;
            --bpn-yellow: #ffd700;
        }

        /* Header Styles */
        .bpn-header {
            background-color: var(--bpn-blue);
            color: white;
            padding: 1rem 0;
            border-bottom: 4px solid var(--bpn-yellow);
        }
        .bpn-logo {
            height: 60px;
        }

        /* Navigation Styles */
        .bpn-nav {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .bpn-nav-link {
            color: var(--bpn-blue) !important;
            font-weight: 500;
            padding: 0.75rem 1.25rem !important;
            transition: background-color 0.3s;
        }
        .bpn-nav-link:hover {
            background-color: rgba(0,71,171,0.1);
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            animation: fadeIn 0.3s ease-in;
        }
        .dropdown-item {
            color: var(--bpn-blue);
            padding: 0.5rem 1.25rem;
            transition: background-color 0.3s;
        }
        .dropdown-item:hover {
            background-color: rgba(0,71,171,0.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Footer Styles */
        .bpn-footer {
            background-color: var(--bpn-blue);
            color: white;
            padding: 2.5rem 0;
        }
        .bpn-footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        .bpn-footer a:hover {
            color: var(--bpn-yellow);
        }

        /* Button Styles */
        .login-btn {
            background-color: var(--bpn-yellow);
            color: var(--bpn-blue);
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

        /* Modal Styles */
        .modal-header {
            background-color: var(--bpn-blue);
            color: white;
            border-bottom: 2px solid var(--bpn-yellow);
        }
        .modal-title {
            font-weight: bold;
        }
        .modal-body .form-control {
            border-color: var(--bpn-blue);
        }
        .modal-body .btn-warning {
            background-color: var(--bpn-yellow);
            color: var(--bpn-blue);
            border: none;
        }
        .modal-body .btn-warning:hover {
            background-color: #ffca28;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            color: var(--bpn-blue);
            z-index: 1000;
        }
        .input-group {
            position: relative;
        }
        .input-group .form-label {
            width: 100%;
        }
        .input-group .form-control {
            padding-right: 40px;
        }

        /* Page Hero Styles */
        .page-hero {
            background-color: var(--bpn-blue);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        /* Event Card Styles */
        .event-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 1.25rem;
        }
        .event-card:hover {
            transform: translateY(-5px);
        }
        .event-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .event-icon {
            color: var(--bpn-yellow);
            margin-right: 0.3125rem;
        }
        .category-badge {
            background-color: var(--bpn-blue);
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .bpn-header {
                padding: 0.75rem 0;
            }
            .bpn-logo {
                height: 50px;
            }
            .page-hero h2 {
                font-size: 2rem;
            }
            .event-img {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bpn-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="images/logo1.png" alt="Logo SIMATA" class="bpn-logo me-3">
                        <div>
                            <h1 class="mb-0">SIMATA</h1>
                            <p class="mb-0">Sistem Informasi Pariwisata</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="btn btn-sm login-btn me-2" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-user me-1" aria-hidden="true" aria-label="Ikon login"></i> Login</a>
                    <a href="#" class="btn btn-sm logout-btn me-2 d-none"><i class="fas fa-sign-out-alt me-1" aria-hidden="true" aria-label="Ikon logout"></i> Logout</a>
                    <a href="#" class="btn btn-sm btn-outline-light"><i class="fas fa-question-circle me-1" aria-hidden="true" aria-label="Ikon bantuan"></i> Bantuan</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bpn-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka atau tutup menu navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link bpn-nav-link" href="index.php"><i class="fas fa-home me-1" aria-hidden="true" aria-label="Ikon beranda"></i> Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link bpn-nav-link dropdown-toggle" href="#" id="destinasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-map-marked-alt me-1" aria-hidden="true" aria-label="Ikon destinasi"></i> Destinasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><a class="dropdown-item" href="lokasi-wisata.html"><i class="fas fa-location-dot me-2" aria-hidden="true"></i> Lokasi Wisata</a></li>
                            <li><a class="dropdown-item" href="dokumentasi.html"><i class="fas fa-camera me-2" aria-hidden="true"></i> Dokumentasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link bpn-nav-link dropdown-toggle" href="#" id="akomodasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-alt me-1" aria-hidden="true" aria-label="Ikon akomodasi"></i> Akomodasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="akomodasiDropdown">
                            <li><a class="dropdown-item" href="lokasi-hotel.html"><i class="fas fa-hotel me-2" aria-hidden="true"></i> Hotel</a></li>
                            <li><a class="dropdown-item" href="lokasi-villa.html"><i class="fas fa-home me-2" aria-hidden="true"></i> Villa</a></li>
                            <li><a class="dropdown-item" href="lokasi-homestay.html"><i class="fas fa-bed me-2" aria-hidden="true"></i> Homestay</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bpn-nav-link" href="lokasi-kuliner.html"><i class="fas fa-utensils me-2" aria-hidden="true" aria-label="Ikon kuliner"></i> Kuliner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bpn-nav-link active" href="event.html"><i class="fas fa-calendar-alt me-1" aria-hidden="true" aria-label="Ikon event"></i> Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bpn-nav-link" href="#" data-bs-toggle="modal" data-bs-target="#informasiModal"><i class="fas fa-info-circle me-1" aria-hidden="true" aria-label="Ikon informasi"></i> Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container text-center">
            <h2 class="display-4 fw-bold mb-3">EVENT DI SEMARANG</h2>
            <p class="lead">Jelajahi acara menarik di Kota Semarang</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="row mb-4" id="eventList">
            <!-- Event cards will be populated here -->
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card bpn-card">
                    <div class="card-body">
                        <h5><i class="fas fa-info-circle me-2 text-primary" aria-hidden="true" aria-label="Ikon informasi"></i> Informasi Acara</h5>
                        <p>Temukan berbagai acara menarik di Kota Semarang, mulai dari festival budaya, pameran seni, hingga kegiatan olahraga.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bpn-card">
                    <div class="card-body">
                        <h5><i class="fas fa-calendar-alt me-2 text-primary" aria-hidden="true" aria-label="Ikon kalender"></i> Panduan Acara</h5>
                        <ul>
                            <li>Periksa tanggal dan lokasi sebelum menghadiri</li>
                            <li>Hubungi penyelenggara untuk informasi lebih lanjut</li>
                            <li>Kunjungi situs resmi acara untuk pembelian tiket</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bpn-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>KONTAK KAMI</h5>
                    <p><i class="fas fa-map-marker-alt me-2" aria-hidden="true" aria-label="Ikon lokasi"></i> Jl. Gubernur Mochtar, Tembalang, Semarang 50275</p>
                    <p><i class="fas fa-phone me-2" aria-hidden="true" aria-label="Ikon telepon"></i> 08998639593</p>
                    <p><i class="fas fa-envelope me-2" aria-hidden="true" aria-label="Ikon email"></i> info@wisatayuk.go.id</p>
                </div>
                <div class="col-md-4">
                    <h5>TAUTAN CEPAT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal" aria-label="Lihat Kebijakan Privasi">Kebijakan Privasi</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" aria-label="Lihat Syarat dan Ketentuan">Syarat dan Ketentuan</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#faqModal" aria-label="Lihat FAQ">FAQ</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#sitemapModal" aria-label="Lihat Peta Situs">Peta Situs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>TERHUBUNG</h5>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f fa-lg" aria-hidden="true" aria-label="Ikon Facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-lg" aria-hidden="true" aria-label="Ikon Twitter"></i></a>
                    <a href="https://www.instagram.com/ptrp.jaya/#" class="text-white me-2"><i class="fab fa-instagram fa-lg" aria-hidden="true" aria-label="Ikon Instagram"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-youtube fa-lg" aria-hidden="true" aria-label="Ikon YouTube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0" id="footer-copyright"></p>
            </div>
        </div>
    </footer>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login ke SIMATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal login"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" aria-label="Masukkan email Anda" required aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Masukkan alamat email Anda.</div>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" aria-label="Masukkan password Anda" required aria-describedby="passwordHelp">
                            <i class="fas fa-eye password-toggle" id="toggleLoginPassword" aria-label="Toggle visibilitas password"></i>
                            <div id="passwordHelp" class="form-text">Masukkan password Anda.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" aria-label="Ingat saya">
                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-warning w-100" aria-label="Login ke akun">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" id="registerLink">Daftar disini</a></p>
                        <p><a href="#" id="forgotPasswordLink">Lupa password?</a></p>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal registrasi"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="registerName" required aria-describedby="nameHelp" aria-label="Masukkan nama lengkap Anda">
                            <div id="nameHelp" class="form-text">Masukkan nama lengkap Anda.</div>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" required aria-describedby="emailHelp" aria-label="Masukkan email Anda">
                            <div id="emailHelp" class="form-text">Masukkan alamat email yang valid.</div>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" required aria-describedby="passwordHelp" aria-label="Masukkan password Anda">
                            <i class="fas fa-eye password-toggle" id="toggleRegisterPassword" aria-label="Toggle visibilitas password"></i>
                            <div id="passwordHelp" class="form-text">Minimal 8 karakter.</div>
                        </div>
                        <div class="mb-3 input-group">
                            <label for="registerConfirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="registerConfirmPassword" required aria-describedby="confirmPasswordHelp" aria-label="Masukkan konfirmasi password Anda">
                            <i class="fas fa-eye password-toggle" id="toggleConfirmPassword" aria-label="Toggle visibilitas konfirmasi password"></i>
                            <div id="confirmPasswordHelp" class="form-text">Ulangi kata sandi Anda.</div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100" aria-label="Daftar akun baru">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <<!-- Modal Informasi -->
    <div class="modal fade quick-link-modal" id="informasiModal" tabindex="-1" aria-labelledby="informasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="informasiModalLabel">Informasi SIMATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal informasi"></button>
                </div>
                <div class="modal-body">
                    <p>SIMATA (Sistem Informasi Pariwisata) adalah platform digital untuk menyediakan informasi lengkap seputar pariwisata di Semarang dan sekitarnya. Kami menawarkan berbagai fitur seperti:</p>
                    <ul>
                        <li>Pencarian destinasi wisata populer.</li>
                        <li>Informasi akomodasi mulai dari hotel hingga homestay.</li>
                        <li>Rekomendasi kuliner khas daerah.</li>
                        <li>Detail event dan berita terkini seputar pariwisata.</li>
                    </ul>
                    <p>Hubungi kami di <a href="mailto:info@wisatayuk.go.id" aria-label="Kirim email ke info@wisatayuk.go.id">info@wisatayuk.go.id</a> untuk pertanyaan lebih lanjut!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Tutup modal">Tutup</button>
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
                    <p>Kami di SIMATA menghargai privasi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.</p>
                    <ul>
                        <li><strong>Pengumpulan Data:</strong> Kami mengumpulkan informasi seperti nama, email, dan preferensi pencarian untuk meningkatkan pengalaman pengguna.</li>
                        <li><strong>Penggunaan Data:</strong> Data digunakan untuk personalisasi konten dan pengiriman informasi wisata.</li>
                        <li><strong>Keamanan:</strong> Kami menerapkan langkah-langkah keamanan untuk melindungi data Anda dari akses tidak sah.</li>
                    </ul>
                    <p>Untuk detail lengkap, hubungi kami di <a href="mailto:info@wisatayuk.go.id" aria-label="Kirim email ke info@wisatayuk.go.id">info@wisatayuk.go.id</a>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Tutup modal">Tutup</button>
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
                    <p>Dengan menggunakan SIMATA, Anda setuju dengan syarat dan ketentuan berikut:</p>
                    <ul>
                        <li><strong>Penggunaan Layanan:</strong> Anda harus menggunakan platform ini untuk tujuan yang sah dan sesuai dengan hukum.</li>
                        <li><strong>Akun Pengguna:</strong> Anda bertanggung jawab atas keamanan akun dan kata sandi Anda.</li>
                        <li><strong>Konten:</strong> Konten yang diunggah harus sesuai dan tidak melanggar hak pihak ketiga.</li>
                    </ul>
                    <p>Untuk informasi lebih lanjut, hubungi kami di <a href="mailto:info@wisatayuk.go.id" aria-label="Kirim email ke info@wisatayuk.go.id">info@wisatayuk.go.id</a>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Tutup modal">Tutup</button>
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
                    <h6>1. Bagaimana cara mendaftar di SIMATA?</h6>
                    <p>Klik tombol "Daftar" di halaman login, isi formulir pendaftaran, dan verifikasi email Anda.</p>
                    <h6>2. Apakah saya bisa menambahkan lokasi wisata?</h6>
                    <p>Ya, pengguna yang sudah login dapat menambahkan lokasi wisata atau hotel melalui fitur peta interaktif.</p>
                    <h6>3. Bagaimana cara menghubungi dukungan pelanggan?</h6>
                    <p>Kirim email ke <a href="mailto:info@wisatayuk.go.id" aria-label="Kirim email ke info@wisatayuk.go.id">info@wisatayuk.go.id</a> atau hubungi 08998639593.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Tutup modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Peta Situs -->
    <div class="modal fade quick-link-modal" id="sitemapModal" tabindex="-1" aria-labelledby="sitemapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sitemapModalLabel">Peta Situs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup modal peta situs"></button>
                </div>
                <div class="modal-body">
                    <p>Navigasi cepat ke halaman utama SIMATA:</p>
                    <ul>
                        <li><a href="index.php" aria-label="Kembali ke Beranda">Beranda</a></li>
                        <li><a href="lokasi-wisata.html" aria-label="Lihat Lokasi Wisata">Destinasi - Lokasi Wisata</a></li>
                        <li><a href="lokasi-hotel.html" aria-label="Lihat Hotel">Akomodasi - Hotel</a></li>
                        <li><a href="lokasi-kuliner.html" aria-label="Lihat Kuliner">Kuliner</a></a></li>
                        <li><a href="event.html" aria-label="Lihat Event">Event</a></a>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="btn btn-primary" data-bs-dismiss="modal" aria-label="Close modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Global variables
        let currentUser = JSON.parse(localStorage.getItem('currentUser') || sessionStorage.getItem('currentUser')) || null;

        // Initialize users array if not exists
        if (!localStorage.getItem('users')) {
            localStorage.setItem('users', JSON.stringify([]));
        }

        // Initialize event list
        document.addEventListener('DOMContentLoaded', function() {
            try {
                // Event data
                const events = [
                    {
                        name: "Semarang Night Carnival",
                        category: "festival",
                        date: "15 Juni 2025",
                        location: "Simpang Lima, Semarang",
                        description: "Parade budaya dengan kostum warna-warni yang memukau di pusat kota Semarang.",
                        imageUrl: "http://localhost/web7/imgev/carnivalnight.jpg"
                    },
                    {
                        name: "Pameran Kuliner Semarang",
                        category: "kuliner",
                        date: "10-12 Juni 2025",
                        location: "PRPP Kota Semarang",
                        description: "Pameran karya kuliner dari umkm lokal Semarang.",
                        imageUrl: "http://localhost/web7/imgev/kuliner.jpeg"
                    },
                    {
                        name: "Festival Kota Lama 2025",
                        category: "Festival",
                        date: "25-27 Juni 2025",
                        location: "Kota Lama Semarang",
                        description: "Acara tahunan di Kota Lama Semarang.",
                        imageUrl: "http://localhost/web7/imgev/kotalama.jpeg"
                    }
                ];

                // Populate event cards
                const eventList = document.getElementById('eventList');
                events.forEach(event => {
                    const card = document.createElement('div');
                    card.className = 'col-12 col-md-4';
                    card.innerHTML = `
                        <div class="card event-card">
                            <img src="${event.imageUrl}" class="card-img-top event-img" alt="${event.name}" onerror="this.src='https://via.placeholder.com/200x150?text=Gambar+Tidak+Tersedia'">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-calendar-alt event-icon" aria-hidden="true" aria-label="Ikon kalender"></i> ${event.name}</h5>
                                <p class="card-text"><span class="category-badge text-capitalize">${event.category}</span></p>
                                <p class="card-text"><i class="fas fa-calendar-day me-2" aria-hidden="true" aria-label="Ikon tanggal"></i> ${event.date}</p>
                                <p class="card-text"><i class="fas fa-map-marker-alt me-2" aria-hidden="true" aria-label="Ikon lokasi"></i> ${event.location}</p>
                                <p class="card-text">${event.description}</p>
                            </div>
                        </div>
                    `;
                    eventList.appendChild(card);
                });

                // Set dynamic footer copyright year
                document.getElementById('footer-copyright').textContent = `© ${new Date().getFullYear()} SIMATA - Sistem Informasi Pariwisata.`;

                // Check login status
                checkLoginStatus();
            } catch (error) {
                console.error('Error initializing event cards:', error);
                document.getElementById('eventList').innerHTML = '<p class="text-danger text-center">Gagal memuat daftar acara. Silakan coba lagi nanti.</p>';
            }
        });

        // Function to check login status
        function checkLoginStatus() {
            const loginBtn = document.querySelector('.login-btn');
            const logoutBtn = document.querySelector('.logout-btn');
            
            if (currentUser) {
                loginBtn.classList.add('d-none');
                logoutBtn.classList.remove('d-none');
            } else {
                loginBtn.classList.remove('d-none');
                logoutBtn.classList.add('d-none');
            }
        }

        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, toggleId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);
            toggleIcon.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            });
        }

        // Initialize password toggles
        togglePasswordVisibility('loginPassword', 'toggleLoginPassword');
        togglePasswordVisibility('registerPassword', 'toggleRegisterPassword');
        togglePasswordVisibility('registerConfirmPassword', 'toggleConfirmPassword');

        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;
            const rememberMe = document.getElementById('rememberMe').checked;
            
            let users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(u => u.email === email && u.password === password);
            
            if (!user) {
                alert('Email atau password salah!');
                return;
            }
            
            currentUser = user;
            if (rememberMe) {
                localStorage.setItem('currentUser', JSON.stringify(user));
                sessionStorage.removeItem('currentUser');
            } else {
                sessionStorage.setItem('currentUser', JSON.stringify(user));
                localStorage.removeItem('currentUser');
            }
            
            const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
            loginModal.hide();
            
            checkLoginStatus();
        });

        // Handle register form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('registerName').value.trim();
            const email = document.getElementById('registerEmail').value.trim();
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Password dan konfirmasi password tidak cocok!');
                return;
            }
            
            let users = JSON.parse(localStorage.getItem('users')) || [];
            if (users.find(u => u.email === email)) {
                alert('Email sudah terdaftar!');
                return;
            }
            
            users.push({
                name,
                email,
                password,
                createdAt: new Date().toISOString()
            });
            localStorage.setItem('users', JSON.stringify(users));
            
            alert('Pendaftaran berhasil! Silakan login.');
            
            const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
            registerModal.hide();
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });

        // Handle logout
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            
            localStorage.removeItem('currentUser');
            sessionStorage.removeItem('currentUser');
            currentUser = null;
            
            checkLoginStatus();
            
            alert('Anda telah logout!');
        });

        // Handle forgot password
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Fitur reset password akan segera tersedia!');
        });

        // Handle register link
        document.getElementById('registerLink').addEventListener('click', function(e) {
            e.preventDefault();
            const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
            loginModal.hide();
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        });
    </script>
</body>
</html>