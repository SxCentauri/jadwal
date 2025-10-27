<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Sistem Penjadwalan Kuliah Dinamis</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 400px;
        }

        .register-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: #3b82f6;
        }

        .register-title {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
            text-align: center;
        }

        .register-subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .login-link {
            color: #3b82f6;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .login-link:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .register-button {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            font-size: 16px;
        }

        .register-button:hover {
            background-color: #2563eb;
        }

        .back-button {
            background-color: transparent;
            color: #64748b;
            border: 1px solid #d1d5db;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }

        .back-button:hover {
            background-color: #f8fafc;
            color: #374151;
            border-color: #9ca3af;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 30px 20px;
            }

            .form-footer {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .login-link {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <div class="logo-text">SisPen</div>
            </div>

            <h1 class="register-title">Buat Akun Baru</h1>
            <p class="register-subtitle">Daftar untuk mulai menggunakan sistem penjadwalan kuliah</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    <div class="error-message">
                        <!-- Pesan error nama akan ditampilkan di sini -->
                    </div>
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    <div class="error-message">
                        <!-- Pesan error email akan ditampilkan di sini -->
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    <div class="error-message">
                        <!-- Pesan error password akan ditampilkan di sini -->
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <div class="error-message">
                        <!-- Pesan error konfirmasi password akan ditampilkan di sini -->
                    </div>
                </div>

                <div class="form-footer">
                    <a class="login-link" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>

                    <button type="submit" class="register-button">
                        Daftar
                    </button>
                </div>
            </form>

            <!-- Tombol Kembali ke Beranda -->
            <a href="{{ url('/') }}" class="back-button">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
