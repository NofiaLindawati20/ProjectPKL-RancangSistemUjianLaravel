<?php
// 1. Simulasi Data Guru & Statistik dari Database
$nama_guru = "Ahmad Maulana";

$jam = date('H');
if ($jam >= 5 && $jam < 11) {
    $waktu_sapaan = "Selamat pagi";
} elseif ($jam >= 11 && $jam < 15) {
    $waktu_sapaan = "Selamat siang";
} elseif ($jam >= 15 && $jam < 18) {
    $waktu_sapaan = "Selamat sore";
} else {
    $waktu_sapaan = "Selamat malam";
}

// Mengambil data riil dari Database menggunakan model bawaan Laravel
$countUser  = \App\Models\User::count();
$countKelas = \App\Models\Kelas::count();
$countMapel = \App\Models\Mapel::count();
$countSiswa = \App\Models\User::where('role', 'siswa')->count();

// Ambil data untuk Grafik User (Kelompokkan berdasarkan kolom 'role')
$adminCount    = \App\Models\User::where('role', 'admin')->count();
$guruCount     = \App\Models\User::where('role', 'guru')->count();
$siswaCount    = \App\Models\User::where('role', 'siswa')->count();
$pengawasCount = \App\Models\User::where('role', 'pengawas')->count();

// Ambil semua daftar Nama Kelas untuk Label Grafik
$daftarKelas = \App\Models\Kelas::pluck('nama_kelas')->toArray();
// Membuat array nilai dummy/statis 1 untuk setiap kelas sebagai penanda visual keberadaannya
$jumlahKelas = array_fill(0, count($daftarKelas), 1); 

// Ambil semua daftar Nama Mapel untuk Label Grafik
$daftarMapel = \App\Models\Mapel::pluck('nama_mapel')->toArray();
$jumlahMapel = array_fill(0, count($daftarMapel), 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aplikasi Ujian Online</title>
    <link rel="stylesheet" href="{{ asset('css/style-dashboard-guru.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .chart-section {
            margin-top: 30px;
            background: #ffffff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        .table-header h4 {
            margin: 0 0 20px 0;
            color: #1e293b;
            font-size: 18px;
        }
        .chart-grid {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
        }
        .chart-card {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
        }
        .chart-card h5 {
            margin: 0 0 15px 0;
            color: #475569;
            font-size: 14px;
        }
        .chart-container {
            position: relative;
            width: 100%;
            height: 250px;
        }
        @media (max-width: 768px) {
            .chart-grid {
                grid-template-columns: 1fr;
            }
            .chart-card.full-width {
                grid-column: span 1 !important;
            }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-box">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <span>CBT Admin</span>
        </div>
        
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/admin"> <i class="fa-solid fa-house-chimney"></i><span> Dashboard </span></a>
            </li>
            <li>
                <a href="/admin/user"><i class="fa-regular fa-file-lines"></i><span> Kelola User </span></a>
            </li>
            <li>
                <a href="/admin/datautama"><i class="fa-solid fa-square-poll-vertical"></i><span> Data Utama</span></a>
            </li>
            <li>
                <a href="/admin/registrasi-wajah"><i class="fa-regular fa-user"></i><span> Registrasi Wajah Siswa</span></a>
            </li>
            <li class="menu-logout">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span> Keluar</span></a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <h2>Dashboard Admin</h2>
            </div>
            <div class="header-right">
                <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                <button class="icon-btn"><i class="fa-solid fa-table-cells-large"></i></button>
            </div>
        </header>

        <div class="content-body">
            
            <div class="welcome-box">
                <h3><?php echo $waktu_sapaan; ?>,</h3>
                <h1><?php echo htmlspecialchars($nama_guru); ?> 👋</h1>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total User</span>
                        <i class="fa-solid fa-users icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $countUser; ?></span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Kelas</span>
                        <i class="fa-solid fa-school icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $countKelas; ?></span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Mata Pelajaran</span>
                        <i class="fa-solid fa-book-open icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $countMapel; ?></span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Siswa</span>
                        <i class="fa-solid fa-user-graduate icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $countSiswa; ?></span>
                </div>
            </div>

            <div class="chart-section">
                <div class="table-header">
                    <h4><i class="fa-solid fa-chart-simple" style="color: #0a6634; margin-right: 8px;"></i>Visualisasi Data Real-Time</h4>
                </div>

                <div class="chart-grid">
                    <div class="chart-card">
                        <h5>Komposisi Jenis Pengguna (User)</h5>
                        <div class="chart-container">
                            <canvas id="userChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h5>Inventaris Kelas Tersedia</h5>
                        <div class="chart-container">
                            <canvas id="kelasChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card full-width" style="grid-column: span 2;">
                        <h5>Sebaran Mata Pelajaran Sekolah</h5>
                        <div class="chart-container">
                            <canvas id="mapelChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        
    </main>

    <script>
        // Options global agar chart dapat menyesuaikan tinggi wadahnya secara otomatis
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        };

        // ================= 1. USER PIE CHART =================
        new Chart(document.getElementById('userChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Admin', 'Guru', 'Siswa', 'Pengawas'],
                datasets: [{
                    data: [
                        <?php echo $adminCount; ?>,
                        <?php echo $guruCount; ?>,
                        <?php echo $siswaCount; ?>,
                        <?php echo $pengawasCount; ?>
                    ],
                    backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#F44336'],
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });

        // ================= 2. KELAS BAR CHART =================
        new Chart(document.getElementById('kelasChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($daftarKelas) !!},
                datasets: [{
                    label: 'Status Eksistensi Kelas (Ada)',
                    data: {!! json_encode($jumlahKelas) !!},
                    backgroundColor: '#2196F3',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, max: 2, ticks: { display: false }, grid: { display: false } }
                }
            }
        });

        // ================= 3. MAPEL BAR CHART =================
        new Chart(document.getElementById('mapelChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($daftarMapel) !!},
                datasets: [{
                    label: 'Mata Pelajaran Aktif',
                    data: {!! json_encode($jumlahMapel) !!},
                    backgroundColor: '#4CAF50',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, max: 2, ticks: { display: false }, grid: { display: false } }
                }
            }
        });
    </script>

    
</body>
</html>