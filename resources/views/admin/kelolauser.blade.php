<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style-kelola.css') }}">
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
            <li class="active">
                <a href="/admin/user"><i class="fa-regular fa-file-lines"></i><span> Kelola User</span></a>
            </li>
            <li>
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
                <span class="route-info">Menu Utama / <b style="color: var(--text-dark);">Kelola User</b></span>
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
                    <h1>Manajemen Pengguna</h1>
                    <p class="section-title">Tambah, edit, atau hapus data akses pengguna sistem</p>
                </div>
                <button class="btn-add-user" onclick="alert('Buka Modal / Halaman Tambah User')">
                    <i class="fa-solid fa-plus"></i> <a href="/admin/user/create"> Tambah User Baru </a>
                </button>
            </div>

            <div class="stats-grid">
                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Guru</span>
                        <i class="fa-solid fa-chalkboard-user icon-card-bg"></i>
                    </div>
                    <span class="stats-number">{{ $totalGuru }}</span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Siswa</span>
                        <i class="fa-solid fa-user-graduate icon-card-bg"></i>
                    </div>
                    <span class="stats-number">{{ $totalSiswa }}</span>
                </div>

                <div class="stats-card">
                    <div class="card-inner">
                        <span class="stats-label">Total Admin</span>
                        <i class="fa-solid fa-user-lock icon-card-bg"></i>
                    </div>
                    <span class="stats-number">{{ $totalAdmin }}</span>
                </div>
            </div>

            <div class="table-section">
    <div class="table-controls">
        <h4>Daftar Pengguna Sistem</h4>
        
        <form action="{{ route('admin.users') }}" method="GET" class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau username...">
        </form>
    </div>

    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th style="width: 8%; text-align: center;">ID</th>
                    <th>Nama Lengkap / Username</th>
                    <th>Alamat Email</th>
                    <th style="width: 15%; text-align: center;">Hak Akses (Role)</th>
                    <th style="width: 12%; text-align: center;">Status</th>
                    <th style="width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr>
                    <td style="text-align: center;" class="text-mono">{{ $index + 1 }}</td>
                    
                    <td class="user-name">{{ $user->name }}</td>
                    
                    <td class="text-muted">{{ $user->email }}</td>
                    
                    <td style="text-align: center;">
                        <span class="badge-role role-{{ $user->role }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <span class="status-dot dot-active"></span> Aktif
                    </td>
                    <td style="text-align: center;">
                        <div class="action-buttons">
                            <a href="/admin/user/{{ $user->id }}/edit" class="btn-table btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            
                            <form action="{{ route('admin.user.destroy', $user->id) }}"
                                method="POST" onsubmit="return confirm('Hapus User ini dari sistem?')"
                                style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus user ini?')" class="btn-table btn-delete" style="background: none; border: none; color: #e53e3e; cursor: pointer; padding: 0;">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>

                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #9ca3af; padding: 2rem;">
                        Data pengguna tidak ditemukan.
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