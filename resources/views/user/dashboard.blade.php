<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Sistem Penjadwalan Kuliah</title>
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

        /* Today Schedule */
        .today-schedule {
            display: grid;
            gap: 12px;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            background-color: #f8fafc;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
            transition: all 0.3s ease;
        }

        .schedule-item:hover {
            background-color: #e0f2fe;
            transform: translateX(5px);
        }

        .schedule-time {
            font-weight: 600;
            color: #1e293b;
            min-width: 100px;
        }

        .schedule-details {
            flex: 1;
        }

        .schedule-course {
            font-weight: 500;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .schedule-info {
            font-size: 14px;
            color: #64748b;
            display: flex;
            gap: 16px;
        }

        .schedule-now {
            background-color: #10b981;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        /* Jadwal Table */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
        }

        .schedule-table th {
            background-color: #f8fafc;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px solid #e2e8f0;
        }

        .schedule-table td {
            padding: 12px 16px;
            border-bottom: 1px solid #f1f5f9;
        }

        .schedule-table tr:hover {
            background-color: #f8fafc;
        }

        .course-badge {
            background-color: #dbeafe;
            color: #1e40af;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .room-badge {
            background-color: #f3f4f6;
            color: #374151;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
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

            .schedule-info {
                flex-direction: column;
                gap: 4px;
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
                    <i class="fas fa-user-graduate"></i>
                    <span>SisPen Mahasiswa</span>
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
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="menu-text">Pilih Mata Kuliah</div>
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
                    <div class="stat-value">6</div>
                    <div class="stat-label">Mata Kuliah</div>
                </div>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-calendar-day"></i>
                        Jadwal Kuliah Hari Ini
                    </h2>
                    <a href="#" class="view-all">
                        Lihat Semua Jadwal
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <div class="today-schedule">
                    <div class="schedule-item">
                        <div class="schedule-time">07:00 - 08:40</div>
                        <div class="schedule-details">
                            <div class="schedule-course">Kecerdasan Buatan</div>
                            <div class="schedule-info">
                                <span>Dr. Ahmad, M.Kom.</span>
                                <span>Ruang A101</span>
                            </div>
                        </div>
                        <div class="schedule-now">SEDANG BERLANGSUNG</div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">10:40 - 12:20</div>
                        <div class="schedule-details">
                            <div class="schedule-course">Pemrograman Web</div>
                            <div class="schedule-info">
                                <span>Dr. Siti, M.T.</span>
                                <span>Lab. Komputer 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">13:30 - 15:10</div>
                        <div class="schedule-details">
                            <div class="schedule-course">Basis Data Lanjut</div>
                            <div class="schedule-info">
                                <span>Prof. Budi, M.Sc.</span>
                                <span>Ruang B205</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Mingguan -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-calendar-week"></i>
                        Jadwal Minggu Ini
                    </h2>
                    <a href="#" class="view-all">
                        Lihat Kalender Lengkap
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Senin</td>
                                <td>07:00 - 08:40</td>
                                <td><span class="course-badge">Kecerdasan Buatan</span></td>
                                <td>Dr. Ahmad, M.Kom.</td>
                                <td><span class="room-badge">A101</span></td>
                            </tr>
                            <tr>
                                <td>Selasa</td>
                                <td>08:50 - 10:30</td>
                                <td><span class="course-badge">Jaringan Komputer</span></td>
                                <td>Dr. Rina, M.T.</td>
                                <td><span class="room-badge">B102</span></td>
                            </tr>
                            <tr>
                                <td>Rabu</td>
                                <td>10:40 - 12:20</td>
                                <td><span class="course-badge">Pemrograman Web</span></td>
                                <td>Dr. Siti, M.T.</td>
                                <td><span class="room-badge">Lab. Komputer 2</span></td>
                            </tr>
                            <tr>
                                <td>Kamis</td>
                                <td>13:30 - 15:10</td>
                                <td><span class="course-badge">Basis Data Lanjut</span></td>
                                <td>Prof. Budi, M.Sc.</td>
                                <td><span class="room-badge">B205</span></td>
                            </tr>
                            <tr>
                                <td>Jumat</td>
                                <td>15:20 - 17:00</td>
                                <td><span class="course-badge">Machine Learning</span></td>
                                <td>Dr. Ahmad, M.Kom.</td>
                                <td><span class="room-badge">A201</span></td>
                            </tr>
                        </tbody>
                    </table>
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

        // Highlight jadwal yang sedang berlangsung
        function highlightCurrentSchedule() {
            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();
            const currentTime = currentHour * 60 + currentMinute;

            document.querySelectorAll('.schedule-item').forEach(item => {
                const timeText = item.querySelector('.schedule-time').textContent;
                const [startTime, endTime] = timeText.split(' - ');

                const start = convertTimeToMinutes(startTime);
                const end = convertTimeToMinutes(endTime);

                if (currentTime >= start && currentTime <= end) {
                    item.style.borderLeftColor = '#10b981';
                    item.style.backgroundColor = '#f0fdf4';
                }
            });
        }

        function convertTimeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        highlightCurrentSchedule();
        setInterval(highlightCurrentSchedule, 60000);
    </script>
</body>
</html>
