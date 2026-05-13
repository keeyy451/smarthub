@extends('layouts.member')
@section('title', 'Booking Ruangan Baru')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-end">
    <div>
        <h4><i class="bi bi-calendar-plus-fill me-2 text-primary"></i>Buat Booking Ruangan</h4>
        <p>Pilih jadwal dan ruangan yang Anda butuhkan</p>
    </div>
    <a href="{{ route('member.booking.index') }}" class="btn btn-light mt-2 mt-md-0">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-primary"></i>Form Pengajuan Booking
            </div>
            <div class="card-body p-4 p-lg-5">
                <form method="POST" action="{{ route('member.booking.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_ruangan" class="form-label">Pilih Ruangan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-door-open text-muted"></i></span>
                            <select class="form-select border-start-0 @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan" name="nama_ruangan" required>
                                <option value="">-- Pilih Ruangan --</option>
                                <option value="Ruang Meeting A" {{ old('nama_ruangan') == 'Ruang Meeting A' ? 'selected' : '' }}>🏢 Ruang Meeting A</option>
                                <option value="Ruang Meeting B" {{ old('nama_ruangan') == 'Ruang Meeting B' ? 'selected' : '' }}>🏢 Ruang Meeting B</option>
                                <option value="Ruang Konferensi" {{ old('nama_ruangan') == 'Ruang Konferensi' ? 'selected' : '' }}>🏛️ Ruang Konferensi</option>
                                <option value="Ruang Workshop" {{ old('nama_ruangan') == 'Ruang Workshop' ? 'selected' : '' }}>🛠️ Ruang Workshop</option>
                                <option value="Ruang Training" {{ old('nama_ruangan') == 'Ruang Training' ? 'selected' : '' }}>🎓 Ruang Training</option>
                                <option value="Auditorium" {{ old('nama_ruangan') == 'Auditorium' ? 'selected' : '' }}>🎭 Auditorium</option>
                            </select>
                        </div>
                        @error('nama_ruangan')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="form-label">Tanggal Peminjaman</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-calendar-event text-muted"></i></span>
                            <input type="date" class="form-control border-start-0 @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}" required>
                        </div>
                        @error('tanggal')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-clock text-muted"></i></span>
                                <input type="time" class="form-control border-start-0 @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                            </div>
                            @error('jam_mulai')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-clock-history text-muted"></i></span>
                                <input type="time" class="form-control border-start-0 @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                            </div>
                            @error('jam_selesai')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="alert border-0 d-flex align-items-start gap-3 p-4 mb-4" style="background: var(--primary-light); border-radius: var(--radius-lg);">
                        <div class="rounded-circle d-flex align-items-center justify-content-center p-2" style="width: 40px; height: 40px; background: white; color: var(--primary);">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--primary-dark);">Catatan Penting:</h6>
                            <p class="mb-0 small" style="color: var(--text-secondary);">Setiap pengajuan booking akan melalui tahap verifikasi admin. Pastikan jadwal tidak bentrok dengan agenda hub lainnya.</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 pt-4 border-top">
                        <a href="{{ route('member.booking.index') }}" class="btn btn-light px-4 fw-bold">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold">
                            <i class="bi bi-send-fill me-2"></i>Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
