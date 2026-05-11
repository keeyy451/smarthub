@extends('layouts.admin')
@section('title', 'Riwayat Check-in')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <div>
        <h5 class="mb-1 fw-bold">Riwayat Check-in Peralatan</h5>
        <p class="text-muted mb-0" style="font-size:.85rem">Log aktivitas check-in/check-out peralatan oleh anggota</p>
    </div>
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:50px">#</th>
                        <th>User</th>
                        <th>Equipment</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkins as $ci)
                    <tr>
                        <td>{{ $loop->iteration + $checkins->firstItem() - 1 }}</td>
                        <td class="fw-medium">{{ optional($ci->user)->name ?? '-' }}</td>
                        <td>{{ optional($ci->equipment)->nama_peralatan ?? '-' }}</td>
                        <td>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('d M Y - H:i') : '-' }}</td>
                        <td><span class="badge badge-status badge-{{ $ci->status }}">{{ str_replace('_', ' ', $ci->status) }}</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-box-arrow-in-right" style="font-size:2rem"></i>
                                <p class="mt-2 mb-0">Belum ada riwayat check-in</p>
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
