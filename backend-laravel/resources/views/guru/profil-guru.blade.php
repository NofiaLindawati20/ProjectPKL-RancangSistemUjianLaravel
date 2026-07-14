<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya (Guru) - CBT Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-profil-guru.css') }}">
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
            <li>
                <a href="/guru/analisissiswa">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Analisis Siswa</span> </a>
            </li>
            <li class="active">
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
                <span class="route-info">Pengaturan Akun / <b style="color: var(--text-dark);">Profil Pengguna</b></span>
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
                    <h1>Profil Pengguna</h1>
                    <p class="section-title">Kelola data kepegawaian Anda, pantau tugas mengajar, dan perbarui keamanan akun secara berkala.</p>
                </div>
            </div>

            <div class="profile-layout-grid">
                
                <div class="profile-left-column">
                    
                    <div class="profile-card-visual">
                        <div class="avatar-large-wrapper">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <h3>Ahmad Maulana, S.Pd.</h3>
                        <span class="badge-teacher-role">Guru Utama / Pembina</span>
                        <p class="teacher-nip"><i class="fa-regular fa-id-card"></i> NIP. 19890412 201503 1 002</p>
                    </div>

                    <div class="teaching-duty-card">
                        <h4><i class="fa-solid fa-book-bookmark"></i> Ringkasan Tugas Mengajar</h4>
                        <div class="duty-list">
                            <div class="duty-item">
                                <span class="duty-label">Mata Pelajaran Utama</span>
                                <span class="duty-value text-green">Matematika</span>
                            </div>
                            <div class="duty-item">
                                <span class="duty-label">Beban Mengajar</span>
                                <span class="duty-value">24 Jam / Minggu</span>
                            </div>
                            <div class="duty-item">
                                <span class="duty-label">Kelas Yang Diampu</span>
                                <span class="duty-value">XII TKJ 1, XI TKJ 2, X TKJ 1</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="profile-right-column">
                    
                    <div class="form-section-card">
                        <div class="form-card-header">
                            <h4><i class="fa-regular fa-address-card"></i> Informasi Data Diri</h4>
                        </div>
                        <div class="form-grid-inputs">
                            <div class="input-group">
                                <label>Nama Lengkap beserta Gelar</label>
                                <input type="text" value="Ahmad Maulana, S.Pd." class="profile-input" readonly>
                            </div>
                            <div class="input-group">
                                <label>Nomor Induk Pegawai (NIP)</label>
                                <input type="text" value="19890412 201503 1 002" class="profile-input" readonly>
                            </div>
                            <div class="input-group">
                                <label>Alamat Email Resmi</label>
                                <input type="email" value="ahmad.maulana@sch.id" class="profile-input">
                            </div>
                            <div class="input-group">
                                <label>Nomor WhatsApp / Telepon</label>
                                <input type="text" value="081234567890" class="profile-input">
                            </div>
                        </div>
                        <button class="btn-save-profile"><i class="fa-regular fa-floppy-disk"></i> Simpan Perubahan Data</button>
                    </div>

                    <div class="form-section-card" style="margin-top: 20px;">
                        <div class="form-card-header">
                            <h4><i class="fa-solid fa-shield-halved"></i> Keamanan & Sandi Akun</h4>
                        </div>
                        <div class="form-grid-inputs">
                            <div class="input-group full-width-input">
                                <label>Kata Sandi Saat Ini</label>
                                <input type="password" placeholder="••••••••" class="profile-input">
                            </div>
                            <div class="input-group">
                                <label>Kata Sandi Baru</label>
                                <input type="password" placeholder="Minimal 8 karakter" class="profile-input">
                            </div>
                            <div class="input-group">
                                <label>Konfirmasi Kata Sandi Baru</label>
                                <input type="password" placeholder="Ulangi kata sandi baru" class="profile-input">
                            </div>
                        </div>
                        <button class="btn-save-profile btn-change-password"><i class="fa-solid fa-key"></i> Perbarui Kata Sandi</button>
                    </div>

                </div>

            </div>

        </div>
    </main>

</body>
</html>