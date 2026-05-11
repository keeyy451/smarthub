@extends('layouts.admin')
@section('title', 'Edit Equipment')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.equipments.index') }}" class="text-decoration-none" style="font-size:.875rem">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Equipment
    </a>
</div>

<div class="card content-card">
    <div class="card-header">
        <i class="bi bi-pencil-square me-2"></i> Edit Peralatan: {{ $equipment->nama_peralatan }}
    </div>
    <div class="card-body">
        <form action="{{ route('admin.equipments.update', $equipment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Nama Peralatan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_peralatan" class="form-control @error('nama_peralatan') is-invalid @enderror" 
                           value="{{ old('nama_peralatan', $equipment->nama_peralatan) }}" required>
                    @error('nama_peralatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" 
                           value="{{ old('kategori', $equipment->kategori) }}" required>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Kondisi <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-select @error('kondisi') is-invalid @enderror" required>
                        <option value="baik" {{ old('kondisi', $equipment->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak_ringan" {{ old('kondisi', $equipment->kondisi) == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="rusak_berat" {{ old('kondisi', $equipment->kondisi) == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                    @error('kondisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="tersedia" {{ old('status', $equipment->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ old('status', $equipment->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="maintenance" {{ old('status', $equipment->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Jumlah <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" 
                           value="{{ old('jumlah', $equipment->jumlah) }}" min="1" required>
                    @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('admin.equipments.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
