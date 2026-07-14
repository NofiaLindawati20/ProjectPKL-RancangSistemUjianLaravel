<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru - CBT Admin</title>
    <link rel="stylesheet" href="{{ asset('css/tambah-user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="page-background">

    <div class="main-container">
        <div class="page-header">
            <a href="{{ route('admin.users') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-text">
                <h1>Tambah User Baru</h1>
                <p>Daftarkan hak akses pengguna baru ke dalam sistem database</p>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <h4>
                    <i class="fa-solid fa-user-plus icon-gold"></i> Formulir Data Pengguna
                </h4>
            </div>

            <form action="{{ route('admin.user.store') }}" method="POST" class="form-body">
                @csrf

                <div class="form-group">
                    <label class="input-label">Nama Lengkap / Username</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-regular fa-user"></i></span>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: budis123 atau Budi Santoso" required class="form-input">
                    </div>
                    @error('name') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="input-label">Alamat Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Contoh: budi@gmail.com" required class="form-input">
                    </div>
                    @error('email') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="input-label">Hak Akses (Role)</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-sliders"></i></span>
                            <select name="role" required class="form-input select-appearance">
                                <option value="" disabled selected>Pilih Role...</option>
                                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="pengawas" {{ old('role') == 'pengawas' ? 'selected' : '' }}>Pengawas</option>
                            </select>
                            <span class="select-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                        </div>
                        @error('role') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="input-label">Password Akun</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required class="form-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fa-regular fa-eye" id="eye-icon"></i>
                            </span>
                        </div>
                        @error('password') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <a href="{{ route('admin.users') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">SIMPAN USER</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>