<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Smart-Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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

        body {
            background: var(--body-bg);
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #312e81 100%);
            color: #fff;
            z-index: 1040;
            transition: transform .3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .sidebar-brand h4 {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
        }

        .sidebar-brand small {
            color: rgba(255,255,255,.5);
            font-size: .75rem;
        }

        .sidebar-nav { padding: .75rem 0; }

        .sidebar-nav .nav-label {
            font-size: .65rem;
            text-transform: uppercase;
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
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,.12);
            border-left-color: #818cf8;
            font-weight: 500;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.1rem;
            width: 1.5rem;
            text-align: center;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* ===== TOP NAVBAR ===== */
        .top-navbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: .75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .top-navbar .page-title {
            font-weight: 600;
            font-size: 1.05rem;
            color: #1e293b;
        }

        .top-navbar .user-menu {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .top-navbar .user-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: .8rem;
        }

        /* ===== CARDS ===== */
        .stat-card {
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
        }

        .stat-card .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
        }

        .stat-card .stat-label {
            font-size: .8rem;
            color: #64748b;
            font-weight: 500;
        }

        /* ===== CONTENT CARD ===== */
        .content-card {
            background: #fff;
            border: none;
            border-radius: .75rem;
            box-shadow: var(--card-shadow);
        }

        .content-card .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 1.25rem;
            font-weight: 600;
            font-size: .95rem;
            color: #1e293b;
        }

        /* ===== TABLE ===== */
        .table th {
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: #64748b;
            font-weight: 600;
            border-bottom-width: 1px;
            padding: .75rem 1rem;
            background: #f8fafc;
        }

        .table td {
            padding: .75rem 1rem;
            vertical-align: middle;
            font-size: .875rem;
            color: #334155;
        }

        .table tbody tr {
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        /* ===== BADGES ===== */
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
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
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
        }

        /* ===== PAGINATION ===== */
        .pagination .page-link {
            color: var(--primary);
            border-radius: .375rem;
            margin: 0 2px;
            font-size: .85rem;
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
            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.5);
                z-index: 1035;
            }
            .sidebar-overlay.show { display: block; }
        }

        /* ===== FLASH MESSAGE ===== */
        .flash-message {
            border: none;
            border-radius: .5rem;
            font-size: .875rem;
        }
    </style>
</head>
<body>
    {{-- Sidebar Overlay (mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    {{-- Sidebar --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-cpu me-2"></i>Smart-Hub</h4>
            <small>Management System</small>
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
                <button class="btn btn-sm btn-outline-secondary sidebar-toggle" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <span class="page-title">@yield('title', 'Dashboard')</span>
            </div>
            <div class="user-menu">
                <span class="d-none d-sm-inline text-muted" style="font-size:.85rem">{{ Auth::user()->name }}</span>
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
        <div class="p-4">
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
