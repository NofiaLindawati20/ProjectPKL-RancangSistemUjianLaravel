<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Ujian Online</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="bg-shape shape-top-left"></div>
    <div class="bg-shape shape-bottom-right"></div>

    <div class="login-container">
        <div class="logo-wrapper">
            <div class="logo-placeholder">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>

        <h2>Selamat Datang!</h2>
        <h3>Aplikasi Ujian & Manajemen Online</h3>
        <p class="subtitle">Masuk untuk melanjutkan</p>

        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div style="color:red; margin-bottom:10px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf

            {{-- EMAIL --}}
            <div class="input-group">
                <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                <input type="text" name="email" placeholder="Email atau Username" required>
            </div>

            {{-- PASSWORD --}}
            <div class="input-group">
                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <i class="fa-regular fa-eye" id="eye-icon"></i>
                </span>
            </div>

            {{-- ROLE --}}
            <div class="role-selection-wrapper">
                <label class="role-label">Login Sebagai:</label>
                <div class="switch-user-container">
                    <input type="radio" name="role" id="siswa" value="siswa" checked>
                    <label for="siswa" class="role-tab">Siswa</label>

                    <input type="radio" name="role" id="guru" value="guru">
                    <label for="guru" class="role-tab">Guru</label>

                    <input type="radio" name="role" id="admin" value="admin">
                    <label for="admin" class="role-tab">Admin</label>

                    <input type="radio" name="role" id="pengawas" value="pengawas">
                    <label for="pengawas" class="role-tab">Pengawas</label>
                    
                    <div class="tab-slider"></div>
                </div>
            </div>

            <div class="form-footer-links">
                <a href="#" class="forgot-password">Lupa Password?</a>
            </div>

            <button type="submit" class="btn-submit">MASUK</button>
        </form>

        <div class="card-footer">
            <p>Belum punya akun? <a href="#">Hubungi admin sekolah</a></p>
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