<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Penjadwalan Kuliah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --gray-light: #f1f5f9;
            --border: #e2e8f0;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Main Layout */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0;
            box-shadow: 2px 0 20px rgba(0,0,0,0.1);
            position: relative;
        }

        .sidebar-header {
            padding: 30px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .logo i {
            font-size: 28px;
            color: white;
        }

        .user-info {
            background: rgba(255,255,255,0.1);
            padding: 16px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .user-name {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .user-details {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 12px;
        }

        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            justify-content: center;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-1px);
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .menu-section {
            padding: 0 24px;
            margin-bottom: 8px;
        }

        .section-title {
            font-size: 12px;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            margin-top: 20px;
        }

        .menu-item {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 4px 16px;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .menu-item.active {
            background: rgba(255,255,255,0.15);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .menu-text {
            flex: 1;
            font-size: 14px;
        }

        .menu-badge {
            background: var(--danger);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
        }

        .menu-badge.new {
            background: var(--success);
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 24px;
            border-top: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
        }

        .system-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: rgba(255,255,255,0.8);
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--success);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            background: var(--light);
            overflow-y: auto;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-subtitle {
            color: var(--gray);
            font-size: 16px;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 24px;
            border-radius: 16px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .welcome-text {
            opacity: 0.9;
            font-size: 14px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
        }

        /* Content Section */
        .content-section {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border);
            margin-bottom: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .view-all:hover {
            gap: 8px;
            text-decoration: underline;
        }

        /* Activity List */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: var(--gray-light);
            margin: 0 -20px;
            padding: 16px 20px;
            border-radius: 8px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--primary);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            color: var(--dark);
            margin-bottom: 4px;
            font-weight: 500;
        }

        .activity-time {
            font-size: 13px;
            color: var(--gray);
        }

        /* Quick Actions */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
        }

        .action-btn {
            background: white;
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .action-btn:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 12px;
            font-size: 20px;
        }

        .action-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .action-desc {
            font-size: 12px;
            color: var(--gray);
            margin-top: 6px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 260px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .main-content {
                padding: 20px;
            }

            .sidebar-footer {
                position: relative;
            }

            .activity-item:hover {
                margin: 0 -10px;
                padding: 16px 10px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
        @csrf
    </form>

    <!-- Main Layout -->
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-calendar-alt"></i>
                    <span>SisPen Admin</span>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-details">{{ ucfirst(Auth::user()->role) }}</div>
                    <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Keluar
                    </button>
                </div>
            </div>

            <ul class="sidebar-menu">
                <div class="menu-section">
                    <div class="section-title">Menu Utama</div>
                </div>
                <li>
                    <a href="#" class="menu-item active">
                        <div class="menu-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                        <div class="menu-badge">5</div>
                    </a>
                </li>

                <div class="menu-section">
                    <div class="section-title">Manajemen Data</div>
                </div>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="menu-text">Dosen</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="menu-text">Mata Kuliah</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="menu-text">Ruangan</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="menu-text">Mahasiswa</div>
                    </a>
                </li>

                <div class="menu-section">
                    <div class="section-title">Penjadwalan</div>
                </div>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="menu-text">Pra-Penjadwalan</div>
                        <div class="menu-badge new">NEW</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="menu-text">Jadwal Kuliah</div>
                        <div class="menu-badge">12</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="menu-text">Generate Jadwal</div>
                    </a>
                </li>

                <div class="menu-section">
                    <div class="section-title">Lainnya</div>
                </div>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="menu-text">Laporan</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="menu-text">Pengaturan</div>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="system-status">
                    <div class="status-indicator">
                        <div class="status-dot"></div>
                        <span>Sistem Online</span>
                    </div>
                    <span>v2.1.0</span>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-title">Selamat Datang, {{ Auth::user()->name }}! 👋</div>
                <div class="welcome-text" id="current-time">Selasa, 12 Desember 2023 - 09:30</div>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">1,248</div>
                    <div class="stat-label">Total Mahasiswa</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">48</div>
                    <div class="stat-label">Total Dosen</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">86</div>
                    <div class="stat-label">Mata Kuliah</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Konflik Jadwal</div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-history"></i>
                        Aktivitas Terbaru
                    </h2>
                    <a href="#" class="view-all">
                        Lihat Semua
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Jadwal baru ditambahkan untuk semester ganjil 2024</div>
                            <div class="activity-time">2 jam yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Dr. Ahmad ditambahkan sebagai dosen pengampu</div>
                            <div class="activity-time">5 jam yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Konflik jadwal terdeteksi di ruangan A101</div>
                            <div class="activity-time">1 hari yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Mata kuliah Kecerdasan Buatan diperbarui</div>
                            <div class="activity-time">2 hari yang lalu</div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Quick Actions -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-bolt"></i>
                        Aksi Cepat
                    </h2>
                </div>
                <div class="actions-grid">
                    <a href="#" class="action-btn">
                        <div class="action-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="action-label">Kelola Pra-Penjadwalan</div>
                        <div class="action-desc">Kelola preferensi jadwal dosen</div>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="action-label">Tambah Jadwal</div>
                        <div class="action-desc">Buat jadwal kuliah baru</div>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="action-label">Kelola Dosen</div>
                        <div class="action-desc">Kelola data dosen</div>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="action-label">Laporan</div>
                        <div class="action-desc">Lihat laporan sistem</div>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Fungsi untuk toggle menu aktif
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Update waktu real-time
        function updateCurrentTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('current-time').textContent =
                now.toLocaleDateString('id-ID', options);
        }

        // Update waktu setiap menit
        setInterval(updateCurrentTime, 60000);
        updateCurrentTime();

        // Update waktu aktivitas
        function updateActivityTime() {
            const now = new Date();
            const timeElement = document.querySelector('.activity-time');
            if (timeElement) {
                document.querySelectorAll('.activity-time')[0].textContent =
                    now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + ' yang lalu';
            }
        }

        setInterval(updateActivityTime, 60000);
        updateActivityTime();
    </script>
</body>
</html>
