<?php
// 1. Simulasi Data Ringkasan Master Data untuk Admin
$total_kelas   = 12;
$total_mapel   = 18;
$tahun_aktif   = "2024/2025 - Ganjil";

// 2. Simulasi Data Kelas & Mapel Utama dari Database
$master_kelas = [
    ["id" => 1, "nama_kelas" => "X MIPA 1", "wali_kelas" => "Budi Santoso, M.Pd", "jumlah_siswa" => 32],
    ["id" => 2, "nama_kelas" => "X MIPA 2", "wali_kelas" => "Sri Wahyuni, S.Pd", "jumlah_siswa" => 30],
    ["id" => 3, "nama_kelas" => "XI IIS 1", "wali_kelas" => "Drs. Ahmad Junaedi", "jumlah_siswa" => 28],
    ["id" => 4, "nama_kelas" => "XII MIPA 1", "wali_kelas" => "Siti Aminah, M.Si", "jumlah_siswa" => 35]
];

$master_mapel = [
    ["id" => 1, "kode" => "MAT-01", "nama_mapel" => "Matematika Peminatan", "kategori" => "Eksak"],
    ["id" => 2, "kode" => "IND-02", "nama_mapel" => "Bahasa Indonesia", "kategori" => "Bahasa"],
    ["id" => 3, "kode" => "ING-03", "nama_mapel" => "Bahasa Inggris", "kategori" => "Bahasa"],
    ["id" => 4, "kode" => "BIO-04", "nama_mapel" => "Biologi", "kategori" => "Eksak"]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Utama - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-data-utama.css') }}">
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
            <li class="active">
                <a href="/admin/datautama"><i class="fa-solid fa-square-poll-vertical"></i><span> Data Utama</span></a>
            </li>

            <li>
                <a href="/admin/registrasi-wajah"><i class="fa-regular fa-user"></i><span> Registrasi Wajah Siswa</span></a>
            </li>
            
            <li class="menu-logout">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span> Keluar</span></a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        
        <header class="top-bar">
            <div class="header-left">
                <span class="route-info">Menu Admin / <b style="color: var(--text-dark);">Data Utama</b></span>
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
                    <h1>Master Data Utama</h1>
                    <p class="section-title">Kelola data dasar akademik sekolah seperti kelas, kurikulum, dan mata pelajaran</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Tahun Akademik</span>
                        <i class="fa-regular fa-calendar-check icon-card-bg"></i>
                    </div>
                    <span class="stats-number text-small">2025/2026 Ganjil</span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Kelas</span>
                        <i class="fa-solid fa-school icon-card-bg"></i>
                    </div>
                    <span class="stats-number">
                        {{ \App\Models\Kelas::count() }}
                    </span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Mata Pelajaran</span>
                        <i class="fa-solid fa-book-open icon-card-bg"></i>
                    </div>
                    <span class="stats-number">
                        {{ \App\Models\Mapel::count() }}
                    </span>
                </div>
            </div>

            <div class="two-column-grid">
                
               <div class="table-section">
                <div class="table-section-header">
                    <h4>Master Data Kelas</h4>
                    <a href="{{ route('admin.kelas.create') }}" class="btn-add-mini" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-solid fa-plus"></i> Kelas
                    </a>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 8%; text-align: center;">No</th>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th style="text-align: center; width: 15%;">Siswa</th>
                                <th style="text-align: center; width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse ($kelas_list as $index => $kelas)
                            <tr>
                    <td style="text-align: center;" class="text-mono">{{ $index + 1 }}</td>
                    <td class="bold-text">{{ $kelas->nama_kelas }}</td>                 
                    <td class="text-muted">{{ $kelas->wali_kelas }}</td>
                    <td style="text-align: center;" class="bold-text">{{ $kelas->jumlah_siswa }} anak</td>
                    <td style="text-align: center;">
                        <div class="action-buttons">
                            <a href="/admin/kelas/{{ $kelas->id }}/edit" class="btn-table btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            
                            <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST" onsubmit="return confirm('Hapus kelas ini dari sistem?')" style="display: inline;">
                                @csrf
                                @method('DELETE') <button type="submit" class="btn-table btn-delete" style="background: none; border: none; color: #e53e3e; cursor: pointer; padding: 0;">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #9ca3af; padding: 2rem;">
                        Belum ada data kelas yang terdaftar. Klik tombol "+ Kelas" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>


                        <div class="table-section">
                            <div class="table-section-header">
                                <h4>Master Mata Pelajaran</h4>
                                <a href="{{ route('admin.mapel.create') }}" class="btn-add-mini" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    <i class="fa-solid fa-plus"></i> Mapel
                                </a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 12%;">Kode Mapel</th>
                                            <th style="width: 28%;">Nama Mata Pelajaran</th>
                                            <th style="width: 25%;">Guru Pengampu</th> <th style="width: 20%;">Kategori / Kelompok</th>
                                            <th style="text-align: center; width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mapel_list as $mapel)
                                        <tr>
                                            <td class="text-mono">{{ $mapel->kode }}</td>
                                            
                                            <td class="bold-text">{{ $mapel->nama_mapel }}</td>

                                            <td style="color: #4b5563; font-weight: 500;">
                                                <i class="fa-solid fa-chalkboard-user" style="color: #9ca3af; margin-right: 0.35rem; font-size: 0.85rem;"></i>
                                                {{ $mapel->guru_pengampu ?? 'Belum Ditentukan' }}
                                            </td>
                                            
                                            <td>
                                                <span class="category-tag {{ Str::slug($mapel->kategori) == 'eksak' ? 'tag-eksak' : 'tag-bahasa' }}">
                                                    {{ $mapel->kategori }}
                                                </span>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="action-buttons" style="justify-content: center;">
                                                    <a href="/admin/mapel/{{ $mapel->id }}/edit" class="btn-table btn-edit">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    
                                                    <form action="{{ route('admin.mapel.destroy', $mapel->id) }}" method="POST" onsubmit="return confirm('Hapus kelas ini dari sistem?')" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <button type="submit" class="btn-table btn-delete" style="background: none; border: none; color: #e53e3e; cursor: pointer; padding: 0;">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center; color: #9ca3af; padding: 2rem;">
                                                <i class="fa-regular fa-folder-open" style="font-size: 1.5rem; display: block; margin-bottom: 0.5rem; color: #d1d5db;"></i>
                                                Belum ada data mata pelajaran yang terdaftar.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
<br>
            <div class="table-section">
                <div class="table-section-header">
                    <h4>Master Data Siswa</h4>
                    <a href="{{ route('admin.siswa.create') }}" class="btn-add-mini" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-solid fa-plus"></i> Siswa
                    </a>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 8%; text-align: center;">No</th>
                                <th>Nama Siswa</th>
                                <th>Nama Kelas</th>
                                <th style="text-align: center; width: 15%;">NIS</th>
                                <th style="text-align: center; width: 15%;">NISN</th>
                                <th style="text-align: center; width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa_list as $index => $siswas)
                            <tr>
                                <td style="text-align: center;" class="text-mono">{{ $index + 1 }}</td>
                                
                                <td class="bold-text">{{ $siswas->nama_siswa }}</td>
                                
                                <td class="text-muted">{{ $siswas->kelas->nama_kelas ?? 'Tanpa Kelas/Alumni' }}</td>
                                
                                <td style="text-align: center;" class="text-mono">{{ $siswas->nis }}</td>

                                <td style="text-align: center;" class="text-mono">{{ $siswas->nisn }}</td>
                                
                                <td style="text-align: center;">
                                    <div class="action-buttons" style="justify-content: center; display: flex; gap: 8px;">
                                        <a href="/admin/siswa/{{ $siswas->id }}/edit" class="btn-table btn-edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        
                                        <form action="/admin/siswa/{{ $siswas->id }}" method="POST" onsubmit="return confirm('Hapus data siswa ini dari sistem?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-table btn-delete" style="background: none; border: none; color: #e53e3e; cursor: pointer; padding: 0;">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: #9ca3af; padding: 2rem;">
                                    Belum ada data siswa yang terdaftar. Klik tombol "+ Siswa" untuk menambahkan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            
    </main>

</body>
</html>