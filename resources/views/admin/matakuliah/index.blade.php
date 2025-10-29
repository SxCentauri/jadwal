<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Mata Kuliah</title>
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

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        /* Alerts */
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

        /* Table */
        .table-responsive {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .data-table th {
            background: var(--gray-light);
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 1px solid var(--border);
        }

        .data-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            color: var(--dark);
        }

        .data-table tbody tr {
            transition: all 0.3s ease;
        }

        .data-table tbody tr:hover {
            background: var(--gray-light);
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-edit {
            background: var(--warning);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit:hover {
            background: #eab308;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: var(--danger);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        /* Pagination */
        .pagination-container {
            margin-top: 24px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 8px;
            list-style: none;
            align-items: center;
        }

        .pagination li a,
        .pagination li span {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid var(--border);
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 40px;
        }

        .pagination li a:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination li.active span {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination li.disabled span {
            color: var(--gray);
            background: var(--gray-light);
            border-color: var(--border);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            color: var(--border);
        }

        /* Custom Confirmation Modal */
        .confirmation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .confirmation-modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 90%;
            text-align: center;
        }

        .modal-icon {
            font-size: 48px;
            color: var(--danger);
            margin-bottom: 16px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .modal-message {
            color: var(--gray);
            margin-bottom: 24px;
            line-height: 1.5;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-cancel {
            background: var(--gray-light);
            color: var(--dark);
            border: 2px solid var(--border);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: var(--border);
        }

        .btn-confirm {
            background: var(--danger);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-confirm:hover {
            background: #dc2626;
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

            .action-buttons {
                flex-direction: column;
                gap: 6px;
            }

            .btn-edit,
            .btn-delete {
                width: 100%;
                justify-content: center;
            }

            .modal-actions {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-confirm {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
        @csrf
    </form>

    <!-- Confirmation Modal -->
    <div class="confirmation-modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="modal-title">Konfirmasi Penghapusan</h3>
            <p class="modal-message" id="modalMessage">Apakah Anda yakin ingin menghapus data mata kuliah ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" id="cancelDelete">Batal</button>
                <button type="button" class="btn-confirm" id="confirmDelete">Ya, Hapus</button>
            </div>
        </div>
    </div>

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
                    <a href="{{ route('admin.dosen.index') }}" class="menu-item">
                        <div class="menu-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="menu-text">Dosen</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.matakuliah.index') }}" class="menu-item active">
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
                    <i class="fas fa-book"></i>
                    Manajemen Mata Kuliah
                </div>
                <div class="welcome-text">Kelola data mata kuliah dan informasi pembelajaran</div>
            </div>

            <!-- Pesan Sukses/Error -->
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Content Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-list"></i>
                        Daftar Mata Kuliah
                    </h2>
                    <a href="{{ route('admin.matakuliah.create') }}" class="btn-primary">
                        <i class="fas fa-plus"></i>
                        Tambah Mata Kuliah
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mataKuliahs as $matkul)
                                <tr>
                                    <td>{{ $matkul->nama_mata_kuliah }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.matakuliah.edit', $matkul->id) }}" class="btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn-delete" title="Hapus"
                                            onclick="showDeleteConfirmation('{{ $matkul->nama_mata_kuliah }}', '{{ route('admin.matakuliah.destroy', $matkul->id) }}')">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="empty-state">
                                        <i class="fas fa-book"></i>
                                        <div>Belum ada data mata kuliah</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    {{ $mataKuliahs->links() }}
                </div>
            </div>
        </main>
    </div>

    <script>
        let currentDeleteFormUrl = null;

        function showDeleteConfirmation(matkulName, deleteUrl) {
            const modal = document.getElementById('deleteModal');
            const modalMessage = document.getElementById('modalMessage');

            modalMessage.textContent = `Apakah Anda yakin ingin menghapus mata kuliah "${matkulName}"? Tindakan ini tidak dapat dibatalkan.`;
            currentDeleteFormUrl = deleteUrl;
            modal.classList.add('active');
        }

        function hideDeleteConfirmation() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('active');
            currentDeleteFormUrl = null;
        }

        function confirmDelete() {
            if (currentDeleteFormUrl) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = currentDeleteFormUrl;

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        }

        document.getElementById('cancelDelete').addEventListener('click', hideDeleteConfirmation);
        document.getElementById('confirmDelete').addEventListener('click', confirmDelete);

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteConfirmation();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideDeleteConfirmation();
            }
        });
    </script>
</body>
</html>
