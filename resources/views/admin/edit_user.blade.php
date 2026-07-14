<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/style-user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container-wrapper">
    <div class="header-inline" style="display: flex; align-items: center; margin-bottom: 20px;">
        <a href="/admin/user" class="btn-back" style="margin-right: 15px; color: #333; text-decoration: none;">
            <i class="fa-solid fa-arrow-left" style="font-size: 1.2rem;"></i>
        </a>
        <div>
            <h2 style="margin: 0; font-size: 1.5rem; color: #111;">Edit Data Pengguna</h2>
            <p style="margin: 5px 0 0 0; font-size: 0.9rem; color: #666;">Perbarui hak akses dan informasi pengguna di dalam sistem database</p>
        </div>
    </div>

    <div class="card-form" style="background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <h4 style="color: #1e5e3a; margin-top: 0; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-user-pen"></i> Formulir Perbarui Data Pengguna
        </h4>

        <form action="/admin/user/{{ $user->id }}/update" method="POST">
            @csrf
            

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; font-size: 0.85rem; color: #555; margin-bottom: 8px; text-transform: uppercase;">Nama Lengkap / Username</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fa-regular fa-user" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Contoh: budis123 atau Budi Santoso" required style="width: 100%; padding: 12px 12px 12px 45px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #f8fafc; box-sizing: border-box;">
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; font-size: 0.85rem; color: #555; margin-bottom: 8px; text-transform: uppercase;">Alamat Email</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fa-regular fa-envelope" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Contoh: budi@gmail.com" required style="width: 100%; padding: 12px 12px 12px 45px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #f8fafc; box-sizing: border-box;">
                </div>
            </div>

            <div class="row-flex" style="display: flex; gap: 20px; margin-bottom: 30px;">
                <div class="form-group" style="flex: 1;">
                    <label style="display: block; font-weight: bold; font-size: 0.85rem; color: #555; margin-bottom: 8px; text-transform: uppercase;">Hak Akses (Role)</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-sliders" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                        <select name="role" required style="width: 100%; padding: 12px 12px 12px 45px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #f8fafc; appearance: none; box-sizing: border-box;">
                            <option value="">Pilih Role...</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>Guru Pengampu</option>
                            <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label style="display: block; font-weight: bold; font-size: 0.85rem; color: #555; margin-bottom: 8px; text-transform: uppercase;">Password Akun (Kosongkan jika tidak diubah)</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-lock" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                        <input type="password" id="password" name="password" placeholder="Masukkan password baru" style="width: 100%; padding: 12px 45px 12px 45px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #f8fafc; box-sizing: border-box;">
                        <i class="fa-regular fa-eye" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #aaa; cursor: pointer;"></i>
                    </div>
                </div>
            </div>

            <div class="actions-wrapper" style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="/admin/user" class="btn-cancel" style="padding: 12px 25px; border: 1px solid #cbd5e1; border-radius: 8px; background: #fff; color: #333; text-decoration: none; font-weight: bold; font-size: 0.9rem;">Batal</a>
                <button type="submit" class="btn-save" style="padding: 12px 25px; border: none; border-radius: 8px; background: #0b5129; color: #fff; font-weight: bold; font-size: 0.9rem; cursor: pointer;">PERBARUI USER</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fitur sembunyikan/tampilkan password eye icon
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>