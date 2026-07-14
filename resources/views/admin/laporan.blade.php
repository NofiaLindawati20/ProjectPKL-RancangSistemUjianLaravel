<?php
// 1. Simulasi Data Statistik Laporan (Diperbarui sesuai request)
$total_ujian_terlaksana = 48;
$jumlah_siswa_mengikuti = 1140; // Menggantikan Rata-rata Nilai sebelumnya
$nilai_tertinggi_global = 98;   // Menggantikan Persentase Kelulusan
$rata_rata_nilai_global = 78.5; // Statistik Baru yang ditambahkan

// 2. Simulasi Data Laporan Nilai Ujian Per Mata Pelajaran
$laporan_ujian = [
    [
        "id" => 101,
        "nama_ujian" => "UTBK Simulasi 1",
        "mapel" => "Matematika",
        "kelas" => "XII TKJ 1",
        "peserta" => "20 / 20",
        "nilai_tertinggi" => 98,
        "nilai_terendah" => 65,
        "rata_rata" => 82.4,
        "status" => "Selesai",
        "badge_status" => "status-done"
    ],
    [
        "id" => 102,
        "nama_ujian" => "Ulangan Harian Bab 2",
        "mapel" => "Biologi",
        "kelas" => "XI TO 2",
        "peserta" => "28 / 30",
        "nilai_tertinggi" => 90,
        "nilai_terendah" => 55,
        "rata_rata" => 74.1,
        "status" => "Selesai",
        "badge_status" => "status-done"
    ],
    [
        "id" => 103,
        "nama_ujian" => "Penilaian Tengah Semester",
        "mapel" => "Bahasa Inggris",
        "kelas" => "X TO 1",
        "peserta" => "25 / 25",
        "nilai_tertinggi" => 95,
        "nilai_terendah" => 70,
        "rata_rata" => 80.8,
        "status" => "Selesai",
        "badge_status" => "status-done"
    ],
    [
        "id" => 104,
        "nama_ujian" => "Ujian Akhir Semester",
        "mapel" => "Sejarah",
        "kelas" => "XII TKJ 2",
        "peserta" => "0 / 29",
        "nilai_tertinggi" => "-",
        "nilai_terendah" => "-",
        "rata_rata" => "-",
        "status" => "Dibatalkan",
        "badge_status" => "status-canceled"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Ujian - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-laporan.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <li>
                <a href="/admin"> <i class="fa-solid fa-house-chimney"></i><span> Dashboard</span></a>
            </li>
            <li>
                <a href="/admin/user"><i class="fa-regular fa-file-lines"></i><span> Kelola User</span></a>
            </li>
            <li>
                <a href="/admin/datautama"><i class="fa-solid fa-square-poll-vertical"></i><span> Data Utama</span></a>
            </li>
            <li class="active">
                <a href="/admin/laporan"><i class="fa-solid fa-square-poll-vertical"></i><span> Laporan Ujian</span></a>
            </li>
            <li>
                <a href="/admin/pengaturan"><i class="fa-regular fa-user"></i><span> Pengaturan</span></a>
            </li>
            <li class="menu-logout">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span> Keluar</span></a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Menu Analisis / <b style="color: var(--text-dark);">Laporan Ujian</b></span>
            </div>
            <div class="header-right">
                <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                <div class="admin-profile">
                    <i class="fa-solid fa-circle-user"></i> <span>Administrator</span>
                </div>
            </div>
        </header>

        <div class="content-body">
            
            <div class="content-header">
                <div>
                    <h1>Laporan & Hasil Ujian</h1>
                    <p class="section-title">Pantau statistik nilai, rekapitulasi kelulusan, dan unduh berkas laporan hasil belajar siswa</p>
                </div>
                <div class="action-header-buttons">
                    <button class="btn-export btn-pdf" onclick="window.print()">
                        <i class="fa-regular fa-file-pdf"></i> Cetak PDF
                    </button>
                    <button class="btn-export btn-excel" onclick="alert('Export dokumen ke Excel sedang diproses...')">
                        <i class="fa-regular fa-file-excel"></i> Export Excel
                    </button>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Ujian Terlaksana</span>
                        <i class="fa-solid fa-square-poll-horizontal icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $total_ujian_terlaksana; ?> <span class="unit-text">Sesi</span></span>
                </div>
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Siswa Mengikuti</span>
                        <i class="fa-solid fa-users icon-card-bg"></i>
                    </div>
                    <span class="stats-number"><?php echo $jumlah_siswa_mengikuti; ?> <span class="unit-text">Orang</span></span>
                </div>
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Nilai Tertinggi</span>
                        <i class="fa-solid fa-trophy icon-card-bg"></i>
                    </div>
                    <span class="stats-number text-blue"><?php echo $nilai_tertinggi_global; ?></span>
                </div>
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Rata-Rata Nilai</span>
                        <i class="fa-solid fa-calculator icon-card-bg"></i>
                    </div>
                    <span class="stats-number text-green"><?php echo $rata_rata_nilai_global; ?></span>
                </div>
            </div>

            <div class="table-section">
                <div class="table-controls">
                    <h4>Ringkasan Nilai Per Sesi Ujian</h4>
                    
                    <div class="filter-wrapper">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Cari sesi ujian / mapel...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Nama Sesi Ujian</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th style="text-align: center;">Kehadiran</th>
                                <th style="text-align: center; color: #10B981;">Nilai Tertinggi</th>
                                <th style="text-align: center; color: #EF4444;">Nilai Terendah</th>
                                <th style="text-align: center; color: #3B82F6;">Rata-Rata</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($laporan_ujian as $row) : ?>
                            <tr>
                                <td class="exam-title-cell"><?php echo htmlspecialchars($row['nama_ujian']); ?></td>
                                <td class="bold-text"><?php echo htmlspecialchars($row['mapel']); ?></td>
                                <td class="text-muted"><?php echo htmlspecialchars($row['kelas']); ?></td>
                                <td style="text-align: center;" class="text-mono"><?php echo $row['peserta']; ?></td>
                                <td style="text-align: center;" class="bold-text text-green"><?php echo $row['nilai_tertinggi']; ?></td>
                                <td style="text-align: center;" class="bold-text text-red"><?php echo $row['nilai_terendah']; ?></td>
                                <td style="text-align: center;" class="bold-text text-blue"><?php echo $row['rata_rata']; ?></td>
                                <td style="text-align: center;">
                                    <span class="badge-status <?php echo $row['badge_status']; ?>">
                                        <?php echo $row['status']; ?>
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