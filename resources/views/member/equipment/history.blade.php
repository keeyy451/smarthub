@extends('layouts.member')
@section('title', 'Riwayat Pinjam Equipment')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Riwayat Peminjaman Alat</h4>
        <p>Lacak seluruh aktivitas peminjaman dan pengembalian Anda</p>
    </div>
    <a href="{{ route('member.equipment.index') }}" class="btn btn-primary btn-sm mt-2 mt-md-0">
        <i class="bi bi-tools me-2"></i>Pinjam Alat Baru
    </a>
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Peralatan</th>
                        <th>Waktu Log</th>
                        <th class="text-end pe-4">Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkins as $ci)
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                @php
                                    $iconBg = $ci->status == 'checked_in' ? '#ecfdf5' : '#fffbeb';
                                    $iconColor = $ci->status == 'checked_in' ? '#059669' : '#d97706';
                                    $icon = $ci->status == 'checked_in' ? 'bi-box-arrow-in-down' : 'bi-box-arrow-up-right';
                                @endphp
                                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: {{ $iconBg }}; color: {{ $iconColor }};">
                                    <i class="bi {{ $icon }}"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</div>
                                    <div class="small text-muted">{{ optional($ci->equipment)->kategori ?? 'Uncategorized' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-medium">{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('d M Y') : '-' }}</div>
                            <div class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('H:i') : '-' }}</div>
                        </td>
                        <td class="text-end pe-4">
                            @php
                                $statusClass = $ci->status == 'checked_in' ? 'badge-tersedia' : 'badge-dipinjam';
                                $statusLabel = $ci->status == 'checked_in' ? 'Dikembalikan' : 'Dipinjam';
                            @endphp
                            <span class="badge badge-status {{ $statusClass }} px-3">{{ $statusLabel }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-clock-history text-muted" style="font-size: 3rem; opacity: 0.2;"></i>
                                <h5 class="mt-4 fw-bold text-muted">Belum ada riwayat aktivitas</h5>
                                <p class="text-muted">Aktivitas peminjaman Anda akan muncul otomatis di sini.</p>
                                <a href="{{ route('member.equipment.index') }}" class="btn btn-primary mt-2 px-4">Pinjam Alat Sekarang</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($checkins->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $checkins->links() }}
</div>
@endif
@endsection
