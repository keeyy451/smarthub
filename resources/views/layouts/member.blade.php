<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Smart-Hub Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --primary-light: #e0f2fe;
            --secondary: #64748b;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --body-bg: #f1f5f9;
            --card-bg: #ffffff;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --card-shadow-hover: 0 10px 25px -5px rgba(0,0,0,0.1);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --accent: #06b6d4;
            --border-color: #e2e8f0;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.25rem;
        }

        * { font-family: 'Outfit', sans-serif; -webkit-font-smoothing: antialiased; }
        body { background: var(--body-bg); min-height: 100vh; color: var(--text-primary); }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed; top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: #fff; z-index: 1040;
            transition: transform .3s ease;
            overflow-y: auto;
            display: flex; flex-direction: column;
        }

        .sidebar-brand {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }

        .sidebar-brand .brand-logo {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.4);
        }

        .sidebar-brand h4 { font-weight: 700; font-size: 1.15rem; margin: 0; }
        .sidebar-brand small { color: rgba(255,255,255,.4); font-size: .7rem; font-weight: 400; }

        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-nav .nav-label { font-size: .65rem; text-transform: uppercase; letter-spacing: .1em; color: rgba(255,255,255,.3); padding: 1.25rem 1.5rem .625rem; font-weight: 700; }

        .sidebar-nav .nav-link {
            color: rgba(255,255,255,.55); padding: .7rem 1.5rem;
            display: flex; align-items: center; gap: .875rem;
            font-size: .875rem; font-weight: 500;
            border-left: 3px solid transparent;
            transition: var(--transition);
        }

        .sidebar-nav .nav-link:hover { color: rgba(255,255,255,.9); background: rgba(255,255,255,.05); }
        .sidebar-nav .nav-link.active { color: #fff; background: rgba(14, 165, 233, .12); border-left-color: var(--primary); font-weight: 600; }
        .sidebar-nav .nav-link i { font-size: 1.15rem; width: 1.5rem; text-align: center; opacity: .8; }

        /* ===== MAIN CONTENT ===== */
        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; }

        /* ===== TOP NAVBAR ===== */
        .top-navbar {
            background: rgba(255,255,255,.85); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: .875rem 2rem;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 1020;
        }

        .top-navbar .page-title { font-weight: 700; font-size: 1.1rem; color: var(--text-primary); }
        .top-navbar .user-menu { display: flex; align-items: center; gap: .875rem; }

        .top-navbar .user-avatar {
            width: 38px; height: 38px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: #fff; display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: .85rem;
        }

        .role-badge {
            font-size: .65rem; font-weight: 700; letter-spacing: .08em;
            padding: .3rem .6rem; border-radius: 50rem;
            background: var(--primary-light); color: var(--primary);
        }

        /* ===== CARDS ===== */
        .stat-card {
            border: 1px solid var(--border-color); border-radius: var(--radius-xl);
            box-shadow: var(--card-shadow); transition: var(--transition); background: var(--card-bg);
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: var(--card-shadow-hover); }
        .stat-card .stat-icon { width: 52px; height: 52px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.35rem; }
        .stat-card .stat-value { font-size: 1.75rem; font-weight: 800; color: var(--text-primary); letter-spacing: -0.02em; }
        .stat-card .stat-label { font-size: .75rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; }

        .content-card {
            background: var(--card-bg); border: 1px solid var(--border-color);
            border-radius: var(--radius-xl); box-shadow: var(--card-shadow); overflow: hidden;
        }
        .content-card .card-header { background: transparent; border-bottom: 1px solid var(--border-color); padding: 1.25rem 1.5rem; font-weight: 700; font-size: .95rem; }

        /* ===== TABLE ===== */
        .table th { font-size: .7rem; text-transform: uppercase; letter-spacing: .06em; color: var(--text-muted); font-weight: 700; border-bottom: 1px solid var(--border-color) !important; padding: .875rem 1.25rem; background: #f8fafc; }
        .table td { padding: .875rem 1.25rem; vertical-align: middle; font-size: .875rem; color: var(--text-secondary); border-bottom: 1px solid #f1f5f9 !important; }
        .table tbody tr { transition: background .15s ease; }
        .table tbody tr:hover { background: #f8fafc; }

        /* ===== BADGES ===== */
        .badge-status { padding: .4rem .85rem; border-radius: 50rem; font-size: .7rem; font-weight: 700; text-transform: capitalize; letter-spacing: 0.02em; }
        .badge-tersedia, .badge-baik, .badge-approved, .badge-selesai, .badge-checked_in { background: #ecfdf5 !important; color: #059669 !important; }
        .badge-dipinjam, .badge-rusak_ringan, .badge-pending, .badge-checked_out { background: #fffbeb !important; color: #d97706 !important; }
        .badge-maintenance, .badge-rusak_berat, .badge-rejected { background: #fef2f2 !important; color: #dc2626 !important; }

        /* ===== BUTTONS ===== */
        .btn { font-weight: 600; font-size: .875rem; border-radius: var(--radius-md); transition: var(--transition); }
        .btn-primary { background: var(--primary); border-color: var(--primary); box-shadow: 0 2px 4px rgba(14, 165, 233, 0.25); }
        .btn-primary:hover { background: var(--primary-dark); border-color: var(--primary-dark); transform: translateY(-1px); }

        /* ===== RESPONSIVE ===== */
        .sidebar-toggle { display: none; }
        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .sidebar-toggle { display: inline-flex; }
            .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 1035; backdrop-filter: blur(4px); }
            .sidebar-overlay.show { display: block; }
        }

        .flash-message { border: none; border-radius: var(--radius-md); font-size: .875rem; font-weight: 500; box-shadow: var(--card-shadow); animation: slideIn 0.4s ease-out; }
        @keyframes slideIn { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="d-flex align-items-center gap-3">
                <div class="brand-logo"><i class="bi bi-cpu text-white"></i></div>
                <div>
                    <h4>Smart-Hub</h4>
                    <small>Member Portal</small>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Menu Utama</div>
            <a href="{{ route('member.dashboard') }}" class="nav-link {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <div class="nav-label">Layanan</div>
            <a href="{{ route('member.equipment.index') }}" class="nav-link {{ request()->routeIs('member.equipment.index') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> Equipment
            </a>
            <a href="{{ route('member.equipment.history') }}" class="nav-link {{ request()->routeIs('member.equipment.history') ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i> Riwayat Pinjam
            </a>
            <a href="{{ route('member.booking.index') }}" class="nav-link {{ request()->routeIs('member.booking.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> Booking Ruangan
            </a>

            <div class="nav-label">Akun</div>
            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i> Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" class="nav-link">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </form>
        </nav>
    </aside>

    <div class="main-content">
        <div class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-light sidebar-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
                <span class="page-title">@yield('title', 'Dashboard')</span>
            </div>
            <div class="user-menu">
                <span class="role-badge">MEMBER</span>
                <div class="text-end d-none d-sm-block">
                    <div style="font-size: .85rem; font-weight: 600; color: var(--text-secondary);">{{ Auth::user()->name }}</div>
                </div>
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            </div>
        </div>

        <div class="px-4 pt-3">
            @if(session('success'))
                <div class="alert alert-success flash-message d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger flash-message d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger flash-message" role="alert">
                    <div class="d-flex align-items-center mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Terdapat kesalahan:</strong></div>
                    <ul class="mb-0 ps-3">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
        </div>

        <div class="p-4 flex-grow-1">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
        setTimeout(() => { document.querySelectorAll('.flash-message').forEach(el => { new bootstrap.Alert(el).close(); }); }, 4000);
    </script>
    @yield('scripts')
</body>
</html>
