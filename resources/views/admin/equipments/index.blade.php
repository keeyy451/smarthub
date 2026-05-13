@extends('layouts.admin')
@section('title', 'Equipment Management')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Daftar Peralatan</h4>
        <p>Kelola inventaris peralatan studio & ruang kerja</p>
    </div>
    <a href="{{ route('admin.equipments.create') }}" class="btn btn-primary mt-2 mt-md-0">
        <i class="bi bi-plus-lg me-1"></i> Tambah Equipment
    </a>
</div>

{{-- Filter & Search --}}
<div class="card content-card mb-4">
    <div class="card-body py-3 px-4">
        <form action="{{ route('admin.equipments.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-sm-5">
                <label class="form-label">Cari Peralatan</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Nama peralatan..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-sm-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-funnel me-1"></i> Filter
                </button>
            </div>
            @if(request('search') || request('status'))
            <div class="col-sm-2">
                <a href="{{ route('admin.equipments.index') }}" class="btn btn-light w-100">Reset</a>
            </div>
            @endif
        </form>
    </div>
</div>

{{-- Table --}}
<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:50px" class="ps-4">#</th>
                        <th>Nama Peralatan</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th style="width:80px" class="text-center">Qty</th>
                        <th style="width:140px" class="pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipments as $eq)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration + $equipments->firstItem() - 1 }}</td>
                        <td class="fw-semibold">{{ $eq->nama_peralatan }}</td>
                        <td><span class="text-muted">{{ $eq->kategori }}</span></td>
                        <td><span class="badge badge-status badge-{{ $eq->kondisi }}">{{ str_replace('_', ' ', $eq->kondisi) }}</span></td>
                        <td><span class="badge badge-status badge-{{ $eq->status }}">{{ $eq->status }}</span></td>
                        <td class="text-center fw-bold">{{ $eq->jumlah }}</td>
                        <td class="pe-4">
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.equipments.edit', $eq->id) }}" class="btn btn-sm btn-outline-warning btn-action" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.equipments.destroy', $eq->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus peralatan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-action" title="Hapus">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-inbox" style="font-size:2.5rem; opacity: .3;"></i>
                                <p class="mt-3 mb-0 fw-semibold">Belum ada data peralatan</p>
                                <a href="{{ route('admin.equipments.create') }}" class="btn btn-primary btn-sm mt-3">Tambah Sekarang</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($equipments->hasPages())
    <div class="card-footer bg-transparent border-0 d-flex justify-content-center py-3">
        {{ $equipments->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection
