<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Smart-Hub Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Outfit', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            overflow-x: hidden;
            position: relative;
        }

        .left-panel {
            flex: 1;
            display: none;
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #0284c7 100%);
            position: relative;
            padding: 4rem;
            align-items: flex-end;
        }
<<<<<<< HEAD

        .left-panel .content { position: relative; z-index: 1; color: white; }
        .left-panel .content h1 { font-weight: 800; font-size: 3rem; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem; }
        .left-panel .content p { font-size: 1.1rem; color: rgba(255,255,255,.7); line-height: 1.6; max-width: 400px; }
        .left-panel .circles { position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; }
        .left-panel .circle { position: absolute; border-radius: 50%; background: rgba(255,255,255,.06); }
        .left-panel .c1 { width: 400px; height: 400px; top: -100px; right: -100px; }
        .left-panel .c2 { width: 250px; height: 250px; bottom: 30%; left: -50px; }

        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .blob { position: absolute; border-radius: 50%; filter: blur(100px); }
        .blob-1 { width: 400px; height: 400px; top: -200px; left: -200px; background: rgba(14, 165, 233, 0.2); }

        .register-card {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 52px; height: 52px;
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            border-radius: 1rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; color: white;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
        }

        h2 { color: white; font-weight: 800; text-align: center; letter-spacing: -0.02em; margin-bottom: .5rem; }
        .subtitle { color: #94a3b8; text-align: center; margin-bottom: 2rem; font-size: .9rem; }

        .form-label { color: #94a3b8; font-weight: 600; font-size: .75rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: .4rem; }

        .form-control {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: .75rem;
            padding: .75rem 1rem;
            color: white;
            font-size: .9rem;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            background: rgba(255,255,255,.08);
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
            color: white;
        }

        .btn-register {
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            border: none;
            border-radius: .75rem;
            padding: .875rem;
            color: white;
            font-weight: 700;
            font-size: .9rem;
            margin-top: 1rem;
            transition: all 0.25s ease;
            box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
        }

        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4); color: white; }

        .footer-text { text-align: center; margin-top: 1.5rem; color: #64748b; font-size: .85rem; }
        .footer-text a { color: #0ea5e9; text-decoration: none; font-weight: 700; }

        @media (min-width: 992px) { .left-panel { display: flex; } }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="circles">
        <div class="circle c1"></div>
        <div class="circle c2"></div>
    </div>
    <div class="content">
        <h1>Bergabunglah Bersama Kami</h1>
        <p>Mulai perjalanan kreatif Anda dengan akses penuh ke ruangan dan peralatan studio terbaik kami.</p>
    </div>
</div>

<div class="right-panel">
    <div class="blob blob-1"></div>

    <div class="register-card">
        <div class="brand-logo"><i class="bi bi-cpu"></i></div>
        <h2>Buat Akun Baru</h2>
        <p class="subtitle">Daftar untuk mulai menggunakan Smart-Hub</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-register w-100">DAFTAR SEKARANG</button>

            <div class="footer-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </form>
    </div>
</div>

=======

        .left-panel .content { position: relative; z-index: 1; color: white; }
        .left-panel .content h1 { font-weight: 800; font-size: 3rem; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem; }
        .left-panel .content p { font-size: 1.1rem; color: rgba(255,255,255,.7); line-height: 1.6; max-width: 400px; }
        .left-panel .circles { position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; }
        .left-panel .circle { position: absolute; border-radius: 50%; background: rgba(255,255,255,.06); }
        .left-panel .c1 { width: 400px; height: 400px; top: -100px; right: -100px; }
        .left-panel .c2 { width: 250px; height: 250px; bottom: 30%; left: -50px; }

        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .blob { position: absolute; border-radius: 50%; filter: blur(100px); }
        .blob-1 { width: 400px; height: 400px; top: -200px; right: -200px; background: rgba(14, 165, 233, 0.15); }
        .blob-2 { width: 300px; height: 300px; bottom: -150px; left: -150px; background: rgba(6, 182, 212, 0.1); }

        .register-card {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            border-radius: 1rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; color: white;
            margin: 0 auto 1.75rem;
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
        }

        h2 { color: white; font-weight: 800; text-align: center; letter-spacing: -0.02em; margin-bottom: .5rem; font-size: 1.75rem; }
        .subtitle { color: #94a3b8; text-align: center; margin-bottom: 2.5rem; font-size: .9rem; }

        .form-label { color: #94a3b8; font-weight: 600; font-size: .75rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: .5rem; }

        .form-control {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: .875rem;
            padding: .8rem 1.1rem;
            color: white;
            font-size: .875rem;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            background: rgba(255,255,255,.08);
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
            color: white;
        }

        .form-control::placeholder { color: #475569; }

        .btn-register {
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            border: none;
            border-radius: .875rem;
            padding: .875rem;
            color: white;
            font-weight: 700;
            font-size: .9rem;
            margin-top: 1.5rem;
            transition: all 0.25s ease;
            box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
            color: white;
        }

        .footer-text { text-align: center; margin-top: 2rem; color: #64748b; font-size: .875rem; }
        .footer-text a { color: #0ea5e9; text-decoration: none; font-weight: 700; }

        @media (min-width: 992px) { .left-panel { display: flex; } }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="circles">
        <div class="circle c1"></div>
        <div class="circle c2"></div>
    </div>
    <div class="content">
        <div class="mb-4">
            <div style="width: 52px; height: 52px; background: rgba(255,255,255,.15); border-radius: .875rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="bi bi-people-fill text-white"></i>
            </div>
        </div>
        <h1>Bergabung dengan Komunitas Kreatif</h1>
        <p>Daftar untuk mengakses ruang kerja, studio, dan peralatan kreatif yang tersedia di Smart-Hub.</p>
    </div>
</div>

<div class="right-panel">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="register-card">
        <div class="brand-logo">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <h2>Daftar Member</h2>
        <p class="subtitle">Buat akun untuk memulai</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Sandi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-register w-100">BUAT AKUN</button>

            <div class="footer-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk Disini</a>
            </div>
        </form>
    </div>
</div>

>>>>>>> development
</body>
</html>
