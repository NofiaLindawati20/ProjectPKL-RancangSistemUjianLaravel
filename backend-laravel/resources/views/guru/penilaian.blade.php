<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Ujian (Guru) - CBT Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-penilaian.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Style Tambahan untuk Grid Paket Soal */
        .package-section-box {
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }
        .package-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        .package-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.2s ease;
        }
        .package-card:hover {
            border-color: #0a6634;
            background: #f0fdf4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(10, 102, 52, 0.05);
        }
        .package-badge {
            align-self: flex-start;
            font-size: 11px;
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .package-card h3 {
            margin: 0 0 8px 0;
            font-size: 16px;
            color: #1e293b;
        }
        .package-meta {
            font-size: 13px;
            color: #64748b;
            display: flex;
            gap: 15px;
        }
        .active-package-alert {
            background: #e0f2fe;
            border-left: 5px solid #0284c7;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-back-package {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #0a6634;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .btn-back-package:hover {
            text-decoration: underline;
        }
    </style>
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
                <a href="/guru"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="/guru/datasoal"><i class="fa-solid fa-book-open"></i><span>Bank Soal</span></a>
            </li>
            <li class="active">
                <a href="/guru/penilaian"><i class="fa-solid fa-star"></i><span>Penilaian</span></a>
            </li>
            <li>
                <a href="/guru/rekap-nilai"><i class="fa-solid fa-chart-simple"></i><span>Rekap Nilai</span></a>
            </li>
            <li>
                <a href="/guru/analisissiswa"><i class="fa-solid fa-chart-pie"></i><span>Analisis Siswa</span></a>
            </li>
            <li>
                <a href="/guru/profil"><i class="fa-solid fa-user"></i><span>Profil</span></a>
            </li>
            <li class="menu-logout">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Keluar</span></a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Panel Guru / <b style="color: var(--text-dark);">Penilaian & Koreksi</b></span>
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
                    <h1>Penilaian Kelas Anda</h1>
                    <p class="section-title">Periksa hasil ujian pilihan ganda siswa dan lakukan koreksi manual untuk soal uraian/esai.</p>
                </div>
            </div>

            @if(!request()->has('ujian_id'))
            <div class="package-section-box">
                <h4 style="margin: 0; color: #1e293b;"><i class="fa-solid fa-folder-open" style="color: #0a6634; margin-right: 8px;"></i> Silahkan Pilih Paket Soal Ujian</h4>
                
                <div class="package-grid">
                    @forelse($daftar_ujian ?? \App\Models\Ujian::all() as $paket)
                    <a href="/guru/penilaian/siswa?ujian_id={{ $paket->id }}" class="package-card">
                        <div>
                            <div class="package-badge">{{ $paket->jenis ?? 'Ulangan Harian' }}</div>
                            <h3>{{ $paket->nama_ujian ?? $paket->mapel }}</h3>
                        </div>
                        <div class="package-meta">
                            <span><i class="fa-regular fa-calendar"></i> {{ $paket->tanggal ?? 'Dinamis' }}</span>
                            <span><i class="fa-regular fa-clock"></i> {{ $paket->durasi ?? '90' }} Menit</span>
                        </div>
                    </a>
                    @empty
                    <p style="color: #94a3b8; font-size: 14px;">Belum ada paket ujian yang tersedia.</p>
                    @endforelse
                </div>
            </div>
            @endif

            @if(request()->has('ujian_id'))
            
            <a href="/guru/penilaian" class="btn-back-package">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Paket Soal
            </a>

            <?php 
                $ujian_terpilih = \App\Models\Ujian::find(request('ujian_id')); 
            ?>
            <div class="active-package-alert">
                <div>
                    <small style="color: #0369a1; font-weight: 600; text-transform: uppercase; font-size: 11px;">Paket Soal Terpilih:</small>
                    <h3 style="margin: 2px 0 0 0; color: #0c4a6e; font-size: 18px;">{{ $ujian_terpilih->nama_ujian ?? 'Detail Soal Terpilih' }}</h3>
                </div>
                <span style="background: #0a6634; color: white; padding: 6px 14px; font-size: 12px; font-weight: 600; border-radius: 30px;">Sesi Terbuka</span>
            </div>

            <div class="teacher-stats-grid">
                <div class="t-stats-card">
                    <div class="card-top">
                        <span class="t-label">Ujian Aktif</span>
                        <div class="t-icon-box bg-green"><i class="fa-solid fa-clipboard-check"></i></div>
                    </div>
                    <span class="t-number">3 <span class="t-sub">Sesi</span></span>
                </div>
                <div class="t-stats-card">
                    <div class="card-top">
                        <span class="t-label">Selesai Mengerjakan</span>
                        <div class="t-icon-box bg-blue"><i class="fa-solid fa-user-pen"></i></div>
                    </div>
                    <span class="t-number">
                        {{ isset($penilaians) ? count($penilaians) : 0 }} <span class="t-sub">Siswa</span>
                    </span>
                </div>
                <div class="t-stats-card warning-card">
                    <div class="card-top">
                        <span class="t-label">Belum Dikoreksi (Uraian)</span>
                        <div class="t-icon-box bg-amber"><i class="fa-solid fa-hourglass-half"></i></div>
                    </div>
                    <span class="t-number text-amber">
                        {{ $penilaians->where('status_essay', 'pending')->count() }} <span class="t-sub">Esai</span>
                    </span>
                </div>
            </div>

            <div class="filter-section-box">
                <div class="filter-group">
                    <label>Pilih Kelas</label>
                    <form action="" method="GET" id="formFilterKelas">
                        <input type="hidden" name="ujian_id" value="{{ request('ujian_id') }}">
                        <select name="kelas_id" class="custom-select" onchange="document.getElementById('formFilterKelas').submit();">
                            <option value="">-- Semua Kelas --</option>
                            @foreach(\App\Models\Kelas::all() as $kls)
                                <option value="{{ $kls->id }}" {{ request('kelas_id') == $kls->id ? 'selected' : '' }}>
                                    {{ $kls->nama_kelas ?? $kls->nama }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="search-box-wrapper">
                    <label>Cari Siswa</label>
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="inputCariSiswa" onkeyup="filterNamaSiswa()" placeholder="Masukkan nama siswa...">
                    </div>
                </div>
            </div>

            <div class="table-section">
                <div class="table-title-bar">
                    <h4>Daftar Hasil Ujian Siswa</h4>
                    <?php 
                        $kelas_aktif = \App\Models\Kelas::find(request('kelas_id'));
                    ?>
                    <span class="class-indicator">Kelas Terfilter: {{ $kelas_aktif->nama_kelas ?? 'Semua Kelas' }}</span>
                </div>

                <div class="table-responsive">
                    <table class="teacher-assessment-table" id="tabelHasilSiswa">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th style="text-align: center;">Skor PG (Otomatis)</th>
                                <th style="text-align: center;">Status Esai / Uraian</th>
                                <th style="text-align: center;">Nilai Akhir</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penilaians as $row)
                            <tr>
                                <td class="student-cell">
                                    <span class="s-name">{{ $row->siswa->name ?? $row->user->name }}</span>
                                    <span class="s-nisn">ID: {{ $row->siswa_id ?? $row->user_id }}</span>
                                </td>

                                <td style="text-align:center;" class="bold-text text-blue">
                                    {{ $row->nilai_pg }}
                                </td>

                                <td style="text-align:center;">
                                    @if($row->status_essay == 'pending')
                                        <span class="badge-status status-pending">Perlu Koreksi</span>
                                    @elseif($row->status_essay == 'proses')
                                        <span class="badge-status status-progress">Proses</span>
                                    @else
                                        <span class="badge-status status-success">Selesai</span>
                                    @endif
                                </td>

                                <td style="text-align:center;" class="bold-text">
                                    {{ $row->nilai_akhir ?? '-' }}
                                </td>

                                <td style="text-align:center;">
                                    <a href="/guru/penilaian/koreksi/{{ $row->id }}" class="btn-action-grade btn-primary-grade">
                                        Koreksi
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 24px; color: #94a3b8;">
                                    Tidak ada data siswa yang telah mengumpulkan untuk filter ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>
    </main>

    <script>
        function filterNamaSiswa() {
            let input = document.getElementById("inputCariSiswa");
            let filter = input.value.toUpperCase();
            let table = document.getElementById("tabelHasilSiswa");
            let tr = table.getElementsByTagName("tr");

            // Loop semua baris tabel (lewati baris parameter thead)
            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByClassName("student-cell")[0];
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>