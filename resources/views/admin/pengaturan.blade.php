<?php
// 1. Simulasi Data Pengaturan Sistem Aktif dari Database
$nama_aplikasi     = "E-Exam Madrasah CBT";
$tahun_akademik    = "2024/2025 - Ganjil";
$durasi_default    = 90; // dalam menit
$skor_kelulusan    = 75; // KKM
$status_registrasi = "Ditutup"; // Status registrasi mandiri siswa
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Sistem - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-pengaturan.css') }}">
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

            <li  class="active">
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
                <span class="route-info">Konfigurasi / <b style="color: var(--text-dark);">Pengaturan Sistem</b></span>
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
                    <h1>Pengaturan Sistem</h1>
                    <p class="section-title">Kelola identitas aplikasi, parameter ujian, kurikulum aktif, dan pemeliharaan basis data</p>
                </div>
            </div>

            <div class="settings-layout">
                
                <form action="#" method="POST" class="settings-form" onsubmit="event.preventDefault(); alert('Perubahan pengaturan berhasil disimpan!');">
                    
                    <div class="settings-section">
                        <div class="section-icon-title">
                            <i class="fa-solid fa-window-restore"></i>
                            <h4>Identitas Aplikasi & Lembaga</h4>
                        </div>
                        <div class="form-grid">
                            <div class="input-box">
                                <label>Nama Aplikasi CBT</label>
                                <input type="text" value="<?php echo htmlspecialchars($nama_aplikasi); ?>" required>
                            </div>
                            <div class="input-box">
                                <label>Tahun Akademik & Semester Aktif</label>
                                <select>
                                    <option selected><?php echo $tahun_akademik; ?></option>
                                    <option>2024/2025 - Genap</option>
                                    <option>2025/2026 - Ganjil</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label>Registrasi Siswa Mandiri</label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="reg" value="Buka" <?php echo ($status_registrasi == 'Buka') ? 'checked' : ''; ?>> Buka Akses
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="reg" value="Tutup" <?php echo ($status_registrasi == 'Ditutup') ? 'checked' : ''; ?>> Tutup (Hanya oleh Admin)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="settings-section">
                        <div class="section-icon-title">
                            <i class="fa-solid fa-gauge-high"></i>
                            <h4>Parameter Default Ujian (CBT)</h4>
                        </div>
                        <div class="form-grid">
                            <div class="input-box">
                                <label>Durasi Ujian Default (Menit)</label>
                                <input type="number" value="<?php echo $durasi_default; ?>" min="1" required>
                            </div>
                            <div class="input-box">
                                <label>Kriteria Ketuntasan Minimal (KKM / Passing Grade)</label>
                                <input type="number" value="<?php echo $skor_kelulusan; ?>" min="0" max="100" required>
                            </div>
                            <div class="input-box">
                                <label>Fitur Keamanan Anti-Contek (Force Kiosk Mode)</label>
                                <select>
                                    <option>Aktif (Kunci Layar Browser)</option>
                                    <option>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="location.reload();">Reset Default</button>
                        <button type="submit" class="btn-save-settings"><i class="fa-regular fa-floppy-disk"></i> Simpan Perubahan</button>
                    </div>

                </form>

                <div class="maintenance-sidebar">
                    <div class="settings-section">
                        <div class="section-icon-title">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                            <h4>Pemeliharaan Sistem</h4>
                        </div>
                        <p class="maintenance-desc">Lakukan pencadangan berkala untuk menghindari kehilangan data ujian berharga.</p>
                        
                        <div class="maintenance-actions">
                            <button class="btn-maint btn-backup" onclick="alert('Database sukses dicadangkan!')">
                                <i class="fa-solid fa-download"></i> Backup Database (.sql)
                            </button>
                            <button class="btn-maint btn-restore" onclick="alert('Buka dialog unggah berkas SQL...')">
                                <i class="fa-solid fa-upload"></i> Restore Database
                            </button>
                            <button class="btn-maint btn-clear" onclick="confirm('PERINGATAN! Anda akan menghapus seluruh data log ujian lama. Lanjutkan?')">
                                <i class="fa-solid fa-broom"></i> Bersihkan Log Sesi
                            </button>
                        </div>
                    </div>
                </div>

            </div> </div>
    </main>

</body>
</html>