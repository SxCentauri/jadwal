<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ketersediaan Dosen - Admin</title>
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
            --available-bg: #d3f9d8;
            --available-color: #2b8a3e;
            --unavailable-bg: #ffe3e3;
            --unavailable-color: #c92a2a;
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
            text-transform: capitalize;
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

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--warning), #f7b239);
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

        .dosen-name {
            color: var(--primary);
            font-weight: 700;
        }

        /* Grid Ketersediaan */
        .availability-grid {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            table-layout: fixed;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .availability-grid th,
        .availability-grid td {
            border: 1px solid var(--border);
            padding: 0;
            text-align: center;
            vertical-align: middle;
            height: 80px;
        }

        .availability-grid th {
            background-color: var(--gray-light);
            font-weight: 600;
            font-size: 14px;
            padding: 12px;
            color: var(--dark);
        }

        .time-slot-header {
            font-size: 12px;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            padding: 8px;
            width: 40px;
            font-weight: 500;
        }

        /* Slot Ketersediaan */
        .slot {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 12px;
            font-weight: 500;
            box-sizing: border-box;
            padding: 8px;
            user-select: none;
            border-radius: 0;
        }

        .slot-available {
            background-color: var(--available-bg);
            color: var(--available-color);
        }

        .slot-unavailable {
            background-color: var(--unavailable-bg);
            color: var(--unavailable-color);
            text-decoration: line-through;
        }

        .slot:hover {
            transform: scale(0.95);
            box-shadow: inset 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        /* Checkbox tersembunyi */
        .slot-checkbox {
            display: none;
        }

        /* Keterangan */
        .legend {
            display: flex;
            gap: 24px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--dark);
        }

        .legend-box {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            margin-right: 10px;
            border: 2px solid var(--border);
        }

        /* Form Actions */
        .form-actions {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
            gap: 16px;
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

        .btn-secondary {
            background: var(--gray-light);
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--border);
            transform: translateY(-2px);
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

        /* Alert */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border-color: rgba(16, 185, 129, 0.2);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border-color: rgba(239, 68, 68, 0.2);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 260px;
            }
            
            .availability-grid {
                font-size: 11px;
            }
            
            .slot {
                font-size: 11px;
                padding: 4px;
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

            .availability-grid {
                font-size: 10px;
            }
            
            .time-slot-header {
                writing-mode: horizontal-tb;
                transform: none;
                padding: 4px;
                width: auto;
            }
            
            .slot {
                height: 60px;
                font-size: 10px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .legend {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Form Logout Tersembunyi -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <!-- Layout Dashboard -->
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
                    <a href="{{ route('admin.dosen.index') }}" class="menu-item">
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
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="menu-text">Ruangan</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-user-graduate"></i>
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
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="menu-text">Jadwal Kuliah</div>
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
                    <div class="section-title">Ketersediaan</div>
                </div>
                <li>
                    <a href="{{ route('admin.ketersediaan.index') }}" class="menu-item active">
                        <div class="menu-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <div class="menu-text">Ketersediaan Dosen</div>
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
                    <i class="fas fa-user-clock"></i>
                    Edit Ketersediaan Dosen
                </div>
                <div class="welcome-text">Kelola jadwal ketersediaan mengajar dosen</div>
            </div>

            <!-- Content Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-edit"></i>
                        Edit Ketersediaan: <span class="dosen-name">{{ $dosen->name }}</span>
                    </h2>
                </div>

                <p style="margin-bottom: 1.5rem; color: var(--gray); font-size: 14px;">
                    Klik pada slot waktu untuk menandai sebagai "Tidak Tersedia" (Merah). Slot yang "Tersedia" (Hijau) adalah slot di mana dosen BISA mengajar.
                </p>

                <form action="{{ route('admin.ketersediaan.update', $dosen->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="table-responsive">
                        <table class="availability-grid">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    @foreach ($timeSlots as $time)
                                        <th class="time-slot-header">{{ $time }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($days as $day)
                                <tr>
                                    <th>{{ $day }}</th>
                                    @foreach ($timeSlots as $time)
                                        @php
                                            $slotId = $day . '_' . $time;
                                            $isUnavailable = in_array($slotId, $unavailableSlots);
                                        @endphp
                                        <td class="slot-cell" data-slot-id="{{ $slotId }}">
                                            <label for="{{ $slotId }}" class="slot {{ $isUnavailable ? 'slot-unavailable' : 'slot-available' }}">
                                                <input type="checkbox" 
                                                       name="unavailable_slots[]" 
                                                       id="{{ $slotId }}" 
                                                       value="{{ $slotId }}" 
                                                       class="slot-checkbox"
                                                       {{ $isUnavailable ? 'checked' : '' }}>
                                                
                                                {{ $isUnavailable ? 'Tidak Tersedia' : 'Tersedia' }}
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Keterangan -->
                    <div class="legend">
                        <div class="legend-item">
                            <div class="legend-box" style="background-color: var(--available-bg);"></div>
                            <span>Tersedia (Bisa Mengajar)</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-box" style="background-color: var(--unavailable-bg);"></div>
                            <span>Tidak Tersedia (Blokir)</span>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="form-actions">
                        <a href="{{ route('admin.ketersediaan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Ketersediaan
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Logika untuk toggle klik grid
        document.querySelectorAll('.slot-cell').forEach(cell => {
            cell.addEventListener('click', function(e) {
                if (e.target.type === 'checkbox') return;

                const label = this.querySelector('.slot');
                const checkbox = this.querySelector('.slot-checkbox');
                
                checkbox.checked = !checkbox.checked;

                if (checkbox.checked) {
                    label.classList.remove('slot-available');
                    label.classList.add('slot-unavailable');
                    label.childNodes[2].nodeValue = 'Tidak Tersedia';
                } else {
                    label.classList.remove('slot-unavailable');
                    label.classList.add('slot-available');
                    label.childNodes[2].nodeValue = 'Tersedia';
                }
            });
        });
    </script>
</body>
</html>