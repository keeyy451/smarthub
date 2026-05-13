@extends('layouts.member')
@section('title', 'Booking Ruangan Saya')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Riwayat Booking Ruangan</h4>
        <p>Lihat dan pantau status pengajuan peminjaman ruangan Anda</p>
    </div>
    <a href="{{ route('member.booking.create') }}" class="btn btn-primary mt-2 mt-md-0">
        <i class="bi bi-calendar-plus me-2"></i>Buat Booking Baru
    </a>
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $bk)
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: var(--primary-light); color: var(--primary);">
                                    <i class="bi bi-door-open-fill"></i>
                                </div>
                                <div class="fw-bold text-dark">{{ $bk->nama_ruangan }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-medium">{{ $bk->tanggal->format('d F Y') }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border fw-normal" style="font-size: .75rem;">
                                <i class="bi bi-clock me-1"></i>{{ $bk->jam_mulai }} - {{ $bk->jam_selesai }}
                            </span>
                        </td>
                        <td>
                            @php
                                $statusClass = ['pending' => 'badge-pending', 'approved' => 'badge-approved', 'rejected' => 'badge-rejected', 'selesai' => 'badge-selesai'][$bk->status] ?? 'bg-secondary';
                                $statusLabel = ['pending' => 'Menunggu', 'approved' => 'Disetujui', 'rejected' => 'Ditolak', 'selesai' => 'Selesai'][$bk->status] ?? ucfirst($bk->status);
                            @endphp
                            <span class="badge badge-status {{ $statusClass }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="text-end pe-4">
                            @if($bk->status == 'pending')
                            <form method="POST" action="{{ route('member.booking.cancel', $bk) }}" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm px-3 fw-bold">
                                    <i class="bi bi-x-circle me-1"></i>Batalkan
                                </button>
                            </form>
                            @else
                            <span class="text-muted small fw-semibold">Sudah Diproses</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem; opacity: 0.2;"></i>
                                <h5 class="mt-4 fw-bold text-muted">Belum ada booking</h5>
                                <p class="text-muted">Anda belum memiliki riwayat pemesanan ruangan.</p>
                                <a href="{{ route('member.booking.create') }}" class="btn btn-primary mt-2 px-4">Buat Booking Sekarang</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($bookings->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $bookings->links() }}
</div>
@endif
@endsection
