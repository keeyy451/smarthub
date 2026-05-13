@extends('layouts.admin')
@section('title', 'Booking Ruangan')

@section('content')
<<<<<<< HEAD
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <div>
        <h5 class="mb-1 fw-bold">Booking Ruangan</h5>
        <p class="text-muted mb-0" style="font-size:.85rem">Kelola jadwal peminjaman ruang kerja</p>
    </div>
=======
<div class="page-header d-flex align-items-center justify-content-between">
    <div>
        <h4>Booking Ruangan</h4>
        <p>Kelola dan verifikasi jadwal peminjaman ruang kerja & studio</p>
    </div>
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Tambah Booking
    </a>
>>>>>>> development
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
<<<<<<< HEAD
                        <th style="width:50px">#</th>
                        <th>User</th>
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th style="width:160px">Ubah Status</th>
=======
                        <th style="width:50px" class="ps-4">#</th>
                        <th>Member</th>
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th style="width:140px">Verifikasi</th>
                        <th style="width:120px" class="pe-4 text-end">Aksi</th>
>>>>>>> development
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $bk)
                    <tr>
<<<<<<< HEAD
                        <td>{{ $loop->iteration + $bookings->firstItem() - 1 }}</td>
                        <td class="fw-medium">{{ optional($bk->user)->name ?? '-' }}</td>
                        <td>{{ $bk->nama_ruangan }}</td>
                        <td>{{ $bk->tanggal->format('d M Y') }}</td>
                        <td>{{ $bk->jam_mulai }}</td>
                        <td>{{ $bk->jam_selesai }}</td>
=======
                        <td class="ps-4">{{ $loop->iteration + $bookings->firstItem() - 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; background: var(--primary-light); color: var(--primary); font-size: .75rem;">
                                    {{ strtoupper(substr(optional($bk->user)->name ?? '-', 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ optional($bk->user)->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="fw-medium">{{ $bk->nama_ruangan }}</td>
                        <td>{{ $bk->tanggal->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-light text-dark border fw-normal" style="font-size: .75rem;">
                                <i class="bi bi-clock me-1"></i>{{ $bk->jam_mulai }} - {{ $bk->jam_selesai }}
                            </span>
                        </td>
>>>>>>> development
                        <td><span class="badge badge-status badge-{{ $bk->status }}">{{ $bk->status }}</span></td>
                        <td>
                            <form action="{{ route('admin.bookings.updateStatus', $bk->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
<<<<<<< HEAD
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
=======
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm" style="font-size: .8rem;">
                                    <option value="pending" {{ $bk->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="approved" {{ $bk->status == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                    <option value="rejected" {{ $bk->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                    <option value="selesai" {{ $bk->status == 'selesai' ? 'selected' : '' }}>🏁 Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.bookings.edit', $bk->id) }}" class="btn btn-sm btn-light btn-action" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $bk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light btn-action text-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-calendar-x" style="font-size:2.5rem; opacity: .3;"></i>
                                <p class="mt-3 mb-0 fw-semibold">Belum ada data booking ruangan</p>
>>>>>>> development
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
