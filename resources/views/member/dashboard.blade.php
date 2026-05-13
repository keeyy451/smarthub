@extends('layouts.member')
@section('title', 'Dashboard')

@section('content')
{{-- Welcome Banner --}}
<div class="card border-0 mb-4 overflow-hidden" style="border-radius: var(--radius-xl); background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #0284c7 100%);">
    <div class="card-body p-5 position-relative">
        <div class="position-relative" style="z-index: 1;">
            <h3 class="text-white fw-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
            <p class="mb-0" style="color: rgba(255,255,255,.7); font-size: 1rem;">Pantau aktivitas peminjaman dan booking ruangan Anda di sini.</p>
        </div>
        <i class="bi bi-cpu position-absolute" style="font-size: 8rem; color: rgba(255,255,255,.08); right: 30px; top: 50%; transform: translateY(-50%);"></i>
    </div>
</div>

{{-- Statistics Cards --}}
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-4">
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: var(--primary-light); color: var(--primary);">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <div class="stat-label">Total Booking</div>
                    <div class="stat-value">{{ number_format($stats['my_bookings']) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #ecfdf5; color: #059669;">
                    <i class="bi bi-check2-all"></i>
                </div>
                <div>
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value">{{ number_format($stats['booking_approved']) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card stat-card h-100">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="stat-label">Riwayat Pinjam</div>
                    <div class="stat-value">{{ number_format($stats['my_checkins']) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Borrowed Equipment Warning --}}
@if($borrowed_equipments->count() > 0)
<div class="card border-0 mb-4" style="border-radius: var(--radius-xl); border-left: 5px solid #f59e0b !important; background: #fffbeb;">
    <div class="card-header bg-transparent border-0 p-4 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold" style="color: #92400e;"><i class="bi bi-exclamation-triangle-fill me-2"></i>Alat yang Sedang Dipinjam</h6>
        <span class="badge bg-warning text-dark px-3 rounded-pill fw-bold">{{ $borrowed_equipments->count() }} Item</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead>
                    <tr style="background: rgba(245, 158, 11, .08);">
                        <th class="ps-4" style="color: #92400e;">Peralatan</th>
                        <th style="color: #92400e;">Kategori</th>
                        <th style="color: #92400e;">Waktu Pinjam</th>
                        <th class="text-end pe-4" style="color: #92400e;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowed_equipments as $eq)
                    <tr class="border-top" style="border-color: rgba(245, 158, 11, .1) !important;">
                        <td class="ps-4 py-3 fw-bold">{{ $eq->nama_peralatan }}</td>
                        <td><span class="badge bg-white border fw-normal" style="color: #92400e;">{{ $eq->kategori }}</span></td>
                        <td>
                            @php $lastCheckout = $eq->equipmentCheckins()->where('status', 'checked_out')->latest('waktu_checkin')->first(); @endphp
                            <span class="small fw-medium">{{ $lastCheckout ? $lastCheckout->waktu_checkin->format('d M, H:i') : '-' }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <form method="POST" action="{{ route('member.equipment.checkin', $eq) }}" onsubmit="return confirm('Kembalikan alat ini sekarang?')">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm fw-bold"><i class="bi bi-box-arrow-in-down me-1"></i>Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

{{-- Quick Actions --}}
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <a href="{{ route('member.booking.create') }}" class="card border-0 h-100 text-decoration-none" style="border-radius: var(--radius-xl); border: 1px solid var(--border-color); transition: var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--card-shadow-hover)';" onmouseout="this.style.transform=''; this.style.boxShadow='';">
            <div class="card-body p-4 d-flex align-items-center gap-4">
                <div class="stat-icon flex-shrink-0" style="background: var(--primary-light); color: var(--primary); width: 60px; height: 60px;">
                    <i class="bi bi-calendar-plus fs-3"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-1">Booking Ruangan</h6>
                    <p class="text-muted mb-0 small">Ajukan peminjaman ruang kerja atau studio</p>
                </div>
                <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('member.equipment.index') }}" class="card border-0 h-100 text-decoration-none" style="border-radius: var(--radius-xl); border: 1px solid var(--border-color); transition: var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--card-shadow-hover)';" onmouseout="this.style.transform=''; this.style.boxShadow='';">
            <div class="card-body p-4 d-flex align-items-center gap-4">
                <div class="stat-icon flex-shrink-0" style="background: #ecfdf5; color: #059669; width: 60px; height: 60px;">
                    <i class="bi bi-tools fs-3"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-1">Pinjam Alat</h6>
                    <p class="text-muted mb-0 small">Lihat inventaris dan pinjam peralatan tersedia</p>
                </div>
                <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </div>
        </a>
    </div>
</div>

{{-- Tables Row --}}
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card content-card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-calendar3 me-2 text-primary"></i>Booking Terbaru</span>
                <a href="{{ route('member.booking.index') }}" class="btn btn-sm btn-light">Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead><tr><th class="ps-4">Ruangan</th><th>Tanggal</th><th class="pe-4 text-end">Status</th></tr></thead>
                        <tbody>
                            @forelse($recent_bookings as $bk)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $bk->nama_ruangan }}</td>
                                <td>{{ $bk->tanggal->format('d M Y') }}</td>
                                <td class="pe-4 text-end"><span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-5 text-muted">Belum ada booking</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card content-card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clock-history me-2 text-primary"></i>Pinjaman Terbaru</span>
                <a href="{{ route('member.equipment.history') }}" class="btn btn-sm btn-light">Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead><tr><th class="ps-4">Equipment</th><th>Waktu</th><th class="pe-4 text-end">Aktivitas</th></tr></thead>
                        <tbody>
                            @forelse($recent_checkins as $ci)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</td>
                                <td>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('d M, H:i') : '-' }}</td>
                                <td class="pe-4 text-end">
                                    @php $label = $ci->status == 'checked_out' ? 'Dipinjam' : 'Dikembalikan'; $class = $ci->status == 'checked_out' ? 'badge-dipinjam' : 'badge-tersedia'; @endphp
                                    <span class="badge badge-status {{ $class }}">{{ $label }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-5 text-muted">Belum ada aktivitas</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
