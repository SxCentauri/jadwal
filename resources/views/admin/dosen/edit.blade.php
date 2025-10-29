<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Dosen</title>
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
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome-text {
            opacity: 0.9;
            font-size: 14px;
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

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-text {
            font-size: 12px;
            color: var(--gray);
            margin-top: 6px;
        }

        /* Validation Error */
        .invalid-feedback {
            color: var(--danger);
            font-size: 12px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        /* Form Buttons */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: var(--gray-light);
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--border);
            transform: translateY(-2px);
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

            .main-content {
                padding: 20px;
            }

            .sidebar-footer {
                position: relative;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
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
                    <a href="{{ route('dashboard') }}" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                    </a>
                </li>

                <div class="menu-section">
                    <div class="section-title">Manajemen Data</div>
                </div>
                <li>
                    <a href="{{ route('admin.dosen.index') }}" class="menu-item active">
                        <div class="menu-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="menu-text">Dosen</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.matakuliah.index') }}" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="menu-text">Mata Kuliah</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penugasan.index') }}" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="menu-text">Penugasan Mengajar</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ruangan.index') }}" class="menu-item">
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
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-title">
                    <i class="fas fa-edit"></i>
                    Edit Data Dosen
                </div>
                <div class="welcome-text">Perbarui informasi dosen dan data pengajar</div>
            </div>

            <!-- Form Container -->
            <div class="form-container">
                <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Nama Dosen -->
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $dosen->name) }}"
                               required>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Dosen -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $dosen->email) }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Baru -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        <p class="form-text">Kosongkan jika tidak ingin mengubah password.</p>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               class="form-control">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
