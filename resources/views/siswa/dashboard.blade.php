<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Ujian</title>

    <link rel="stylesheet" href="{{ asset('css/style-ujian.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fa-solid fa-graduation-cap"></i>
        <span>Ujian Online</span>
    </div>

    <ul class="sidebar-menu">
        <li class="active"><a href="{{ url('/siswa') }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
        <li><a href="{{ route('siswa.my_exams') }}"><i class="fa-regular fa-file-lines"></i> My Exams</a></li>

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
        <div class="content-header">
            <h2>Pilih Ujian</h2>
            <p class="section-title">Ujian Tersedia</p>
        </div>

        <div class="exam-grid">

            @forelse($ujian as $u)
            <div class="exam-card">
                <div class="card-header">
                    <span class="subject-tag">
                        {{ $u->mapel ?? 'Mata Pelajaran' }}
                    </span>
                    <h4>{{ $u->nama_ujian }}</h4>
                </div>

                <div class="card-details">
                    <p>
                        <i class="fa-regular fa-calendar"></i> 
                        {{ \Carbon\Carbon::parse($u->tanggal_ujian)->translatedFormat('d M Y') }}
                    </p>
                    
                    <p><i class="fa-regular fa-clock"></i> {{ $u->durasi ?? $u->waktu ?? '60' }} Menit</p>
                    
                    <p><i class="fa-regular fa-list-alt"></i> {{ $u->soals_count ?? 0 }} Soal</p>
                    
                    <p>
                        <i class="fa-regular fa-user"></i> Guru: 
                        {{ $u->guru->name ?? (\App\Models\Mapel::where('nama_mapel', $u->mapel)->first()->guru_pengampu ?? 'Admin') }}
                    </p>

                </div>

                <div class="card-actions" style="display: flex; gap: 10px;">
                    <a href="{{ url('/verifikasi/'.$u->id) }}" class="btn-detail" style="width: 100%; text-align: center; text-decoration: none;">
                        <i class="fa-solid fa-pen-to-square"></i> Mulai Ujian
                    </a>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; color: #9ca3af; padding: 3rem; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-folder-open" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;"></i>
                <p style="margin: 0; font-weight: 600;">Tidak ada ujian yang tersedia untuk saat ini.</p>
            </div>
            @endforelse

        </div>
    </div>
</div>

</body>
</html>