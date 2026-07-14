<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Exams - Histori Ujian</title>

    <link rel="stylesheet" href="{{ asset('css/style-ujian.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Tambahan styling lokal untuk membedakan status nilai */
        .badge-lulus { background-color: #dcfce7; color: #15803d; }
        .badge-remedi { background-color: #fee2e2; color: #b91c1c; }
        .score-text { font-size: 18px; font-weight: bold; color: #1e293b; }
        .history-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .history-table th { background-color: #f8fafc; color: #64748b; padding: 15px; text-align: left; font-size: 14px; border-bottom: 2px solid #e2e8f0; }
        .history-table td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #334155; font-size: 14px; }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fa-solid fa-graduation-cap"></i>
        <span>Ujian Online</span>
    </div>

    <ul class="sidebar-menu">
        <li><a href="{{ url('/siswa') }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
        <li class="active"><a href="{{ route('siswa.my_exams') }}"><i class="fa-regular fa-file-lines"></i> My Exams</a></li>
        
    </ul>
</div>

<div class="main-content">

    <div class="top-bar">
        <div class="user-info">
            <span class="time-info">{{ now()->format('H:i') }}</span>
            <div class="profile-circle">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="content-header" style="margin-bottom: 25px;">
            <h2>Histori Ujian Saya</h2>
            <p class="section-title">Daftar ujian yang telah Anda selesaikan</p>
        </div>

        <div class="table-responsive">
            <table class="history-table">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nama Paket Ujian</th>
                        <th>Tanggal Selesai</th>
                        <th style="text-align: center;">Nilai</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($histori_ujian as $index => $ujian)
                        @php
                            // Mengambil data nilai siswa untuk ujian terkait
                            $data_nilai = $ujian->nilai->first(); 
                            $skor = $data_nilai->nilai ?? 0;
                            // Asumsi KKM = 70
                            $isLulus = $skor >= 70; 
                        @endphp
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td style="font-weight: 600; color: #1e293b;">{{ $ujian->mapel->nama_mapel ?? $ujian->mapel }}</td>
                        <td>{{ $ujian->nama_ujian }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($data_nilai->created_at ?? $ujian->updated_at)->translatedFormat('d M Y, H:i') }} WIB
                        </td>
                        <td style="text-align: center;" class="score-text">
                            {{ $skor }}
                        </td>
                        <td style="text-align: center;">
                            <span class="badge {{ $isLulus ? 'badge-lulus' : 'badge-remedi' }}" style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">
                                {{ $isLulus ? 'Lulus' : 'Remedi' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #9ca3af; padding: 3rem;">
                            <i class="fa-regular fa-folder-open" style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px; display: block;"></i>
                            Anda belum pernah mengikuti ujian apa pun.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>