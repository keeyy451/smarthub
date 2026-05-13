@php
    $layout = Auth::user()->role == 'admin' ? 'layouts.admin' : 'layouts.member';
@endphp

@extends($layout)
@section('title', 'Profil Saya')

@section('content')
<div class="page-header">
    <h4>Pengaturan Profil</h4>
    <p>Kelola informasi akun dan keamanan kata sandi Anda</p>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card content-card mb-4">
            <div class="card-header">
                <i class="bi bi-person-circle me-2 text-primary"></i>Informasi Profil
            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                        @if (session('status') === 'profile-updated')
                            <span class="text-success small fw-semibold"><i class="bi bi-check-lg"></i> Berhasil disimpan</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card content-card border-danger-subtle">
            <div class="card-header text-danger">
                <i class="bi bi-exclamation-octagon me-2"></i>Hapus Akun
            </div>
            <div class="card-body p-4">
                <p class="text-muted small mb-4">Setelah akun Anda dihapus, semua sumber daya dan data Anda akan dihapus secara permanen. Sebelum menghapus, harap unduh data apa pun yang ingin Anda simpan.</p>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Hapus Akun Permanen
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card content-card">
            <div class="card-header">
                <i class="bi bi-shield-lock me-2 text-primary"></i>Update Kata Sandi
            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label class="form-label">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" placeholder="••••••••">
                        @error('current_password', 'updatePassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kata Sandi Baru</label>
                        <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" placeholder="••••••••">
                        @error('password', 'updatePassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" placeholder="••••••••">
                        @error('password_confirmation', 'updatePassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Update Sandi</button>
                        @if (session('status') === 'password-updated')
                            <span class="text-success small fw-semibold"><i class="bi bi-check-lg"></i> Sandi diperbarui</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: var(--radius-xl);">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Konfirmasi Penghapusan Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body p-4">
                    <p class="text-muted">Apakah Anda yakin ingin menghapus akun? Masukkan kata sandi Anda untuk mengonfirmasi.</p>
                    <div class="mt-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger px-4">Ya, Hapus Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
