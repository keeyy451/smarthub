@extends('layouts.admin')
@section('title', 'Booking Ruangan')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <div>
        <h5 class="mb-1 fw-bold">Booking Ruangan</h5>
        <p class="text-muted mb-0" style="font-size:.85rem">Kelola jadwal peminjaman ruang kerja</p>
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
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th style="width:160px">Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $bk)
                    <tr>
                        <td>{{ $loop->iteration + $bookings->firstItem() - 1 }}</td>
                        <td class="fw-medium">{{ optional($bk->user)->name ?? '-' }}</td>
                        <td>{{ $bk->nama_ruangan }}</td>
                        <td>{{ $bk->tanggal->format('d M Y') }}</td>
                        <td>{{ $bk->jam_mulai }}</td>
                        <td>{{ $bk->jam_selesai }}</td>
                        <td><span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span></td>
                        <td>
                            <form action="{{ route('admin.bookings.updateStatus', $bk->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="pending" {{ $bk->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $bk->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $bk->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="selesai" {{ $bk->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-calendar-x" style="font-size:2rem"></i>
                                <p class="mt-2 mb-0">Belum ada data booking ruangan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($bookings->hasPages())
    <div class="card-footer bg-transparent border-0 d-flex justify-content-center py-3">
        {{ $bookings->links() }}
    </div>
    @endif
</div>
@endsection
