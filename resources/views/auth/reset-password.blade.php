<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Sandi - Smart-Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Outfit', sans-serif; }
        body { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0f172a; padding: 2rem; position: relative; overflow-x: hidden; }
        .blob { position: absolute; border-radius: 50%; filter: blur(100px); z-index: 0; }
        .blob-1 { width: 400px; height: 400px; top: -200px; left: -200px; background: rgba(14, 165, 233, 0.2); }
        .auth-card { width: 100%; max-width: 440px; position: relative; z-index: 1; }
        .brand-logo { width: 52px; height: 52px; background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: white; margin: 0 auto 1.5rem; box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3); }
        h2 { color: white; font-weight: 800; text-align: center; letter-spacing: -0.02em; margin-bottom: .5rem; }
        .subtitle { color: #94a3b8; text-align: center; margin-bottom: 2rem; font-size: .9rem; }
        .form-label { color: #94a3b8; font-weight: 600; font-size: .75rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: .5rem; }
        .form-control { background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1); border-radius: .875rem; padding: .875rem 1.25rem; color: white; font-size: .9rem; transition: all 0.25s ease; }
        .form-control:focus { background: rgba(255,255,255,.08); border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15); color: white; }
        .btn-primary-custom { background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%); border: none; border-radius: .875rem; padding: .875rem; color: white; font-weight: 700; font-size: .9rem; margin-top: 1rem; transition: all 0.25s ease; box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3); }
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4); color: white; }
    </style>
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="auth-card">
        <div class="brand-logo"><i class="bi bi-cpu"></i></div>
        <h2>Atur Ulang Sandi</h2>
        <p class="subtitle">Buat kata sandi baru untuk mengamankan akun Anda.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $request->email) }}" required readonly>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required autofocus>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Sandi Baru</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100">RESET KATA SANDI</button>
        </form>
    </div>
</body>
</html>
