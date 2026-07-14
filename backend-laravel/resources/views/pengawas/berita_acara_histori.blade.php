<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pengawasan - Berita Acara</title>
    <link rel="stylesheet" href="{{ asset('css/style-ruang-pengawas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .history-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .history-table th { background-color: #f8fafc; color: #64748b; padding: 15px; text-align: left; font-size: 14px; border-bottom: 2px solid #e2e8f0; }
        .history-table td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #334155; font-size: 14px; vertical-align: top; }
        .badge-success { background-color: #dcfce7; color: #15803d; padding: 4px 12px; border-radius: 20px; font-weight: bold; font-size: 12px; }
        .note-text { font-size: 13px; color: #64748b; font-style: italic; max-width: 250px; word-wrap: break-word; }
    </style>
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
            <li>
                <a href="{{ route('pengawas.pilih-ruang') }}">
                    <i class="fa-solid fa-door-open"></i>
                    <span>Pilih Ruang</span>
                </a>
            </li>
           
            <li class="active">
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

<div class="main-content">
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Sesi Aktif / <b style="color: var(--text-dark);">Berita Acara</b></span>
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
        <div class="content-header" style="margin-bottom: 25px;">
            <h2>Histori Berita Acara Pengawas</h2>
            <p class="section-title">Daftar laporan administrasi ujian yang telah Anda awasi</p>
        </div>

        <div class="table-responsive">
            <table class="history-table">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th>Ujian / Mapel</th>
                        <th>Tanggal Pengawasan</th>
                        <th style="text-align: center;">Kehadiran Sesi</th>
                        <th>Catatan Kejadian</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($histori_berita as $index => $berita)
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td>
                            <strong style="color: #1e293b;">{{ $berita->ujian->nama_ujian ?? 'Ujian' }}</strong>
                            <br>
                            <span style="font-size: 12px; color: #64748b;">{{ $berita->ujian->mapel ?? 'Mata Pelajaran' }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y, H:i') }} WIB</td>
                        <td style="text-align: center;">
                            <span style="color: #16a34a; font-weight: 600;">Hadir: {{ $berita->jumlah_peserta_hadir }}</span><br>
                            <span style="color: #dc2626; font-weight: 600;">Absen: {{ $berita->jumlah_peserta_absen }}</span>
                        </td>
                        <td>
                            <p class="note-text">{{ $berita->catatan_kejadian ?? 'Berjalan lancar tanpa kendala.' }}</p>
                        </td>
                        <td style="text-align: center;">
                            <span class="badge-success">{{ $berita->status_pelaksanaan }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #9ca3af; padding: 3rem;">
                            <i class="fa-solid fa-folder-open" style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px; display: block;"></i>
                            Belum ada riwayat berita acara pengawasan.
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