<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Smart-Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<<<<<<< HEAD
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --sidebar-bg: #1e1b4b;
            --sidebar-hover: #312e81;
            --body-bg: #f1f5f9;
            --card-shadow: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
        }

        * { font-family: 'Inter', sans-serif; }
=======
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
            --card-shadow-hover: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.05);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --border-color: #e2e8f0;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.25rem;
            --radius-2xl: 1.5rem;
        }

        * {
            font-family: 'Outfit', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
>>>>>>> development

        body {
            background: var(--body-bg);
            min-height: 100vh;
<<<<<<< HEAD
        }

=======
            color: var(--text-primary);
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

>>>>>>> development
        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
<<<<<<< HEAD
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #312e81 100%);
=======
            background: var(--sidebar-bg);
>>>>>>> development
            color: #fff;
            z-index: 1040;
            transition: transform .3s ease;
            overflow-y: auto;
<<<<<<< HEAD
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
=======
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,.06);
            flex-shrink: 0;
        }

        .sidebar-brand .brand-logo {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.4);
>>>>>>> development
        }

        .sidebar-brand h4 {
            font-weight: 700;
<<<<<<< HEAD
            font-size: 1.1rem;
            margin: 0;
        }

        .sidebar-brand small {
            color: rgba(255,255,255,.5);
            font-size: .75rem;
        }

        .sidebar-nav { padding: .75rem 0; }
=======
            font-size: 1.15rem;
            margin: 0;
            letter-spacing: -0.01em;
        }

        .sidebar-brand small {
            color: rgba(255,255,255,.4);
            font-size: .7rem;
            font-weight: 400;
            letter-spacing: 0.03em;
        }

        .sidebar-nav { padding: 1rem 0; flex: 1; }
>>>>>>> development

        .sidebar-nav .nav-label {
            font-size: .65rem;
            text-transform: uppercase;
<<<<<<< HEAD
            letter-spacing: .08em;
            color: rgba(255,255,255,.35);
            padding: 1rem 1.25rem .5rem;
            font-weight: 600;
        }

        .sidebar-nav .nav-link {
            color: rgba(255,255,255,.7);
            padding: .625rem 1.25rem;
            display: flex;
            align-items: center;
            gap: .75rem;
            font-size: .875rem;
            font-weight: 400;
            border-left: 3px solid transparent;
            transition: all .2s;
        }

        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.08);
=======
            letter-spacing: .1em;
            color: rgba(255,255,255,.3);
            padding: 1.25rem 1.5rem .625rem;
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: rgba(255,255,255,.55);
            padding: .7rem 1.5rem;
            display: flex;
            align-items: center;
            gap: .875rem;
            font-size: .875rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: var(--transition);
            margin: 1px 0;
        }

        .sidebar-nav .nav-link:hover {
            color: rgba(255,255,255,.9);
            background: rgba(255,255,255,.05);
>>>>>>> development
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
<<<<<<< HEAD
            background: rgba(255,255,255,.12);
            border-left-color: #818cf8;
            font-weight: 500;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.1rem;
            width: 1.5rem;
            text-align: center;
        }

=======
            background: rgba(14, 165, 233, .12);
            border-left-color: var(--primary);
            font-weight: 600;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.15rem;
            width: 1.5rem;
            text-align: center;
            opacity: .8;
        }

        .sidebar-nav .nav-link.active i { opacity: 1; }

>>>>>>> development
        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
<<<<<<< HEAD
=======
            display: flex;
            flex-direction: column;
>>>>>>> development
        }

        /* ===== TOP NAVBAR ===== */
        .top-navbar {
<<<<<<< HEAD
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: .75rem 1.5rem;
=======
            background: rgba(255,255,255,.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: .875rem 2rem;
>>>>>>> development
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .top-navbar .page-title {
<<<<<<< HEAD
            font-weight: 600;
            font-size: 1.05rem;
            color: #1e293b;
=======
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--text-primary);
            letter-spacing: -0.01em;
>>>>>>> development
        }

        .top-navbar .user-menu {
            display: flex;
            align-items: center;
<<<<<<< HEAD
            gap: .75rem;
        }

        .top-navbar .user-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: var(--primary);
=======
            gap: .875rem;
        }

        .top-navbar .user-name {
            font-size: .85rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .top-navbar .user-role {
            font-size: .7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .top-navbar .user-avatar {
            width: 38px; height: 38px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--primary), var(--accent));
>>>>>>> development
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
<<<<<<< HEAD
            font-weight: 600;
            font-size: .8rem;
=======
            font-weight: 700;
            font-size: .85rem;
>>>>>>> development
        }

        /* ===== CARDS ===== */
        .stat-card {
<<<<<<< HEAD
            border: none;
            border-radius: .75rem;
            box-shadow: var(--card-shadow);
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,.1);
        }

        .stat-card .stat-icon {
            width: 48px; height: 48px;
            border-radius: .625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
=======
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            background: var(--card-bg);
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-card .stat-icon {
            width: 52px; height: 52px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
>>>>>>> development
        }

        .stat-card .stat-value {
            font-size: 1.75rem;
<<<<<<< HEAD
            font-weight: 700;
            color: #1e293b;
        }

        .stat-card .stat-label {
            font-size: .8rem;
            color: #64748b;
            font-weight: 500;
=======
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .stat-card .stat-label {
            font-size: .75rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
>>>>>>> development
        }

        /* ===== CONTENT CARD ===== */
        .content-card {
<<<<<<< HEAD
            background: #fff;
            border: none;
            border-radius: .75rem;
            box-shadow: var(--card-shadow);
=======
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            box-shadow: var(--card-shadow);
            overflow: hidden;
>>>>>>> development
        }

        .content-card .card-header {
            background: transparent;
<<<<<<< HEAD
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 1.25rem;
            font-weight: 600;
            font-size: .95rem;
            color: #1e293b;
=======
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            font-weight: 700;
            font-size: .95rem;
            color: var(--text-primary);
>>>>>>> development
        }

        /* ===== TABLE ===== */
        .table th {
<<<<<<< HEAD
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: #64748b;
            font-weight: 600;
            border-bottom-width: 1px;
            padding: .75rem 1rem;
=======
            font-size: .7rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--text-muted);
            font-weight: 700;
            border-bottom: 1px solid var(--border-color) !important;
            padding: .875rem 1.25rem;
>>>>>>> development
            background: #f8fafc;
        }

        .table td {
<<<<<<< HEAD
            padding: .75rem 1rem;
            vertical-align: middle;
            font-size: .875rem;
            color: #334155;
        }

        .table tbody tr {
            border-bottom: 1px solid #f1f5f9;
=======
            padding: .875rem 1.25rem;
            vertical-align: middle;
            font-size: .875rem;
            color: var(--text-secondary);
            border-bottom: 1px solid #f1f5f9 !important;
        }

        .table tbody tr {
            transition: background .15s ease;
>>>>>>> development
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        /* ===== BADGES ===== */
<<<<<<< HEAD
        .badge-tersedia { background: #dcfce7; color: #166534; }
        .badge-dipinjam { background: #fef3c7; color: #92400e; }
        .badge-maintenance { background: #fee2e2; color: #991b1b; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-approved { background: #dcfce7; color: #166534; }
        .badge-rejected { background: #fee2e2; color: #991b1b; }
        .badge-selesai { background: #dbeafe; color: #1e40af; }
        .badge-checked_in { background: #dcfce7; color: #166534; }
        .badge-checked_out { background: #fef3c7; color: #92400e; }
        .badge-baik { background: #dcfce7; color: #166534; }
        .badge-rusak_ringan { background: #fef3c7; color: #92400e; }
        .badge-rusak_berat { background: #fee2e2; color: #991b1b; }

        .badge-status {
            padding: .35em .75em;
            border-radius: 50rem;
            font-size: .75rem;
            font-weight: 600;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
=======
        .badge-status {
            padding: .4rem .85rem;
            border-radius: 50rem;
            font-size: .7rem;
            font-weight: 700;
            text-transform: capitalize;
            letter-spacing: 0.02em;
        }

        .badge-tersedia, .badge-baik, .badge-approved, .badge-selesai, .badge-checked_in { background: #ecfdf5 !important; color: #059669 !important; }
        .badge-dipinjam, .badge-rusak_ringan, .badge-pending, .badge-checked_out { background: #fffbeb !important; color: #d97706 !important; }
        .badge-maintenance, .badge-rusak_berat, .badge-rejected { background: #fef2f2 !important; color: #dc2626 !important; }

        /* ===== BUTTONS ===== */
        .btn {
            font-weight: 600;
            font-size: .875rem;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            box-shadow: 0 2px 4px rgba(14, 165, 233, 0.25);
>>>>>>> development
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
<<<<<<< HEAD
        }

        .btn-action {
            padding: .25rem .5rem;
            font-size: .8rem;
            border-radius: .375rem;
        }

        /* ===== FORMS ===== */
        .form-control:focus, .form-select:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(79,70,229,.15);
=======
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(14, 165, 233, 0.3);
        }

        .btn-action {
            padding: .375rem .625rem;
            font-size: .8rem;
            border-radius: var(--radius-sm);
        }

        .btn-light {
            background: #f1f5f9;
            border-color: #e2e8f0;
            color: var(--text-secondary);
        }
        .btn-light:hover {
            background: #e2e8f0;
            border-color: #cbd5e1;
        }

        /* ===== FORMS ===== */
        .form-control, .form-select {
            border-radius: var(--radius-md);
            border-color: var(--border-color);
            padding: .625rem 1rem;
            font-size: .875rem;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, .12);
        }

        .form-label {
            font-weight: 600;
            font-size: .8rem;
            color: var(--text-secondary);
            margin-bottom: .5rem;
>>>>>>> development
        }

        /* ===== PAGINATION ===== */
        .pagination .page-link {
            color: var(--primary);
<<<<<<< HEAD
            border-radius: .375rem;
            margin: 0 2px;
            font-size: .85rem;
=======
            border-radius: var(--radius-sm);
            margin: 0 2px;
            font-size: .85rem;
            font-weight: 600;
            border: 1px solid var(--border-color);
>>>>>>> development
        }
        .pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* ===== RESPONSIVE ===== */
        .sidebar-toggle { display: none; }

        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .sidebar-toggle { display: inline-flex; }
<<<<<<< HEAD
=======
            .top-navbar { padding: .75rem 1rem; }
>>>>>>> development
            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.5);
                z-index: 1035;
<<<<<<< HEAD
=======
                backdrop-filter: blur(4px);
>>>>>>> development
            }
            .sidebar-overlay.show { display: block; }
        }

        /* ===== FLASH MESSAGE ===== */
        .flash-message {
            border: none;
<<<<<<< HEAD
            border-radius: .5rem;
            font-size: .875rem;
=======
            border-radius: var(--radius-md);
            font-size: .875rem;
            font-weight: 500;
            box-shadow: var(--card-shadow);
        }

        /* ===== UTILITIES ===== */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h4 {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            margin-bottom: .25rem;
        }

        .page-header p {
            color: var(--text-muted);
            font-size: .9rem;
            margin-bottom: 0;
>>>>>>> development
        }
    </style>
</head>
<body>
    {{-- Sidebar Overlay (mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    {{-- Sidebar --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
<<<<<<< HEAD
            <h4><i class="bi bi-cpu me-2"></i>Smart-Hub</h4>
            <small>Management System</small>
=======
            <div class="d-flex align-items-center gap-3">
                <div class="brand-logo">
                    <i class="bi bi-cpu text-white"></i>
                </div>
                <div>
                    <h4>Smart-Hub</h4>
                    <small>Management System</small>
                </div>
            </div>
>>>>>>> development
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            @if(Auth::user()->role == 'admin')
            <div class="nav-label">Manajemen</div>
            <a href="{{ route('admin.equipments.index') }}" class="nav-link {{ request()->routeIs('admin.equipments.*') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> Equipment
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> Booking Ruangan
            </a>
            <a href="{{ route('admin.checkins.index') }}" class="nav-link {{ request()->routeIs('admin.checkins.*') ? 'active' : '' }}">
                <i class="bi bi-box-arrow-in-right"></i> Riwayat Check-in
            </a>
            @endif

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

    {{-- Main Content --}}
    <div class="main-content">
        {{-- Top Navbar --}}
        <div class="top-navbar">
            <div class="d-flex align-items-center gap-3">
<<<<<<< HEAD
                <button class="btn btn-sm btn-outline-secondary sidebar-toggle" onclick="toggleSidebar()">
=======
                <button class="btn btn-sm btn-light sidebar-toggle" onclick="toggleSidebar()">
>>>>>>> development
                    <i class="bi bi-list"></i>
                </button>
                <span class="page-title">@yield('title', 'Dashboard')</span>
            </div>
            <div class="user-menu">
<<<<<<< HEAD
                <span class="d-none d-sm-inline text-muted" style="font-size:.85rem">{{ Auth::user()->name }}</span>
=======
                <div class="text-end d-none d-sm-block">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ Auth::user()->role }}</div>
                </div>
>>>>>>> development
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            </div>
        </div>

        {{-- Flash Messages --}}
        <div class="px-4 pt-3">
            @if(session('success'))
                <div class="alert alert-success flash-message d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger flash-message d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger flash-message" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Terdapat kesalahan:</strong>
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- Page Content --}}
<<<<<<< HEAD
        <div class="p-4">
=======
        <div class="p-4 flex-grow-1">
>>>>>>> development
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
        // Auto-dismiss flash messages
        setTimeout(() => {
            document.querySelectorAll('.flash-message').forEach(el => {
                new bootstrap.Alert(el).close();
            });
        }, 4000);
    </script>
    @yield('scripts')
</body>
</html>
