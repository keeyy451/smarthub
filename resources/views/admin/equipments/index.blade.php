@extends('layouts.admin')
@section('title', 'Equipment Management')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <div>
        <h5 class="mb-1 fw-bold">Daftar Peralatan</h5>
        <p class="text-muted mb-0" style="font-size:.85rem">Kelola inventaris peralatan studio</p>
    </div>
    <a href="{{ route('admin.equipments.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Equipment
    </a>
</div>

{{-- Filter & Search --}}
<div class="card content-card mb-4">
    <div class="card-body py-3">
        <form action="{{ route('admin.equipments.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-sm-5">
                <label class="form-label mb-1" style="font-size:.8rem; color:#64748b;">Cari Peralatan</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Nama peralatan..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-sm-3">
                <label class="form-label mb-1" style="font-size:.8rem; color:#64748b;">Status</label>
                <select name="status" class="form-select form-select-sm">
                    <option value="">Semua Status</option>
                    <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    <i class="bi bi-funnel me-1"></i> Filter
                </button>
            </div>
            @if(request('search') || request('status'))
            <div class="col-sm-2">
                <a href="{{ route('admin.equipments.index') }}" class="btn btn-sm btn-outline-secondary w-100">Reset</a>
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
                        <th style="width:50px">#</th>
                        <th>Nama Peralatan</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th style="width:80px">Jumlah</th>
                        <th style="width:140px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipments as $eq)
                    <tr>
                        <td>{{ $loop->iteration + $equipments->firstItem() - 1 }}</td>
                        <td class="fw-medium">{{ $eq->nama_peralatan }}</td>
                        <td><span class="text-muted">{{ $eq->kategori }}</span></td>
                        <td><span class="badge badge-status badge-{{ $eq->kondisi }}">{{ str_replace('_', ' ', $eq->kondisi) }}</span></td>
                        <td><span class="badge badge-status badge-{{ $eq->status }}">{{ $eq->status }}</span></td>
                        <td class="text-center">{{ $eq->jumlah }}</td>
                        <td>
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
                                <i class="bi bi-inbox" style="font-size:2rem"></i>
                                <p class="mt-2 mb-0">Belum ada data peralatan</p>
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
