@extends('layouts.member')
@section('title', 'Daftar Peralatan')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Inventaris Peralatan</h4>
        <p>Pinjam alat studio yang tersedia dengan satu klik</p>
    </div>
</div>

{{-- Filters --}}
<div class="card content-card mb-4">
    <div class="card-body p-4">
        <form method="GET" action="{{ route('member.equipment.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Cari Alat</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" name="search" placeholder="Nama peralatan..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="">Semua Status</option>
                    <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-funnel-fill me-2"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

{{-- Equipment Grid --}}
<div class="row g-4">
    @forelse($equipments as $eq)
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="card equipment-card h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-start gap-3 mb-3">
                    @php
                        $iconBg = $eq->status == 'tersedia' ? '#ecfdf5' : ($eq->status == 'dipinjam' ? '#fffbeb' : '#fef2f2');
                        $iconColor = $eq->status == 'tersedia' ? '#059669' : ($eq->status == 'dipinjam' ? '#d97706' : '#dc2626');
                    @endphp
                    <div class="card-icon flex-shrink-0" style="background: {{ $iconBg }}; color: {{ $iconColor }};">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="overflow-hidden">
                        <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $eq->nama_peralatan }}">{{ $eq->nama_peralatan }}</h6>
                        <span class="badge bg-light text-muted fw-normal px-2 rounded-pill" style="font-size: .7rem;">{{ $eq->kategori }}</span>
                    </div>
                </div>
                
                <div class="d-flex gap-2 mb-3">
                    @php $statusClass = $eq->status == 'tersedia' ? 'badge-tersedia' : ($eq->status == 'dipinjam' ? 'badge-dipinjam' : 'badge-maintenance'); @endphp
                    <span class="badge badge-status {{ $statusClass }}">{{ ucfirst($eq->status) }}</span>
                    <span class="badge badge-status bg-light text-dark border" style="font-size: .65rem;">{{ ucfirst(str_replace('_', ' ', $eq->kondisi)) }}</span>
                </div>

                <div class="pt-3 border-top d-flex justify-content-between align-items-center mt-auto">
                    <div class="small fw-bold text-muted">Stock: {{ $eq->jumlah }}</div>
                    @if($eq->status == 'tersedia')
                        <form method="POST" action="{{ route('member.equipment.checkout', $eq) }}" onsubmit="return confirm('Konfirmasi peminjaman alat ini?')">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm px-3 fw-bold">Pinjam</button>
                        </form>
                    @elseif($eq->status == 'dipinjam')
                        <span class="small fw-bold" style="color: #d97706;">Sedang Dipinjam</span>
                    @else
                        <span class="small fw-bold text-danger">Maintenance</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center py-5">
            <i class="bi bi-search text-muted" style="font-size: 3rem; opacity: 0.2;"></i>
            <h5 class="mt-4 fw-bold text-muted">Alat tidak ditemukan</h5>
            <p class="text-muted">Coba gunakan kata kunci pencarian yang berbeda.</p>
            <a href="{{ route('member.equipment.index') }}" class="btn btn-light mt-2">Reset Pencarian</a>
        </div>
    </div>
    @endforelse
</div>

@if($equipments->hasPages())
<div class="d-flex justify-content-center mt-5">
    {{ $equipments->appends(request()->query())->links() }}
</div>
@endif
@endsection
