<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style-penilaian.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-box"><i class="fa-solid fa-graduation-cap"></i></div>
        <span>E-Exam</span>
    </div>

    <ul class="sidebar-menu">
        <li><a href="/guru"><i class="fa-solid fa-house"></i> Dashboard</a></li>
        <li><a href="/guru/datasoal"><i class="fa-solid fa-book-open"></i> Bank Soal</a></li>
        <li class="active"><a href="/guru/penilaian"><i class="fa-solid fa-star"></i> Penilaian</a></li>
        <li><a href="#"><i class="fa-solid fa-chart-simple"></i> Rekap Nilai</a></li>
    </ul>
</aside>

<!-- MAIN -->
<main class="main-content">

<header class="top-bar">
    <span>Panel Guru / Penilaian</span>
</header>

<div class="content-body">

<!-- ================= PILIH UJIAN ================= -->
<form method="GET">
    <label>Pilih Paket Ujian</label>
    <select name="ujian_id" onchange="this.form.submit()">
        <option value="">-- Pilih Ujian --</option>
        @foreach($ujians as $u)
            <option value="{{ $u->id }}" {{ request('ujian_id') == $u->id ? 'selected' : '' }}>
                {{ $u->nama_ujian }}
            </option>
        @endforeach
    </select>
</form>

<br>

<!-- ================= INFO UJIAN ================= -->
@if($ujian_terpilih)
<div class="active-package-alert">
    <h3>{{ $ujian_terpilih->nama_ujian }}</h3>
</div>
@endif

<!-- ================= STATISTIK ================= -->
<div class="teacher-stats-grid">

    <div class="t-stats-card">
        <span>Ujian</span>
        <h2>{{ $ujian_terpilih ? 1 : 0 }}</h2>
    </div>

    <div class="t-stats-card">
        <span>Selesai</span>
        <h2>{{ $penilaians->count() ?? 0 }}</h2>
    </div>

    <div class="t-stats-card">
        <span>Belum Koreksi</span>
        <h2>
            {{ $penilaians ? $penilaians->where('status_essay','pending')->count() : 0 }}
        </h2>
    </div>

</div>

<br>

<!-- ================= FILTER ================= -->
<form method="GET">
    <input type="hidden" name="ujian_id" value="{{ request('ujian_id') }}">

    <label>Pilih Kelas</label>
    <select name="kelas_id" onchange="this.form.submit()">
        <option value="">Semua Kelas</option>
        @foreach($daftar_kelas as $kls)
            <option value="{{ $kls->id }}" {{ request('kelas_id') == $kls->id ? 'selected' : '' }}>
                {{ $kls->nama_kelas ?? $kls->nama }}
            </option>
        @endforeach
    </select>
</form>

<br>

<!-- ================= TABLE ================= -->
<table border="1" width="100%" cellpadding="10">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Nilai PG</th>
            <th>Status Essay</th>
            <th>Nilai Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($penilaians as $row)
        <tr>
            <td>{{ $row->siswa->name ?? '-' }}</td>

            <td align="center">
                {{ $row->nilai_pg }}
            </td>

            <td align="center">
                @if($row->status_essay == 'pending')
                    <span style="color:orange;">Pending</span>
                @elseif($row->status_essay == 'proses')
                    <span style="color:blue;">Proses</span>
                @else
                    <span style="color:green;">Selesai</span>
                @endif
            </td>

            <td align="center">
                {{ $row->nilai_akhir ?? '-' }}
            </td>

            <td align="center">
                <a href="/guru/penilaian/koreksi/{{ $row->id }}">
                    Koreksi
                </a>
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="5" align="center">
                Belum ada data siswa
            </td>
        </tr>
    @endforelse

    </tbody>
</table>

</div>
</main>

</body>
</html>