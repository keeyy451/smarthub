<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart-Hub - Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --accent: #06b6d4;
            --bg-dark: #0f172a;
            --text-muted: #94a3b8;
            --radius-xl: 1.5rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { font-family: 'Outfit', sans-serif; -webkit-font-smoothing: antialiased; }
        body { background: var(--bg-dark); color: white; min-height: 100vh; overflow-x: hidden; }

        /* ===== BACKGROUND BLOBS ===== */
        .blob { position: absolute; border-radius: 50%; filter: blur(120px); z-index: 0; pointer-events: none; }
        .blob-1 { width: 500px; height: 500px; top: -100px; right: -100px; background: rgba(14, 165, 233, 0.15); }
        .blob-2 { width: 400px; height: 400px; bottom: 10%; left: -100px; background: rgba(6, 182, 212, 0.1); }

        /* ===== NAVBAR ===== */
        .navbar {
            padding: 1.5rem 0;
            background: transparent;
            position: relative;
            z-index: 10;
        }

        .brand-logo {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem; color: white;
            box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
        }

        .nav-link { color: rgba(255,255,255,.7) !important; font-weight: 500; font-size: .95rem; padding: 0.5rem 1.25rem !important; transition: var(--transition); }
        .nav-link:hover { color: white !important; transform: translateY(-1px); }

        .btn-nav {
            padding: 0.625rem 1.5rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: .9rem;
            transition: var(--transition);
        }

        .btn-outline-custom { border: 1px solid rgba(255,255,255,.1); color: white; background: rgba(255,255,255,.03); backdrop-filter: blur(8px); }
        .btn-outline-custom:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.2); color: white; transform: translateY(-2px); }

        /* ===== HERO SECTION ===== */
        .hero-section {
            padding: 8rem 0 10rem;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.04em;
            margin-bottom: 2rem;
            background: linear-gradient(to bottom, #fff 40%, rgba(255,255,255,0.4) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-muted);
            line-height: 1.6;
            max-width: 600px;
            margin-bottom: 3rem;
        }

        .btn-hero {
            padding: 1rem 2.5rem;
            border-radius: 16px;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 0.02em;
            transition: var(--transition);
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
        }

        .btn-primary-custom { background: linear-gradient(135deg, var(--primary), var(--accent)); border: none; color: white; }
        .btn-primary-custom:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(14, 165, 233, 0.5); color: white; }

        /* ===== FEATURES ===== */
        .feature-card {
            background: rgba(255,255,255, .03);
            border: 1px solid rgba(255,255,255, .06);
            border-radius: var(--radius-xl);
            padding: 3rem;
            height: 100%;
            backdrop-filter: blur(12px);
            transition: var(--transition);
        }

        .feature-card:hover {
            background: rgba(255,255,255, .05);
            border-color: rgba(14, 165, 233, 0.3);
            transform: translateY(-8px);
        }

        .feature-icon {
            width: 64px; height: 64px;
            background: rgba(14, 165, 233, 0.1);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem; color: var(--primary);
            margin-bottom: 2rem;
        }

        .feature-card h4 { font-weight: 700; margin-bottom: 1rem; letter-spacing: -0.01em; }
        .feature-card p { color: var(--text-muted); line-height: 1.6; margin-bottom: 0; }

        /* ===== DECORATION ===== */
        .grid-bg {
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(ellipse at center, black, transparent 80%);
            z-index: 0; pointer-events: none;
        }

        footer { padding: 4rem 0; border-top: 1px solid rgba(255,255,255,.06); color: var(--text-muted); font-size: .9rem; }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>
<div class="grid-bg"></div>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-3" href="#">
            <div class="brand-logo"><i class="bi bi-cpu"></i></div>
            <span class="fw-bold fs-4 text-white letter-spacing--1">Smart-Hub</span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list text-white fs-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2 mt-4 mt-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ Auth::user()->role == 'admin' ? route('dashboard') : route('member.dashboard') }}" class="btn btn-nav btn-outline-custom">DASHBOARD</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log In</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-nav btn-primary-custom">GET STARTED</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container text-center">
        <span class="badge rounded-pill mb-4 px-4 py-2" style="background: rgba(14, 165, 233, 0.15); color: var(--primary); font-weight: 700; letter-spacing: 0.05em; font-size: .75rem; border: 1px solid rgba(14, 165, 233, 0.2);">
            <i class="bi bi-stars me-2"></i>THE NEXT GENERATION HUB MANAGEMENT
        </span>
        <h1 class="hero-title">Kelola Hub Anda<br>Dengan Kecerdasan.</h1>
        <p class="hero-subtitle mx-auto">Sistem terintegrasi untuk pemesanan ruangan dan manajemen peminjaman peralatan studio secara real-time. Dibangun untuk komunitas kreatif masa depan.</p>
        
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @auth
                 <a href="{{ Auth::user()->role == 'admin' ? route('dashboard') : route('member.dashboard') }}" class="btn btn-hero btn-primary-custom">MASUK KE DASHBOARD <i class="bi bi-arrow-right ms-2"></i></a>
            @else
                <a href="{{ route('register') }}" class="btn btn-hero btn-primary-custom">COBA SEKARANG <i class="bi bi-arrow-right ms-2"></i></a>
                <a href="{{ route('login') }}" class="btn btn-hero btn-outline-custom">LOGIN ANGGOTA</a>
            @endauth
        </div>
    </div>
</section>

<section class="pb-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-calendar-check"></i></div>
                    <h4>Booking Ruangan</h4>
                    <p>Pesan studio atau ruang kerja dengan sistem validasi otomatis untuk menghindari jadwal bentrok.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-tools"></i></div>
                    <h4>Peminjaman Alat</h4>
                    <p>Pantau inventaris peralatan studio dan lakukan peminjaman secara mandiri melalui aplikasi.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-tablet"></i></div>
                    <h4>Real-time Check-in</h4>
                    <p>Integrasi REST API yang aman untuk aplikasi tablet, memudahkan pencatatan status secara instan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="text-center mt-5">
    <div class="container">
        <p class="mb-2">© 2026 Smart-Hub Management System. All rights reserved.</p>
        <p class="mb-0 text-muted" style="font-size: .8rem;">Tugas UTS Pemrograman Fullstack - Universitas Dian Nusantara</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
