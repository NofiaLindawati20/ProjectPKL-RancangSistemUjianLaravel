<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Siswa Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f1f5f9; padding: 40px; margin: 0; }
        .form-container { max-width: 600px; background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin: 0 auto; }
        
        /* 🌟 Styling tambahan untuk tombol kembali di header */
        .form-header { border-bottom: 2px solid #f1f5f9; margin-bottom: 20px; padding-bottom: 15px; display: flex; align-items: center; gap: 15px; }
        .btn-back { display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: #f1f5f9; color: #475569; border-radius: 8px; text-decoration: none; transition: all 0.2s; border: 1px solid #e2e8f0; }
        .btn-back:hover { background-color: #e2e8f0; color: #1e293b; }
        
        .form-header h2 { margin: 0; color: #1e293b; font-size: 22px; display: flex; align-items: center; gap: 8px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #475569; font-size: 14px; }
        .form-control { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; font-size: 14px; color: #334155; }
        .form-control:focus { outline: none; border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
        .btn-submit { background-color: #10b981; color: white; border: none; padding: 12px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: bold; width: 100%; transition: background 0.2s; }
        .btn-submit:hover { background-color: #059669; }
        .alert { padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; }
        .alert-success { background-color: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
        .alert-danger { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; }
    </style>
</head>
<body>

    <div class="form-container">
        <div class="form-header">
            <a href="{{ url('/admin/datautama') }}" class="btn-back" title="Kembali ke Data Utama">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2><i class="fa-solid fa-user-plus" style="color: #10b981;"></i> Tambah Data Siswa Baru</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success"><i class="fa-regular fa-circle-check"></i> {{ session('success') }}</div>
        @endif
        @if(session('error') || $errors->any())
            <div class="alert alert-danger">
                <i class="fa-solid fa-triangle-exclamation"></i> Mohon periksa kembali inputan Anda.
            </div>
        @endif

        <form action="{{ route('admin.siswa.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}" placeholder="Contoh: Budi Santoso" required>
            </div>

            <div class="form-group">
                <label>Kelas Asal</label>
                <select name="kelas_id" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($data_kelas as $kelas)
                        <option value="{{ $kelas->id }}" {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>NIS (Nomor Induk Siswa)</label>
                <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" placeholder="Contoh: 22231010" required>
            </div>

            <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" placeholder="Contoh: 0061234567" required>
            </div>

            <hr style="border: 0; height: 1px; background: #e2e8f0; margin: 25px 0;">
            <p style="font-size: 12px; color: #64748b; font-weight: bold; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Kredensial Akun Login Siswa</p>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="budi@siswa.com" required>
            </div>

            <div class="form-group">
                <label>Kata Sandi Akun</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
            </div>

            <button type="submit" class="btn-submit"><i class="fa-regular fa-paper-plane"></i> Daftarkan Siswa & Akun</button>
        </form>
    </div>

</body>
</html>