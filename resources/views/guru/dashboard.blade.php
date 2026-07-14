<?php
// 1. Simulasi Data Guru & Statistik dari Database
$nama_guru = "Ahmad Maulana";
$waktu_sapaan = "Selamat pagi"; // Bisa diganti dinamis berdasarkan jam sistem server

$statistik = [
    "ujian_dibuat" => 12,
    "ujian_aktif"  => 5,
    "ujian_selesai"=> 8,
    "total_siswa"  => 120
];

// 2. Simulasi Data Tabel Ujian Terbaru
$ujian_terbaru = [
    [
        "mapel" => "Matematika",
        "jenis" => "Ulangan Harian",
        "tanggal" => "20 Mei 2024",
        "status" => "Aktif",
        "class_status" => "status-active"
    ],
    [
        "mapel" => "Bahasa Indonesia",
        "jenis" => "Ulangan Harian",
        "tanggal" => "21 Mei 2024",
        "status" => "Aktif",
        "class_status" => "status-active"
    ],
    [
        "mapel" => "IPA",
        "jenis" => "Ulangan Harian",
        "tanggal" => "22 Mei 2024",
        "status" => "Aktif",
        "class_status" => "status-active"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Aplikasi Ujian Online</title>
    <link rel="stylesheet" href="{{ asset('css/style-dashboard-guru.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-box">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <span>E-Exam</span>
        </div>
        
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/guru">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span> </a>
            </li>
            <li>
                <a href="/guru/datasoal">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Bank Soal</span> </a>
            </li>
            <li>
                <a href="/guru/penilaian">
                    <i class="fa-solid fa-star"></i>
                    <span>Penilaian</span> </a>
            </li>
            <li>
                <a href="/guru/rekap-nilai">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Rekap Nilai</span> </a>
            </li>
            <li>
                <a href="/guru/analisissiswa">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Analisis Siswa</span> </a>
            </li>
            <li>
                <a href="/guru/profil">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil</span> </a>
            </li>
            
            <li class="menu-logout">
                <a href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Keluar</span> </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <h2>Dashboard Guru</h2>
            </div>
            <div class="header-right">
                <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                <button class="icon-btn"><i class="fa-solid fa-grid-2"></i><i class="fa-solid fa-table-cells-large"></i></button>
            </div>
        </header>

        <div class="content-body">
            
            <div class="welcome-box">
                <h3><?php echo $waktu_sapaan; ?>,</h3>
                <h1><?php echo htmlspecialchars($nama_guru); ?> 👋</h1>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                    <span class="stats-label">Ujian Dibuat</span>
                    <span class="stats-number"><?php echo $statistik['ujian_dibuat']; ?></span>
                </div>
                <div class="stats-card">
                    <span class="stats-label">Ujian Aktif</span>
                    <span class="stats-number"><?php echo $statistik['ujian_aktif']; ?></span>
                </div>
                <div class="stats-card">
                    <span class="stats-label">Ujian Selesai</span>
                    <span class="stats-number"><?php echo $statistik['ujian_selesai']; ?></span>
                </div>
                <div class="stats-card">
                    <span class="stats-label">Siswa</span>
                    <span class="stats-number"><?php echo $statistik['total_siswa']; ?></span>
                </div>
            </div>

            <div class="table-section">
                <div class="table-header">
                    <h4>Ujian Terbaru</h4>
                    <a href="#" class="btn-view-all">Lihat Semua <i class="fa-solid fa-angle-right"></i></a>
                </div>

                <div class="table-responsive">
                    <table class="exam-table">
                        <tbody>
                            <?php foreach ($ujian_terbaru as $ujian) : ?>
                            <tr>
                                <td class="exam-name">
                                    <?php echo htmlspecialchars($ujian['mapel']); ?> - <?php echo htmlspecialchars($ujian['jenis']); ?>
                                </td>
                                <td class="exam-date"><?php echo htmlspecialchars($ujian['tanggal']); ?></td>
                                <td class="exam-status">
                                    <span class="badge <?php echo $ujian['class_status']; ?>">
                                        <?php echo htmlspecialchars($ujian['status']); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>