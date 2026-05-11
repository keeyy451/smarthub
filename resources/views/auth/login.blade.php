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
    </div>
</body>
</html>
