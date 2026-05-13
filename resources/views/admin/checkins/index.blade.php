@extends('layouts.admin')
@section('title', 'Riwayat Check-in')

@section('content')
<div class="page-header">
    <h4>Riwayat Check-in Peralatan</h4>
    <p>Log aktivitas check-in & check-out peralatan oleh anggota melalui API tablet</p>
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:50px" class="ps-4">#</th>
                        <th>Member</th>
                        <th>Peralatan</th>
                        <th>Waktu</th>
                        <th class="pe-4 text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkins as $ci)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration + $checkins->firstItem() - 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; background: var(--primary-light); color: var(--primary); font-size: .75rem;">
                                    {{ strtoupper(substr(optional($ci->user)->name ?? '-', 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ optional($ci->user)->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="fw-medium">{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</div>
                            <div class="small text-muted">{{ optional($ci->equipment)->kategori ?? '' }}</div>
                        </td>
                        <td>
                            <div class="fw-medium">{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('d M Y') : '-' }}</div>
                            <div class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('H:i') : '-' }}</div>
                        </td>
                        <td class="pe-4 text-end">
                            <span class="badge badge-status badge-{{ $ci->status }}">
                                {{ $ci->status == 'checked_out' ? '↗ Dipinjam' : '↙ Dikembalikan' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-box-arrow-in-right" style="font-size:2.5rem; opacity: .3;"></i>
                                <p class="mt-3 mb-0 fw-semibold">Belum ada riwayat check-in</p>
                                <p class="small text-muted mt-1">Data akan muncul saat member meminjam alat via aplikasi tablet</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($checkins->hasPages())
    <div class="card-footer bg-transparent border-0 d-flex justify-content-center py-3">
        {{ $checkins->links() }}
    </div>
    @endif
</div>
@endsection
