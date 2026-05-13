@extends('layouts.admin')
<<<<<<< HEAD
@section('title', 'Dashboard')

@section('content')
{{-- Statistics Cards --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#eef2ff; color:#4f46e5;">
                    <i class="bi bi-tools"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['total_equipment'] }}</div>
                    <div class="stat-label">Total Equipment</div>
=======
@section('title', 'Admin Dashboard')

@section('content')
{{-- Page Header --}}
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Dashboard</h4>
        <p>Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>. Pantau aktivitas hub Anda hari ini.</p>
    </div>
    <div class="d-flex gap-2 mt-2 mt-md-0">
        <a href="{{ route('admin.equipments.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Tambah Alat</a>
    </div>
</div>

{{-- Statistics Cards --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: var(--primary-light); color: var(--primary);">
                    <i class="bi bi-tools"></i>
                </div>
                <div>
                    <div class="stat-label">Total Alat</div>
                    <div class="stat-value">{{ number_format($stats['total_equipment']) }}</div>
>>>>>>> development
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
<<<<<<< HEAD
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#dcfce7; color:#16a34a;">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['tersedia'] }}</div>
                    <div class="stat-label">Tersedia</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['dipinjam'] }}</div>
                    <div class="stat-label">Sedang Dipinjam</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#fce7f3; color:#db2777;">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['total_members'] }}</div>
                    <div class="stat-label">Anggota</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Second row stats --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#dbeafe; color:#2563eb;">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['total_bookings'] }}</div>
                    <div class="stat-label">Total Booking</div>
=======
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #ecfdf5; color: #059669;">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <div class="stat-label">Total Booking</div>
                    <div class="stat-value">{{ number_format($stats['total_bookings']) }}</div>
>>>>>>> development
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
<<<<<<< HEAD
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['booking_pending'] }}</div>
                    <div class="stat-label">Booking Pending</div>
=======
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <div class="stat-label">Total Member</div>
                    <div class="stat-value">{{ number_format($stats['total_members']) }}</div>
>>>>>>> development
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
<<<<<<< HEAD
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#f3e8ff; color:#9333ea;">
                    <i class="bi bi-box-arrow-in-right"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['total_checkins'] }}</div>
                    <div class="stat-label">Total Check-in</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#fee2e2; color:#dc2626;">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['maintenance'] }}</div>
                    <div class="stat-label">Maintenance</div>
=======
        <div class="card stat-card h-100" style="background: linear-gradient(135deg, var(--primary), var(--accent)); border: none;">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: rgba(255,255,255,.2); color: white;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="stat-label" style="color: rgba(255,255,255,.7);">Pending</div>
                    <div class="stat-value" style="color: white;">{{ number_format($stats['booking_pending']) }}</div>
>>>>>>> development
                </div>
            </div>
        </div>
    </div>
</div>

<<<<<<< HEAD
{{-- Tables Row --}}
<div class="row g-4">
    {{-- Recent Check-ins --}}
    <div class="col-lg-6">
        <div class="card content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clock-history me-2"></i>Check-in Terbaru</span>
                <a href="{{ route('admin.checkins.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Equipment</th>
                                <th>Status</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_checkins as $ci)
                            <tr>
                                <td>{{ optional($ci->user)->name ?? '-' }}</td>
                                <td>{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</td>
                                <td><span class="badge badge-status badge-{{ $ci->status }}">{{ $ci->status }}</span></td>
                                <td>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('d M H:i') : '-' }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data check-in</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Bookings --}}
    <div class="col-lg-6">
        <div class="card content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-calendar3 me-2"></i>Booking Terbaru</span>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
=======
{{-- Quick Stats Row --}}
<div class="row g-4 mb-4">
    <div class="col-sm-4">
        <div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl);">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 48px; height: 48px; background: #ecfdf5;">
                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $stats['tersedia'] }}</h3>
                <small class="text-muted fw-semibold text-uppercase" style="font-size: .7rem; letter-spacing: .05em;">Alat Tersedia</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl);">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 48px; height: 48px; background: #fef3c7;">
                    <i class="bi bi-arrow-repeat text-warning fs-5"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $stats['dipinjam'] }}</h3>
                <small class="text-muted fw-semibold text-uppercase" style="font-size: .7rem; letter-spacing: .05em;">Sedang Dipinjam</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl);">
            <div class="card-body p-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 48px; height: 48px; background: #fef2f2;">
                    <i class="bi bi-wrench text-danger fs-5"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $stats['maintenance'] }}</h3>
                <small class="text-muted fw-semibold text-uppercase" style="font-size: .7rem; letter-spacing: .05em;">Maintenance</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Left Column --}}
    <div class="col-xl-8">
        {{-- Recent Bookings --}}
        <div class="card content-card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-calendar3 me-2 text-primary"></i>Booking Terbaru</span>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-light">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">Member</th>
                                <th>Ruangan</th>
                                <th>Jadwal</th>
                                <th class="pe-4 text-end">Status</th>
>>>>>>> development
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $bk)
                            <tr>
<<<<<<< HEAD
                                <td>{{ optional($bk->user)->name ?? '-' }}</td>
                                <td>{{ $bk->nama_ruangan }}</td>
                                <td>{{ $bk->tanggal->format('d M Y') }}</td>
                                <td><span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data booking</td></tr>
=======
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; background: var(--primary-light); color: var(--primary); font-size: .8rem;">
                                            {{ strtoupper(substr($bk->user->name, 0, 1)) }}
                                        </div>
                                        <div class="fw-semibold">{{ $bk->user->name }}</div>
                                    </div>
                                </td>
                                <td>{{ $bk->nama_ruangan }}</td>
                                <td>
                                    <div class="fw-medium">{{ $bk->tanggal->format('d M Y') }}</div>
                                    <div class="small text-muted">{{ $bk->jam_mulai }} - {{ $bk->jam_selesai }}</div>
                                </td>
                                <td class="pe-4 text-end">
                                    <span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada data booking</td></tr>
>>>>>>> development
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<<<<<<< HEAD
=======

        {{-- Recent Checkins --}}
        <div class="card content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-box-arrow-in-right me-2 text-primary"></i>Log Peminjaman Terbaru</span>
                <a href="{{ route('admin.checkins.index') }}" class="btn btn-sm btn-light">Riwayat <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">Member</th>
                                <th>Peralatan</th>
                                <th>Waktu</th>
                                <th class="pe-4 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_checkins as $ci)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $ci->user->name }}</td>
                                <td>{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</td>
                                <td><span class="small text-muted">{{ $ci->waktu_checkin->format('d M Y, H:i') }}</span></td>
                                <td class="pe-4 text-end">
                                    <span class="badge badge-status badge-{{ $ci->status }}">
                                        {{ $ci->status == 'checked_out' ? 'Dipinjam' : 'Dikembalikan' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada log peminjaman</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="col-xl-4">
        {{-- New Members --}}
        <div class="card content-card mb-4">
            <div class="card-header">
                <i class="bi bi-people me-2 text-primary"></i>Member Terbaru
            </div>
            <div class="card-body px-4 py-3">
                @forelse($recent_users as $u)
                <div class="d-flex align-items-center gap-3 py-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 44px; height: 44px; background: #f1f5f9; color: var(--text-secondary); font-size: .9rem;">
                        {{ strtoupper(substr($u->name, 0, 1)) }}
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-bold" style="font-size: .9rem;">{{ $u->name }}</div>
                        <div class="small text-muted">{{ $u->email }}</div>
                    </div>
                    <div class="small text-muted">{{ $u->created_at->diffForHumans() }}</div>
                </div>
                @empty
                <div class="text-center py-4 text-muted">Belum ada member</div>
                @endforelse
            </div>
        </div>

        {{-- Help Card --}}
        <div class="card border-0" style="border-radius: var(--radius-xl); background: linear-gradient(135deg, var(--sidebar-bg), #1e293b);">
            <div class="card-body p-4 text-white">
                <div class="mb-3">
                    <i class="bi bi-lightning-charge-fill fs-3" style="color: var(--warning);"></i>
                </div>
                <h6 class="fw-bold mb-2">Smart-Hub API</h6>
                <p class="mb-3 small" style="color: rgba(255,255,255,.6);">Koneksikan aplikasi tablet untuk check-in peralatan melalui REST API yang tersedia.</p>
                <div class="d-flex gap-2">
                    <span class="badge bg-success bg-opacity-25 text-success-emphasis px-3 py-2" style="font-size: .7rem;">API Ready</span>
                    <span class="badge bg-primary bg-opacity-25 text-primary-emphasis px-3 py-2" style="font-size: .7rem;">Token Auth</span>
                </div>
            </div>
        </div>
>>>>>>> development
    </div>
</div>
@endsection
