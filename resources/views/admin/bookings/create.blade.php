@extends('layouts.admin')
@section('title', 'Tambah Booking')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4>Tambah Booking Ruangan</h4>
        <p>Input jadwal peminjaman ruangan secara manual</p>
    </div>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-light mt-2 mt-md-0">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card content-card">
            <div class="card-header">
                <i class="bi bi-calendar-plus me-2 text-primary"></i>Form Tambah Booking
            </div>
            <div class="card-body p-4 p-lg-5">
                <form action="{{ route('admin.bookings.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Member / Pengguna <span class="text-danger">*</span></label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                            <option value="">Pilih Member...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Nama Ruangan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" 
                               value="{{ old('nama_ruangan') }}" placeholder="Contoh: Studio Recording A, Meeting Room 1" required>
                        @error('nama_ruangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                                   value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" 
                                   value="{{ old('jam_mulai') }}" required>
                            @error('jam_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" 
                                   value="{{ old('jam_selesai') }}" required>
                            @error('jam_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                            <option value="approved" {{ old('status', 'approved') == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                            <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>🏁 Selesai</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-3 pt-4 border-top">
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
