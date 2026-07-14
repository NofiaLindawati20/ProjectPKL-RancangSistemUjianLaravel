<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Selesai - CBT System</title>
    <link rel="stylesheet" href="{{ asset('css/style-ujian-selesai.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="finish-container">
        <div class="finish-card">
            
            <div class="success-icon-wrapper">
                <div class="success-pulse"></div>
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <h1 class="finish-title">Ujian Berhasil Diselesaikan!</h1>
            <p class="finish-subtitle">Terima kasih telah mengikuti ujian dengan jujur dan tertib. Jawaban Anda telah tersimpan dengan aman di server pusat.</p>

            <div class="summary-box">
                <div class="summary-item">
                    <span class="s-label">Nama Peserta</span>
                    <span class="s-value">Muhammad Rafli</span>
                </div>
                <div class="summary-item">
                    <span class="s-label">Mata Pelajaran</span>
                    <span class="s-value">Matematika Peminatan (PAS)</span>
                </div>
                <div class="summary-item">
                    <span class="s-label">Waktu Selesai</span>
                    <span class="s-value"><i class="fa-regular fa-clock"></i> 09:30:12 WIB</span>
                </div>
                <div class="summary-item spec-status">
                    <span class="s-label">Status Kirim</span>
                    <span class="s-value status-secure"><i class="fa-solid fa-shield-halved"></i> Sukses & Terkunci</span>
                </div>
            </div>

            <div class="info-note">
                <i class="fa-solid fa-circle-info"></i>
                <span>Nilai akan diproses oleh guru pengampu. Anda sekarang dapat keluar dari ruang ujian virtual dengan aman.</span>
            </div>

            <a href="#" class="btn-back-dashboard">
                <i class="fa-solid fa-house"></i> Kembali ke Dashboard
            </a>

        </div>
        
        <footer class="finish-footer">
            CBT Portal &copy; 2026 • Versi Aplikasi Berbasis Integritas
        </footer>
    </div>

</body>
</html>