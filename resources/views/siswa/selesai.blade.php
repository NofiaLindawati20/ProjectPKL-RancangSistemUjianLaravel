<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Selesai - CBT Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('css/style-selesai-ujian.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        <div class="header-ornament"></div>
        
        <div class="content-box">
            <div class="trophy-container">
                <i class="fa-solid fa-trophy trophy-icon"></i>
            </div>

            <h1>Ujian Selesai!</h1>
            <p class="subtitle">Terima kasih telah mengerjakan ujian dengan baik.</p>

            <table class="info-table">
                <tr>
                    <td class="label">Mata Pelajaran</td>
                    <td class="value">{{ $ujian->nama_ujian ?? 'Matematika' }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Ujian</td>
                    <td class="value">{{ $ujian->jenis_ujian ?? 'Ulangan Harian' }}</td>
                </tr>
                <tr>
                    <td class="label">Waktu Selesai</td>
                    <td class="value">{{ now()->format('H:i:s') }}</td>
                </tr>
            </table>

            <div class="btn-group">
                <a href="{{ url('/siswa/my-exams') }}" class="btn btn-success">LIHAT HASIL</a>
                <a href="{{ url('/siswa') }}" class="btn btn-outline">KELUAR</a>
            </div>
        </div>
    </div>

</body>
</html>