<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Soal - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-datasoal.css') }}">
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
            <li class="active">
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
                <span class="route-info">Menu Akademik / <b style="color: var(--text-dark);">Bank Soal</b></span>
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
                    <h1>Kelola Bank Soal</h1>
                    <p class="section-title">Pantau daftar soal yang telah dibuat, status pengerjaan oleh siswa, dan buat paket ujian baru</p>
                </div>
                <div class="action-header-buttons">
                    <a href="/guru/buat-soal" class="btn-create-soal">
                        <i class="fa-solid fa-plus"></i> Buat Paket Soal
                    </a>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                            <div class="card-inner">
                                <span class="stats-label">Total Bank Soal</span>
                                <i class="fa-regular fa-folder-open icon-card-bg"></i>
                            </div>
                            <span class="stats-number">
                                {{ number_format($total_paket) }} <span class="unit-text">Paket</span>
                            </span>
                        </div>

                        <div class="stats-card">
                            <div class="card-inner">
                                <span class="stats-label">Soal Telah Dibuat</span>
                                <i class="fa-solid fa-file-signature icon-card-bg"></i>
                            </div>
                            <span class="stats-number text-blue">
                                {{ number_format($total_soal) }} <span class="unit-text">Butir</span>
                            </span>
                        </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Selesai Dikerjakan</span>
                        <i class="fa-solid fa-user-check icon-card-bg"></i>
                    </div>
                    <span class="stats-number text-green">845 <span class="unit-text">Siswa</span></span>
                </div>
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Sedang Berlangsung</span>
                        <i class="fa-solid fa-spinner fa-spin icon-card-bg" style="color: #E2EAE6;"></i>
                    </div>
                    <span class="stats-number text-amber">12 <span class="unit-text">Sesi</span></span>
                </div>
            </div>

            <div class="table-section">
                <div class="table-controls">
                    <h4>Daftar Paket Soal Aktif</h4>
                    
                    <div class="filter-wrapper">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Cari paket soal / mata pelajaran...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Kode Soal</th>
                                <th>Nama Paket Soal</th>
                                <th>Mata Pelajaran</th>
                                <th style="text-align: center;">Jumlah Soal</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ujians as $ujian)
                            <tr>
                                <td><strong>SOAL-{{ strtoupper(substr($ujian->mapel, 0, 3)) }}-{{ $ujian->id }}</strong></td>
                    
                    <td><strong>{{ $ujian->nama_ujian }}</strong><br><small style="color: #94a3b8;">Kelas: {{ $ujian->kelas }}</small></td>
                    <td><strong>{{ $ujian->mapel }}</strong></td>
                    
                    <td>{{ $ujian->soals_count }} Butir</td>
                    
                    <td><span class="badge-status status-aktif">Aktif</span></td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ url('/guru/datasoal/'.$ujian->id.'/detail') }}" class="btn-action btn-edit" title="Detail/Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="{{ url('/guru/datasoal/delete/'.$ujian->id) }}" class="btn-action btn-delete" onclick="return confirm('Hapus paket soal ini?')" title="Hapus"><i class="fa-regular fa-trash-can"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #94a3b8;">Belum ada paket soal yang dibuat.</td>
                </tr>
                @endforelse
            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>