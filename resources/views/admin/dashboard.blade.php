@extends('layouts.admin')
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
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
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
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['booking_pending'] }}</div>
                    <div class="stat-label">Booking Pending</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
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
                </div>
            </div>
        </div>
    </div>
</div>

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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $bk)
                            <tr>
                                <td>{{ optional($bk->user)->name ?? '-' }}</td>
                                <td>{{ $bk->nama_ruangan }}</td>
                                <td>{{ $bk->tanggal->format('d M Y') }}</td>
                                <td><span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data booking</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
