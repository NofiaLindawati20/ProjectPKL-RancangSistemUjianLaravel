<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai Siswa (Guru) - CBT Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-rekap-guru.css') }}">
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
            <li   class="active">
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
                <span class="route-info">Panel Guru / <b style="color: var(--text-dark);">Rekap Nilai Akhir</b></span>
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
            
            <div class="content-header-rekap">
                <div>
                    <h1>Rekap Laporan Nilai</h1>
                    <p class="section-title">Pantau nilai gabungan hasil evaluasi belajar siswa, statistik ketuntasan, dan cetak lembar nilai laporan.</p>
                </div>
                <div class="export-actions">
                    <button class="btn-export btn-excel"><i class="fa-regular fa-file-excel"></i> Export Excel</button>
                    <button class="btn-export btn-pdf"><i class="fa-regular fa-file-pdf"></i> Cetak PDF</button>
                </div>
            </div>

            <div class="rekap-stats-grid">
                <div class="r-stats-card">
                    <div class="r-card-info">
                        <span class="r-label">Rata-rata Nilai Kelas</span>
                        <span class="r-number">{{ number_format($rata,1) }}</span>
                    </div>
                    <div class="r-icon bg-light-green"><i class="fa-solid fa-calculator"></i></div>
                </div>
                <div class="r-stats-card">
                    <div class="r-card-info">
                        <span class="r-label">Siswa Tuntas (>= 75)</span>
                        <span class="r-number text-green">
                            {{ $tuntas }} <span class="r-sub">Siswa</span>    
                        </span>
                    </div>
                    <div class="r-icon bg-light-blue"><i class="fa-solid fa-user-shield"></i></div>
                </div>
                <div class="r-stats-card">
                    <div class="r-card-info">
                        <span class="r-label">Siswa Remedial</span>
                        <span class="r-number text-red">
                            {{ $remedial }} <span class="r-sub">Siswa</span>
                        </span>
                    </div>
                    <div class="r-icon bg-light-red"><i class="fa-solid fa-user-xmark"></i></div>
                </div>
            </div>

            <div class="rekap-filter-bar">
                <div class="f-item select-box-item">
                    <label>Pilih Kelas & Mata Pelajaran</label>
                    <select class="rekap-select">
                        <option>XII TKJ 1 </option>
                        <option>XI TKJ 2 </option>
                        <option>X TKJ 1 </option>
                    </select>
                </div>
                <div class="f-item search-box-item">
                    <label>Cari Nama / NISN</label>
                    <div class="rekap-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Masukkan kata kunci pencarian...">
                    </div>
                </div>
            </div>

            <div class="table-section">
                <div class="table-headline">
                    <h4>Lembar Rekapitulasi Nilai Akhir</h4>
                    <span class="kbm-badge">KBM / KKM: 75</span>
                </div>

                <div class="table-responsive">
                    <table class="rekap-table">
                        <thead>
                            <tr>
                                <th style="width: 50px; text-align: center;">No</th>
                                <th>Nama Siswa</th>
                                <th style="text-align: center;">Nilai PG</th>
                                <th style="text-align: center;">Nilai Uraian</th>
                                <th style="text-align: center;">Nilai Akhir (Murni)</th>
                                <th style="text-align: center;">Predikat</th>
                                <th style="text-align: center;">Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $index => $row)
                        <tr>
                            <td style="text-align:center;">{{ $index+1 }}</td>

                            <td class="student-identity">
                                <span class="name">{{ $row->siswa->name ?? '-' }}</span>
                                <span class="nisn">ID: {{ $row->siswa_id }}</span>
                            </td>

                            <td style="text-align:center;">{{ $row->nilai_pg }}</td>
                            <td style="text-align:center;">{{ $row->nilai_essay }}</td>

                            <td style="text-align:center;">
                                {{ $row->nilai_akhir }}
                            </td>

                            <td style="text-align:center;">
                                @if($row->nilai_akhir >= 90)
                                    A
                                @elseif($row->nilai_akhir >= 80)
                                    B
                                @elseif($row->nilai_akhir >= 70)
                                    C
                                @else
                                    D
                                @endif
                            </td>

                            <td style="text-align:center;">
                                @if($row->nilai_akhir >= 75)
                                    <span class="kapsul-lulus">Tuntas</span>
                                @else
                                    <span class="kapsul-remed">Belum Tuntas</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>