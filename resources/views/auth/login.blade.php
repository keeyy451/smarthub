<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart-Hub Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%);
            padding: 1rem;
        }
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        .login-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 25px 50px rgba(0,0,0,.25);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            padding: 2rem;
            text-align: center;
            color: #fff;
        }
        .login-header .brand-icon {
            width: 60px; height: 60px;
            background: rgba(255,255,255,.2);
            border-radius: .75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: .75rem;
        }
        .login-header h3 {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: .25rem;
        }
        .login-header p {
            opacity: .8;
            font-size: .85rem;
            margin: 0;
        }
        .login-body {
            padding: 2rem;
        }
        .form-floating > label {
            color: #94a3b8;
        }
        .form-floating > .form-control:focus ~ label {
            color: #4f46e5;
        }
        .form-control:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(79,70,229,.15);
        }
        .btn-login {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
            padding: .75rem;
            font-weight: 600;
            font-size: .95rem;
            border-radius: .5rem;
            transition: opacity .2s;
        }
        .btn-login:hover {
            opacity: .9;
            background: linear-gradient(135deg, #4338ca, #6d28d9);
        }
        .login-footer {
            text-align: center;
            padding: 0 2rem 1.5rem;
            font-size: .8rem;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="brand-icon">
                    <i class="bi bi-cpu"></i>
                </div>
                <h3>Smart-Hub</h3>
                <p>Management System</p>
            </div>
            <div class="login-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert" style="font-size:.85rem">
                        {{ session('status') }}
                    </div>
                @endif
=======
<<<<<<< Updated upstream
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
>>>>>>> development

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <label for="email"><i class="bi bi-envelope me-1"></i> Email</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-1"></i> Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember" style="font-size:.85rem; color:#64748b;">
                            Ingat saya
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login w-100">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                    </button>
                </form>
            </div>
            <div class="login-footer">
                &copy; {{ date('Y') }} Smart-Hub Management System
            </div>
        </div>
<<<<<<< HEAD
    </div>
</body>
</html>
=======

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart-Hub Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Outfit', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            overflow: hidden;
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

        .left-panel .content { position: relative; z-index: 1; color: white; }
        .left-panel .content h1 { font-weight: 800; font-size: 3rem; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem; }
        .left-panel .content p { font-size: 1.1rem; color: rgba(255,255,255,.7); line-height: 1.6; max-width: 400px; }
        .left-panel .circles { position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; }
        .left-panel .circle { position: absolute; border-radius: 50%; background: rgba(255,255,255,.06); }
        .left-panel .c1 { width: 400px; height: 400px; top: -100px; right: -100px; }
        .left-panel .c2 { width: 250px; height: 250px; bottom: 30%; left: -50px; }
        .left-panel .c3 { width: 150px; height: 150px; top: 40%; right: 20%; background: rgba(255,255,255,.04); }

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
        .blob-2 { width: 300px; height: 300px; bottom: -150px; right: -150px; background: rgba(6, 182, 212, 0.15); }

        .login-card {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            border-radius: 1.25rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem; color: white;
            margin: 0 auto 2rem;
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
        }

        h2 { color: white; font-weight: 800; text-align: center; letter-spacing: -0.02em; margin-bottom: .5rem; }
        .subtitle { color: #94a3b8; text-align: center; margin-bottom: 2.5rem; font-size: .95rem; }

        .form-label { color: #94a3b8; font-weight: 600; font-size: .75rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: .5rem; }

        .form-control {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: .875rem;
            padding: .875rem 1.25rem;
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

        .form-control::placeholder { color: #475569; }

        .btn-login {
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
            letter-spacing: 0.02em;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
            color: white;
        }

        .footer-text { text-align: center; margin-top: 2rem; color: #64748b; font-size: .875rem; }
        .footer-text a { color: #0ea5e9; text-decoration: none; font-weight: 700; }
        .footer-text a:hover { text-decoration: underline; }

        .form-check-input { background-color: rgba(255,255,255,.1); border-color: rgba(255,255,255,.2); }
        .form-check-input:checked { background-color: #0ea5e9; border-color: #0ea5e9; }
        .form-check-label { color: #94a3b8; font-size: .85rem; }

        @media (min-width: 992px) { .left-panel { display: flex; } }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="circles">
        <div class="circle c1"></div>
        <div class="circle c2"></div>
        <div class="circle c3"></div>
    </div>
    <div class="content">
        <div class="mb-4">
            <div style="width: 52px; height: 52px; background: rgba(255,255,255,.15); border-radius: .875rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="bi bi-cpu text-white"></i>
            </div>
        </div>
        <h1>Kelola Hub Anda Lebih Cerdas</h1>
        <p>Sistem terintegrasi untuk pemesanan ruangan dan manajemen peminjaman peralatan studio secara real-time.</p>
        <div class="d-flex gap-3 mt-4">
            <span class="badge px-3 py-2" style="background: rgba(255,255,255,.15); font-size: .75rem; font-weight: 600;">Laravel 13</span>
            <span class="badge px-3 py-2" style="background: rgba(255,255,255,.15); font-size: .75rem; font-weight: 600;">REST API</span>
            <span class="badge px-3 py-2" style="background: rgba(255,255,255,.15); font-size: .75rem; font-weight: 600;">Token Auth</span>
        </div>
    </div>
</div>

<div class="right-panel">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="login-card">
        <div class="brand-logo">
            <i class="bi bi-cpu"></i>
        </div>
        <h2>Selamat Datang</h2>
        <p class="subtitle">Masuk ke akun Smart-Hub Anda</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="small" href="{{ route('password.request') }}" style="color: #64748b; text-decoration: none;">Lupa sandi?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-login w-100">MASUK</button>

            <div class="footer-text">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
>>>>>>> Stashed changes
>>>>>>> development
