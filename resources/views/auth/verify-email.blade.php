<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Smart-Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Outfit', sans-serif; }
        body { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0f172a; padding: 2rem; position: relative; overflow-x: hidden; }
        .blob { position: absolute; border-radius: 50%; filter: blur(100px); z-index: 0; }
        .blob-1 { width: 400px; height: 400px; top: -200px; left: -200px; background: rgba(14, 165, 233, 0.2); }
        .auth-card { width: 100%; max-width: 460px; position: relative; z-index: 1; }
        .brand-logo { width: 52px; height: 52px; background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: white; margin: 0 auto 1.5rem; box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3); }
        h2 { color: white; font-weight: 800; text-align: center; letter-spacing: -0.02em; margin-bottom: .5rem; }
        .subtitle { color: #94a3b8; text-align: center; margin-bottom: 2rem; font-size: .9rem; line-height: 1.6; }
        .btn-primary-custom { background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%); border: none; border-radius: .875rem; padding: .875rem; color: white; font-weight: 700; font-size: .9rem; transition: all 0.25s ease; box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3); }
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4); color: white; }
        .btn-logout { background: transparent; border: 1px solid rgba(255,255,255,.1); color: #94a3b8; font-size: .85rem; font-weight: 600; padding: .6rem 1.25rem; border-radius: .75rem; transition: all 0.2s; }
        .btn-logout:hover { background: rgba(255,255,255,.05); color: white; border-color: rgba(255,255,255,.2); }
    </style>
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="auth-card">
        <div class="brand-logo"><i class="bi bi-cpu"></i></div>
        <h2>Verifikasi Email</h2>
        <p class="subtitle">Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan melalui email. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan yang lain.</p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success small fw-bold mb-4" role="alert">
                Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
            </div>
        @endif

        <div class="d-flex flex-column gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary-custom w-100">KIRIM ULANG VERIFIKASI</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="btn btn-logout">Keluar / Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
