<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Performa Siswa (Guru) - CBT Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-analisis-guru.css') }}">
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
            <li>
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
            <li  class="active">
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
                <span class="route-info">Panel Guru / <b style="color: var(--text-dark);">Analisis Performa & Butir Soal</b></span>
            </div>
            <div class="header-right">
                <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                <div class="teacher-profile">
                    <i class="fa-solid fa-circle-user"></i> 
                    <div class="profile-text">
                        <span class="profile-name">Ahmad Maulana, S.Pd.</span>
                        <span class="profile-role">Guru Pengampu</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="content-body">
            
            <div class="content-header">
                <div>
                    <h1>Analisis Evaluasi Siswa</h1>
                    <p class="section-title">Identifikasi daya serap materi, siswa yang memerlukan bimbingan ekstra, dan sebaran tingkat kesulitan soal.</p>
                </div>
            </div>

            <div class="analysis-stats-grid">
                <div class="a-stats-card">
                    <div class="a-card-info">
                        <span class="a-label">Nilai Tertinggi Kelas</span>
                        <span class="a-number text-green">{{ number_format($nilai_tertinggi,1) }}</span>
                    </div>
                    <div class="a-icon bg-light-green"><i class="fa-solid fa-crown"></i></div>
                </div>
                <div class="a-stats-card">
                    <div class="a-card-info">
                        <span class="a-label">Nilai Terendah Kelas</span>
                        <span class="a-number text-red">{{ number_format($nilai_terendah,1) }}</span>
                    </div>
                    <div class="a-icon bg-light-red"><i class="fa-solid fa-arrow-down-trend-line"></i></div>
                </div>
                <div class="a-stats-card">
                    <div class="a-card-info">
                        <span class="a-label">Soal Paling Sulit</span>
                        <span class="a-number text-amber">Soal No. 14</span>
                    </div>
                    <div class="a-icon bg-light-amber"><i class="fa-solid fa-triangle-exclamation"></i></div>
                </div>
            </div>

            <div class="analysis-two-columns">
                
                <div class="column-card">
                    <div class="card-headline">
                        <h4>Analisis Tingkat Kesulitan Soal</h4>
                        <span class="sub-headline">Berdasarkan persentase jawaban benar seluruh siswa</span>
                    </div>
                    
                    <div class="bar-chart-simulation">
                        <div class="chart-item">
                            <div class="item-label-box">
                                <span>Kategori Mudah (Benar > 75%)</span>
                                <span class="weight-600">15 Soal (60%)</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill fill-green" style="width: 60%;"></div>
                            </div>
                        </div>

                        <div class="chart-item">
                            <div class="item-label-box">
                                <span>Kategori Sedang (Benar 40% - 75%)</span>
                                <span class="weight-600">7 Soal (28%)</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill fill-amber" style="width: 28%;"></div>
                            </div>
                        </div>

                        <div class="chart-item">
                            <div class="item-label-box">
                                <span>Kategori Sulit (Benar < 40%)</span>
                                <span class="weight-600">3 Soal (12%)</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill fill-red" style="width: 12%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column-card">
                    <div class="card-headline">
                        <h4>Siswa Perlu Bimbingan Ekstra</h4>
                        <span class="sub-headline">Daftar siswa dengan capaian di bawah rata-rata kelas</span>
                    </div>

                    <div class="student-alert-list">
                        @foreach($remedial as $row)
                        <div class="alert-item">
                            <div class="alert-left">
                                <div class="avatar-shortcut">
                                    <i class="fa-solid fa-user-xmark"></i>
                                </div>
                                <div class="alert-info">
                                    <span class="alert-name">{{ $row->siswa->name }}</span>
                                    <span class="alert-sub">
                                        Nilai Akhir: {{ $row->nilai_akhir }}
                                    </span>
                                </div>
                            </div>
                            <span class="badge-danger">Remedial</span>
                        </div>
                        @endforeach
                        </div>

                        <div class="alert-item">
                            <div class="alert-left">
                                <div class="avatar-shortcut"><i class="fa-solid fa-user-xmark"></i></div>
                                <div class="alert-info">
                                    <span class="alert-name">Farhan Saputra</span>
                                    <span class="alert-sub">XII TKJ 1 • Nilai Akhir: 68.0</span>
                                </div>
                            </div>
                            <span class="badge-danger">Remedial</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-section" style="margin-top: 25px;">
                <div class="table-headline">
                    <h4>Analisis Daya Serap Per Topik Materi</h4>
                    <span class="class-indicator">Mata Pelajaran: Matematika Peminatan</span>
                </div>

                <div class="table-responsive">
                    <table class="analysis-table">
                        <thead>
                            <tr>
                                <th>Topik / Kompetensi Dasar (KD)</th>
                                <th style="text-align: center;">Jumlah Soal</th>
                                <th style="text-align: center;">Rata-rata Jawaban Benar</th>
                                <th style="text-align: center;">Status Pemahaman Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="topic-title">Limit Fungsi Trigonometri</td>
                                <td style="text-align: center;" class="weight-500">10 Soal</td>
                                <td style="text-align: center;" class="weight-600 text-green">84.5%</td>
                                <td style="text-align: center;"><span class="kapsul-status status-good">Sangat Baik</span></td>
                            </tr>
                            <tr>
                                <td class="topic-title">Turunan Fungsi Trigonometri</td>
                                <td style="text-align: center;" class="weight-500">10 Soal</td>
                                <td style="text-align: center;" class="weight-600 text-amber">71.0%</td>
                                <td style="text-align: center;"><span class="kapsul-status status-fair">Cukup Terpahami</span></td>
                            </tr>
                            <tr>
                                <td class="topic-title">Nilai Maksimum & Minimum Trigonometri</td>
                                <td style="text-align: center;" class="weight-500">5 Soal</td>
                                <td style="text-align: center;" class="weight-600 text-red">54.2%</td>
                                <td style="text-align: center;"><span class="kapsul-status status-poor">Perlu Pengulangan</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>