<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Ruang Ujian (Pengawas) - CBT Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-ruang-pengawas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-box">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <span>CBT Pengawas</span>
        </div>
        
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ route('pengawas.pilih-ruang') }}">
                    <i class="fa-solid fa-door-open"></i>
                    <span>Pilih Ruang</span>
                </a>
            </li>
           
            <li>
                <a href="{{ route('pengawas.berita_acara') }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>Berita Acara</span>
                </a>
            </li>
            <li class="menu-logout">
                <a href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Sesi Aktif / <b style="color: var(--text-dark);">Pilih Ruang Ujian</b></span>
            </div>
            <div class="header-right">
                <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                <div class="supervisor-profile">
                    <i class="fa-solid fa-circle-user"></i> 
                    <div class="profile-text">
                        <span class="profile-name">Drs. H. Supriyadi</span>
                        <span class="profile-role">Pengawas Ujian</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="content-body">
            
            <div class="content-header">
                <div>
                    <h1>Pilih Ruang Pengawasan</h1>
                    <p class="section-title">Silakan pilih ruang ujian yang telah dijadwalkan untuk Anda untuk mulai mengelola sesi dan memantau siswa.</p>
                </div>
            </div>

            <div class="room-cards-grid">
                
                <div class="room-card card-active">
                    <div class="room-card-header">
                        <span class="badge-status status-live"><i class="fa-solid fa-circle fa-beat"></i> Sesi Berjalan</span>
                        <span class="room-number">Ruang 01</span>
                    </div>
                    
                    <h3 class="room-title">Lab. Komputer Utama</h3>
                    <p class="exam-name"><i class="fa-solid fa-file-signature"></i> Penilaian Akhir Semester (PAS)</p>
                    
                    <div class="room-details">
                        <div class="detail-item">
                            <span class="d-label">Kelas Terjadwal</span>
                            <span class="d-value">X TKJ 1, XI TO 1</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Jam Terjadwal</span>
                            <span class="d-value">08.15 - 09.00</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Kapasitas Peserta</span>
                            <span class="d-value"><i class="fa-solid fa-users"></i> 20 Siswa</span>
                        </div>

                    </div>
                    
                    <button class="btn-enter-room btn-primary-room"> 
                        <span><a href="/pengawas/ruang/{ruang}">Masuk Ruang Pengawas</a></span> <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </div>

                <div class="room-card">
                    <div class="room-card-header">
                        <span class="badge-status status-ready"><i class="fa-regular fa-clock"></i> Siap Dimulai</span>
                        <span class="room-number">Ruang 02</span>
                    </div>
                    
                    <h3 class="room-title">Ruang Teori Kelas X-TKJ 1</h3>
                    <p class="exam-name"><i class="fa-solid fa-file-signature"></i> Penilaian Akhir Semester (PAS)</p>
                    
                    <div class="room-details">
                        <div class="detail-item">
                            <span class="d-label">Kelas Terjadwal</span>
                            <span class="d-value">X TO 1, X11 TKJ 1</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Jam Terjadwal</span>
                            <span class="d-value">08.15 - 09.00</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Kapasitas Peserta</span>
                            <span class="d-value"><i class="fa-solid fa-users"></i> 20 Siswa</span>
                        </div>
                    </div>
                    
                    <button class="btn-enter-room btn-primary-room"> 
                        <span><a href="/pengawas/ruang/{ruang}">Masuk Ruang Pengawas</a></span> <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </div>

                <div class="room-card card-disabled">
                    <div class="room-card-header">
                        <span class="badge-status status-closed"><i class="fa-solid fa-lock"></i> Selesai</span>
                        <span class="room-number">Ruang 02</span>
                    </div>
                    
                    <h3 class="room-title">Lab. Komputer Multimedia</h3>
                    <p class="exam-name"><i class="fa-solid fa-file-signature"></i> Penilaian Akhir Semester (PAS)</p>
                    
                    <div class="room-details">
                        <div class="detail-item">
                            <span class="d-label">Kelas Terjadwal</span>
                            <span class="d-value">XII IIS 1</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Jam Terjadwal</span>
                            <span class="d-value">07.30 - 08.15</span>
                        </div>
                        <div class="detail-item">
                            <span class="d-label">Kapasitas Peserta</span>
                            <span class="d-value"><i class="fa-solid fa-users"></i> 20 Siswa</span>
                        </div>
                    </div>
                    
                    <button class="btn-enter-room btn-disabled-room" disabled>
                        <span>Sesi Telah Ditutup</span> <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>

            </div>

        </div>
    </main>

</body>
</html>