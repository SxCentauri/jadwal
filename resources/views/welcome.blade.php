<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjadwalan Kuliah Dinamis</title>
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
            flex-direction: column;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        header {
            padding: 24px 0;
            border-bottom: 1px solid #e2e8f0;
            background-color: white;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #3b82f6;
        }

        .nav-links {
            display: flex;
            gap: 24px;
        }

        .nav-links a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #3b82f6;
        }

        .nav-links a.active {
            color: #3b82f6;
        }

        .auth-buttons {
            display: flex;
            gap: 12px;
        }

        .login-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-btn:hover {
            background-color: #2563eb;
        }

        .register-btn {
            background-color: transparent;
            color: #3b82f6;
            border: 1px solid #3b82f6;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .register-btn:hover {
            background-color: #3b82f6;
            color: white;
        }

        .hero {
            padding: 80px 0;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-text {
            max-width: 500px;
        }

        .hero-text h1 {
            font-size: 48px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 24px;
            color: #1e293b;
        }

        .hero-text h1 span {
            color: #3b82f6;
        }

        .hero-text p {
            font-size: 18px;
            color: #64748b;
            margin-bottom: 32px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 32px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            background-color: #dbeafe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
        }

        .feature-text {
            color: #475569;
        }

        .cta-button {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            display: inline-block;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #2563eb;
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-preview {
            width: 100%;
            max-width: 500px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .dashboard-header {
            background-color: #3b82f6;
            color: white;
            padding: 16px 20px;
            font-weight: 600;
        }

        .dashboard-content {
            padding: 20px;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
        }

        .schedule-day {
            text-align: center;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
        }

        .schedule-slot {
            height: 60px;
            background-color: #f1f5f9;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #64748b;
            text-align: center;
            padding: 4px;
        }

        .schedule-slot.filled {
            background-color: #dbeafe;
            color: #1e40af;
            font-weight: 500;
        }

        footer {
            background-color: #1e293b;
            color: #cbd5e1;
            padding: 40px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
        }

        .footer-section h3 {
            color: white;
            margin-bottom: 16px;
            font-size: 18px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: white;
        }

        .contact-info {
            color: #94a3b8;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .nav-links {
                display: none;
            }

            .auth-buttons {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">SisPen</div>
                <nav class="nav-links">
                </nav>
                <div class="auth-buttons">
                    <button class="register-btn" id="registerBtn">Daftar</button>
                    <button class="login-btn" id="loginBtn">Masuk</button>
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Sistem Penjadwalan <span>Kuliah Dinamis</span></h1>
                    <p>Optimalkan jadwal perkuliahan Anda dengan teknologi kecerdasan buatan yang canggih. Hemat waktu, kurangi konflik, dan tingkatkan efisiensi proses akademik di Program Studi Informatika.</p>

                    <div class="features">
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Penjadwalan otomatis dengan AI</div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Minimalkan konflik jadwal</div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Optimalkan penggunaan ruangan</div>
                        </div>
                    </div>

                    <button class="cta-button" id="ctaBtn">Masuk</button>
                </div>

                <div class="hero-visual">
                    <div class="dashboard-preview">
                        <div class="dashboard-header">Jadwal Perkuliahan - Program Studi Informatika</div>
                        <div class="dashboard-content">
                            <div class="schedule-grid">
                                <div class="schedule-day">Senin</div>
                                <div class="schedule-day">Selasa</div>
                                <div class="schedule-day">Rabu</div>
                                <div class="schedule-day">Kamis</div>
                                <div class="schedule-day">Jumat</div>

                                <div class="schedule-slot">07:00-08:40</div>
                                <div class="schedule-slot filled">Basis Data</div>
                                <div class="schedule-slot">07:00-08:40</div>
                                <div class="schedule-slot">07:00-08:40</div>
                                <div class="schedule-slot filled">Pemrograman Web</div>

                                <div class="schedule-slot filled">Kecerdasan Buatan</div>
                                <div class="schedule-slot">08:50-10:30</div>
                                <div class="schedule-slot filled">Jaringan Komputer</div>
                                <div class="schedule-slot">08:50-10:30</div>
                                <div class="schedule-slot">08:50-10:30</div>

                                <div class="schedule-slot">10:40-12:20</div>
                                <div class="schedule-slot filled">Algoritma</div>
                                <div class="schedule-slot">10:40-12:20</div>
                                <div class="schedule-slot filled">Sistem Operasi</div>
                                <div class="schedule-slot">10:40-12:20</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Sistem Penjadwalan Kuliah</h3>
                    <p>Platform canggih untuk mengoptimalkan jadwal perkuliahan dengan bantuan kecerdasan buatan.</p>
                </div>

                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#">Beranda</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Kontak</h3>
                    <ul class="footer-links contact-info">
                        <li>Email: ahmad61539@gmail.com</li>
                        <li>Telepon: 089529615638</li>
                        <li>Alamat: Jl. W.R Supratman<br>
                            Kandang Limun<br>
                            Bengkulu 38122<br>
                            Sumatera – INDONESIA</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                &copy; 2025 Sistem Penjadwalan Kuliah Dinamis. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        function handleLogin() {
            window.location.href = '/login';
        }

        function handleRegister() {
            window.location.href = '/register';
        }

        document.getElementById('loginBtn').addEventListener('click', handleLogin);
        document.getElementById('ctaBtn').addEventListener('click', handleLogin);

        document.getElementById('registerBtn').addEventListener('click', handleRegister);
    </script>
</body>
</html>
