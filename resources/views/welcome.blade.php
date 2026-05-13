<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart-Hub Management System</title>
    <meta name="description" content="Sistem manajemen hub terintegrasi untuk pemesanan ruangan dan peminjaman peralatan studio.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --accent: #06b6d4;
            --dark: #0f172a;
        }

        * { font-family: 'Outfit', sans-serif; -webkit-font-smoothing: antialiased; }
        body { background: #ffffff; color: #1e293b; overflow-x: hidden; }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(0,0,0,.04);
            padding: 1rem 0;
            transition: all .3s ease;
        }
        .navbar-brand { font-weight: 800; font-size: 1.3rem; letter-spacing: -0.02em; color: var(--dark); }
        .navbar-brand i { color: var(--primary); }

        .btn-nav { padding: .625rem 1.5rem; border-radius: 50rem; font-weight: 700; font-size: .85rem; transition: all .25s ease; }
        .btn-nav-outline { border: 2px solid #e2e8f0; color: #475569; }
        .btn-nav-outline:hover { border-color: var(--primary); color: var(--primary); }
        .btn-nav-primary { background: var(--primary); color: white; border: none; box-shadow: 0 4px 12px rgba(14,165,233,.3); }
        .btn-nav-primary:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(14,165,233,.4); color: white; }

        /* ===== HERO ===== */
        .hero {
            padding: 140px 0 80px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 100%;
            background: radial-gradient(ellipse at 20% 50%, rgba(14,165,233,.06) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, rgba(6,182,212,.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: #f0f9ff;
            color: var(--primary-dark);
            padding: .5rem 1.25rem;
            border-radius: 50rem;
            font-size: .8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            border: 1px solid #bae6fd;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.03em;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .hero-title .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: 1.15rem;
            color: #64748b;
            max-width: 540px;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }

        .hero-btn { padding: .875rem 2.25rem; border-radius: 50rem; font-weight: 700; font-size: .9rem; transition: all .25s ease; }
        .hero-btn-primary { background: var(--primary); color: white; border: none; box-shadow: 0 8px 20px rgba(14,165,233,.3); }
        .hero-btn-primary:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(14,165,233,.4); background: var(--primary-dark); color: white; }
        .hero-btn-secondary { border: 2px solid #e2e8f0; color: #475569; background: white; }
        .hero-btn-secondary:hover { border-color: var(--primary); color: var(--primary); }

        /* ===== STATS BAR ===== */
        .stats-bar {
            background: var(--dark);
            border-radius: 2rem;
            padding: 3rem 2rem;
            margin-top: 4rem;
        }
        .stats-bar h2 { font-size: 2.5rem; font-weight: 800; margin-bottom: .25rem; letter-spacing: -0.02em; }
        .stats-bar p { color: #94a3b8; margin: 0; font-weight: 500; }

        /* ===== FEATURES ===== */
        .features { padding: 6rem 0; }
        .section-tag { display: inline-flex; align-items: center; gap: .5rem; background: #f0f9ff; color: var(--primary-dark); padding: .4rem 1rem; border-radius: 50rem; font-size: .75rem; font-weight: 700; border: 1px solid #bae6fd; margin-bottom: 1rem; }
        .section-title { font-size: 2.25rem; font-weight: 800; letter-spacing: -0.02em; color: var(--dark); margin-bottom: .5rem; }
        .section-desc { color: #64748b; font-size: 1.05rem; max-width: 500px; }

        .feature-card {
            background: white;
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            padding: 2.5rem;
            transition: all .3s ease;
            height: 100%;
        }
        .feature-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -12px rgba(0,0,0,.08); border-color: #e2e8f0; }

        .feature-icon {
            width: 60px; height: 60px;
            border-radius: 1.25rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.75rem;
        }
        .feature-card h5 { font-weight: 700; margin-bottom: .75rem; color: var(--dark); }
        .feature-card p { color: #64748b; margin-bottom: 0; font-size: .95rem; line-height: 1.6; }

        /* ===== TECH SECTION ===== */
        .tech-section {
            padding: 5rem 0;
            background: #f8fafc;
        }

        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: .75rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1.25rem 1.75rem;
            transition: all .3s ease;
        }
        .tech-badge:hover { transform: translateY(-3px); box-shadow: 0 8px 16px rgba(0,0,0,.06); }
        .tech-badge .icon { width: 44px; height: 44px; border-radius: .75rem; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
        .tech-badge .label { font-weight: 700; color: var(--dark); font-size: .9rem; }
        .tech-badge .sub { font-size: .75rem; color: #94a3b8; font-weight: 500; }

        /* ===== CTA ===== */
        .cta-section {
            padding: 6rem 0;
        }
        .cta-card {
            background: linear-gradient(135deg, var(--dark) 0%, #1e293b 100%);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-card::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: rgba(14,165,233,.1);
            filter: blur(80px);
            top: -200px; right: -200px;
        }
        .cta-card h2 { color: white; font-size: 2.5rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 1rem; position: relative; }
        .cta-card p { color: #94a3b8; font-size: 1.1rem; max-width: 500px; margin: 0 auto 2.5rem; position: relative; }

        /* ===== FOOTER ===== */
        footer { padding: 3rem 0; border-top: 1px solid #f1f5f9; }
        footer p { color: #94a3b8; font-size: .85rem; }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <i class="bi bi-cpu fs-4"></i> Smart-Hub
        </a>
        <div class="ms-auto d-flex gap-2">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-nav btn-nav-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-nav btn-nav-outline">Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-nav btn-nav-primary">Daftar</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

{{-- Hero --}}
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-tag"><i class="bi bi-stars"></i> Platform Manajemen Hub #1</div>
                <h1 class="hero-title">Kelola Ruang & Alat<br><span class="gradient-text">Lebih Cerdas</span></h1>
                <p class="hero-desc">Sistem terintegrasi untuk komunitas kreatif. Pemesanan ruangan, manajemen inventaris, dan check-in peralatan melalui aplikasi tablet — semua dalam satu platform.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn hero-btn hero-btn-primary">Mulai Sekarang <i class="bi bi-arrow-right ms-2"></i></a>
                    <a href="#features" class="btn hero-btn hero-btn-secondary">Pelajari Fitur</a>
                </div>
            </div>
        </div>

        {{-- Stats Bar --}}
        <div class="stats-bar">
            <div class="row text-center gy-4">
                <div class="col-md-3">
                    <h2 class="text-white">50+</h2>
                    <p>Peralatan Studio</p>
                </div>
                <div class="col-md-3">
                    <h2 class="text-white">10+</h2>
                    <p>Ruang Tersedia</p>
                </div>
                <div class="col-md-3">
                    <h2 class="text-white">2</h2>
                    <p>Role Pengguna</p>
                </div>
                <div class="col-md-3">
                    <h2 style="color: var(--primary);">100%</h2>
                    <p>REST API Ready</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features --}}
<section id="features" class="features">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-tag"><i class="bi bi-lightning-charge-fill"></i> Fitur Utama</div>
            <h2 class="section-title">Semua yang Anda Butuhkan</h2>
            <p class="section-desc mx-auto">Fitur lengkap untuk mengelola peminjaman ruang kerja dan peralatan studio secara mandiri.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background: #e0f2fe; color: #0369a1;">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <h5>Booking Ruangan</h5>
                    <p>Pesan ruang meeting atau studio musik dengan sistem penjadwalan yang akurat. Admin memverifikasi setiap pengajuan.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background: #ecfdf5; color: #059669;">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h5>CRUD Equipment</h5>
                    <p>Kelola inventaris peralatan lengkap dengan status, kondisi, dan jumlah. Sistem tracking peminjaman secara real-time.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background: #fef3c7; color: #d97706;">
                        <i class="bi bi-phone-fill"></i>
                    </div>
                    <h5>REST API & Check-in</h5>
                    <p>API terautentikasi (token) untuk aplikasi tablet. Member dapat check-in/check-out peralatan melalui koneksi API.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Tech Stack --}}
<section class="tech-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-tag"><i class="bi bi-code-slash"></i> Tech Stack</div>
            <h2 class="section-title">Dibangun dengan Teknologi Modern</h2>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-auto">
                <div class="tech-badge">
                    <div class="icon" style="background: #fef2f2; color: #dc2626;"><i class="bi bi-filetype-php"></i></div>
                    <div><div class="label">Laravel 13</div><div class="sub">Backend Framework</div></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="tech-badge">
                    <div class="icon" style="background: #eff6ff; color: #2563eb;"><i class="bi bi-database"></i></div>
                    <div><div class="label">MySQL</div><div class="sub">Database</div></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="tech-badge">
                    <div class="icon" style="background: #f0fdf4; color: #16a34a;"><i class="bi bi-braces"></i></div>
                    <div><div class="label">REST API</div><div class="sub">JSON Responses</div></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="tech-badge">
                    <div class="icon" style="background: #faf5ff; color: #9333ea;"><i class="bi bi-bootstrap"></i></div>
                    <div><div class="label">Bootstrap 5</div><div class="sub">UI Framework</div></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="tech-badge">
                    <div class="icon" style="background: #fff7ed; color: #ea580c;"><i class="bi bi-git"></i></div>
                    <div><div class="label">Git</div><div class="sub">Version Control</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-card">
            <h2>Siap Mengelola Hub Anda?</h2>
            <p>Daftar sekarang dan rasakan kemudahan sistem manajemen hub yang terintegrasi.</p>
            <a href="{{ route('register') }}" class="btn hero-btn hero-btn-primary position-relative">Daftar Gratis <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- Footer --}}
<footer>
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} Smart-Hub Management System — UTS Pemrograman Fullstack</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
