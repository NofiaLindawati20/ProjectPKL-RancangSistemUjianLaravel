<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru - CBT Admin</title>
    <link rel="stylesheet" href="{{ asset('css/tambah-kelas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="page-background">

    <div class="main-container">
        <div class="page-header">
            <a href="{{ route('admin.datautama') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-text">
                <h1>Tambah Kelas Baru</h1>
                <p>Menu Data Utama / Daftarkan ruang kelas baru ke dalam sistem</p>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <h4>
                    <i class="fa-solid fa-school icon-gold"></i> Formulir Data Kelas
                </h4>
            </div>

            <form action="{{ route('admin.kelas.store') }}" method="POST" class="form-body">
                @csrf

                <div class="form-group">
                    <label class="input-label">Nama Kelas</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-chalkboard"></i></span>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}" placeholder="Contoh: X Teknik Komputer Jaringan 1" required class="form-input">
                    </div>
                    @error('nama_kelas') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="input-label">Nama Wali Kelas</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-user-tie"></i></span>
                        <input type="text" name="wali_kelas" value="{{ old('wali_kelas') }}" placeholder="Contoh: Ahmad Subarjo, S.Pd." required class="form-input">
                    </div>
                    @error('wali_kelas') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="input-label">Jumlah Siswa</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-users"></i></span>
                        <input type="number" name="jumlah_siswa" value="{{ old('jumlah_siswa', 0) }}" min="0" placeholder="Contoh: 36" required class="form-input">
                    </div>
                    @error('jumlah_siswa') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-footer">
                    <a href="{{ route('admin.users') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">SIMPAN KELAS</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>