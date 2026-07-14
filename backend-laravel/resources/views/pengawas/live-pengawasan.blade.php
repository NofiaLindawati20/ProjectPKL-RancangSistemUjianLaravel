<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Pengawasan - Ruang 01</title>
    <link rel="stylesheet" href="{{ asset('css/style-live-pengawasan.css') }}">
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>



    <!-- KONTEN UTAMA -->
    <main class="main-content">
        <!-- TOP NAVBAR -->
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Pilih Ruang / <b style="color: var(--text-dark);">Live Monitoring Ruang 01</b></span>
            </div>
            <div class="header-right">
                <!-- Simulasi Tombol Trigger Kecurangan untuk Keperluan Testing -->
                <button class="btn-simulation" onclick="triggerCheatSimulation()">
                    <i class="fa-solid fa-triangle-exclamation animate-flicker"></i> Simulasi Siswa Curang
                </button>
                <div class="supervisor-profile">
                    <i class="fa-solid fa-circle-user"></i> 
                    <div class="profile-text">
                        <span class="profile-name">Drs. H. Supriyadi</span>
                        <span class="profile-role">Pengawas Ruang 01</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- ISI KONTEN -->
        <div class="content-body">
            
            <!-- HEADER MONITORING -->
            <div class="monitoring-header">
                <div>
                    <h2><i class="fa-solid fa-display text-green"></i> Live Monitoring Monitor: Ruang 01</h2>
                    <p class="section-title">Memantau aktivitas ujian secara langsung. Denah akan berkedip merah jika sistem mendeteksi indikasi kecurangan siswa.</p>
                </div>
                <div class="live-indicator-box">
                    <span class="badge-live"><i class="fa-solid fa-circle fa-beat"></i> TERKONEKSI LIVE</span>
                </div>
            </div>

            <!-- LAYOUT DUA KOLOM: DENAH UTAMA & PANEL SISI -->
            <div class="monitoring-grid">
                
                <!-- KOLOM KIRI: DENAH 20 SISWA -->
                <div class="denah-container">
                    <div class="papan-tulis-depan">DEPAN / PAPAN TULIS</div>
                    
                    <div class="grid-kursi-siswa">
                        <!-- Menghasilkan 20 Kursi Secara Statis -->
                        <!-- Kursi 1 - 20 -->
                        <div class="seat-card status-online" id="seat-1">
                            <span class="seat-number">01</span>
                            <p class="student-name">Aditya Pratama</p>
                            <span class="student-nis">NISN: 004812301</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-2">
                            <span class="seat-number">02</span>
                            <p class="student-name">Budi Santoso</p>
                            <span class="student-nis">NISN: 004812302</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-3">
                            <span class="seat-number">03</span>
                            <p class="student-name">Citra Lestari</p>
                            <span class="student-nis">NISN: 004812303</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-4">
                            <span class="seat-number">04</span>
                            <p class="student-name">Dedi Wijaya</p>
                            <span class="student-nis">NISN: 004812304</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-5">
                            <span class="seat-number">05</span>
                            <p class="student-name">Eka Putri</p>
                            <span class="student-nis">NISN: 004812305</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-6">
                            <span class="seat-number">06</span>
                            <p class="student-name">Fajar Nugroho</p>
                            <span class="student-nis">NISN: 004812306</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-7">
                            <span class="seat-number">07</span>
                            <p class="student-name">Gita Permata</p>
                            <span class="student-nis">NISN: 004812307</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-8">
                            <span class="seat-number">08</span>
                            <p class="student-name">Hendra Setiawan</p>
                            <span class="student-nis">NISN: 004812308</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-9">
                            <span class="seat-number">09</span>
                            <p class="student-name">Indah Sari</p>
                            <span class="student-nis">NISN: 004812309</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-10">
                            <span class="seat-number">10</span>
                            <p class="student-name">Joko Susilo</p>
                            <span class="student-nis">NISN: 004812310</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-11">
                            <span class="seat-number">11</span>
                            <p class="student-name">Kartika Rahma</p>
                            <span class="student-nis">NISN: 004812311</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-12">
                            <span class="seat-number">12</span>
                            <p class="student-name">Lukman Hakim</p>
                            <span class="student-nis">NISN: 004812312</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-13">
                            <span class="seat-number">13</span>
                            <p class="student-name">Mega Utami</p>
                            <span class="student-nis">NISN: 004812313</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-14">
                            <span class="seat-number">14</span>
                            <p class="student-name">Naufal Azhar</p>
                            <span class="student-nis">NISN: 004812314</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-15">
                            <span class="seat-number">15</span>
                            <p class="student-name">Olivia Arinda</p>
                            <span class="student-nis">NISN: 004812315</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-16">
                            <span class="seat-number">16</span>
                            <p class="student-name">Putra Pratama</p>
                            <span class="student-nis">NISN: 004812316</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-17">
                            <span class="seat-number">17</span>
                            <p class="student-name">Qori Aulia</p>
                            <span class="student-nis">NISN: 004812317</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-18">
                            <span class="seat-number">18</span>
                            <p class="student-name">Rian Hidayat</p>
                            <span class="student-nis">NISN: 004812318</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-19">
                            <span class="seat-number">19</span>
                            <p class="student-name">Siti Aminah</p>
                            <span class="student-nis">NISN: 004812319</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                        <div class="seat-card status-online" id="seat-20">
                            <span class="seat-number">20</span>
                            <p class="student-name">Taufik Hidayat</p>
                            <span class="student-nis">NISN: 004812320</span>
                            <div class="seat-badge"><i class="fa-solid fa-laptop"></i> Active</div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: PANEL SISI & BERITA ACARA -->
                <div class="panel-side-column">
                    
                    <!-- NOTIFIKASI DETEKSI KECURANGAN LIVE -->
                    <div class="fraud-log-card">
                        <h4><i class="fa-solid fa-shield-halved"></i> Log Deteksi Sistem</h4>
                        <div class="log-container" id="log-container">
                            <div class="log-item default-log">
                                <span class="log-time">Sekarang</span>
                                <span class="log-msg">Sistem aman. Belum ada aktivitas mencurigakan.</span>
                            </div>
                        </div>
                    </div>

                    <!-- FORM BERITA ACARA UJIAN -->
                    <div class="berita-acara-card">
                        <h4><i class="fa-solid fa-clipboard-list"></i> Berita Acara Pelaksanaan</h4>
                        <div class="ba-form">
                            <div class="ba-input-group">
                                <label>Mata Pelajaran</label>
                                <input type="text" value="Matematika Peminatan (PAS)" readonly class="ba-input">
                            </div>
                            <div class="ba-grid-half">
                                <div class="ba-input-group">
                                    <label>Hadir</label>
                                    <input type="number" value="20" class="ba-input">
                                </div>
                                <div class="ba-input-group">
                                    <label>Tidak Hadir</label>
                                    <input type="number" value="0" class="ba-input">
                                </div>
                            </div>
                            <div class="ba-input-group">
                                <label>Catatan/Kejadian Penting Selama Ujian</label>
                                <textarea placeholder="Tuliskan catatan kejadian penting atau pelanggaran siswa jika ada..." class="ba-textarea" id="ba-notes"></textarea>
                            </div>
                            <button class="btn-submit-ba"><i class="fa-solid fa-cloud-arrow-up"></i> Kunci & Kirim Berita Acara</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- JAVASCRIPT: LOGIKA DETEKSI KECURANGAN OTOMATIS -->
    <script>
        function triggerCheatSimulation() {
            // Pilih acak nomor kursi antara 1 - 20
            const randomSeatId = Math.floor(Math.random() * 20) + 1;
            const seatElement = document.getElementById(`seat-${randomSeatId}`);
            
            if (!seatElement) return;

            // Dapatkan nama siswa dari elemen kartu
            const studentName = seatElement.querySelector('.student-name').innerText;
            const badgeElement = seatElement.querySelector('.seat-badge');

            // 1. Ubah status kursi menjadi mode terdeteksi curang (Flicker Merah)
            seatElement.classList.remove('status-online');
            seatElement.classList.add('status-cheating');
            badgeElement.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> Curang!`;

            // 2. Tambahkan log notifikasi di sebelah kanan
            const logContainer = document.getElementById('log-container');
            
            // Hapus log default jika ada
            const defaultLog = logContainer.querySelector('.default-log');
            if (defaultLog) defaultLog.remove();

            const timeNow = new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit', second:'2-digit'});
            const newLog = document.createElement('div');
            newLog.className = 'log-item alert-log';
            newLog.innerHTML = `
                <span class="log-time">${timeNow}</span>
                <span class="log-msg"><b>${studentName} (Kursi ${randomSeatId})</b> terdeteksi beralih dari aplikasi ujian!</span>
            `;
            logContainer.insertBefore(newLog, logContainer.firstChild);

            // Tambahkan juga ke catatan berita acara otomatis
            const baNotes = document.getElementById('ba-notes');
            baNotes.value += `[${timeNow}] Peringatan: ${studentName} (Kursi ${randomSeatId}) terdeteksi keluar tab.\n`;

            // 3. Sistem Hitung Mundur 10 Detik untuk Mengembalikan Status menjadi Hijau Kembali
            setTimeout(() => {
                seatElement.classList.remove('status-cheating');
                seatElement.classList.add('status-online');
                badgeElement.innerHTML = `<i class="fa-solid fa-laptop"></i> Active`;
                
                // Tambahkan log pemulihan
                const normalLog = document.createElement('div');
                normalLog.className = 'log-item recovery-log';
                normalLog.innerHTML = `
                    <span class="log-time">Selesai</span>
                    <span class="log-msg">Kursi ${randomSeatId} telah kembali ter-lock hijau.</span>
                `;
                logContainer.insertBefore(normalLog, logContainer.firstChild);
            }, 10000); // 10000ms = 10 Detik
        }
    </script>

</body>
</html>