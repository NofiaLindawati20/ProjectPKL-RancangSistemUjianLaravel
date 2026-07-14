<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT - SMK Assalafiyah Kota Tegal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-green: #0b5129;
            --primary-green-hover: #073a1d;
            --accent-yellow: #f1c40f;
            --accent-yellow-hover: #f39c12;
            --bg-light: #f4f7f6;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Navbar Style */
        nav {
            background: #ffffff;
            padding: 1.2rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            background: var(--primary-green);
            color: var(--accent-yellow);
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            box-shadow: 0 4px 10px rgba(11, 81, 41, 0.2);
        }

        .brand-text h1 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary-green);
            line-height: 1.1;
        }

        .brand-text p {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .nav-btn {
            background: transparent;
            color: var(--primary-green);
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.95rem;
            border: 2px solid var(--primary-green);
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background: var(--primary-green);
            color: #ffffff;
        }

        /* Hero Section */
        .hero-container {
            flex: 1;
            max-width: 1300px;
            margin: 0 auto;
            padding: 4rem 5%;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 4rem;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .badge {
            background: rgba(11, 81, 41, 0.08);
            color: var(--primary-green);
            padding: 0.5rem 1.2rem;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            border: 1px solid rgba(11, 81, 41, 0.15);
        }

        .badge i {
            color: var(--accent-yellow-hover);
        }

        .hero-title {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.15;
            color: var(--primary-green);
        }

        .hero-title span {
            color: #b38600; /* Warna kuning gelap kontras */
            position: relative;
        }

        .hero-description {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 550px;
        }

        /* Login Card */
        .card-login {
            background: #ffffff;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
            position: relative;
        }

        .card-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-green), var(--accent-yellow));
            border-radius: 24px 24px 0 0;
        }

        .card-header-text {
            margin-bottom: 2rem;
            text-align: center;
        }

        .card-header-text h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 0.3rem;
        }

        .card-header-text p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .btn-action-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn-portal {
            width: 100%;
            padding: 1rem;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
        }

        .btn-student {
            background: linear-gradient(135deg, var(--primary-green), #146e39);
            color: #ffffff;
        }

        .btn-student:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(11, 81, 41, 0.3);
        }

        .btn-admin {
            background: #ffffff;
            color: var(--primary-green);
            border: 2px solid #edf2f7;
        }

        .btn-admin:hover {
            background: #f8fafc;
            border-color: rgba(11, 81, 41, 0.3);
        }

        /* Info Features Layout */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid #edf2f7;
            padding: 1.2rem;
            border-radius: 16px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .feature-icon {
            background: #ffffff;
            color: var(--primary-green);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            border: 1px solid #edf2f7;
        }

        .feature-info h5 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .feature-info p {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Footer */
        footer {
            background: #ffffff;
            padding: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
            border-top: 1px solid #edf2f7;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                padding: 2rem 5%;
            }
            .hero-title {
                font-size: 2.4rem;
                text-align: center;
            }
            .hero-description, .badge {
                margin: 0 auto;
                text-align: center;
            }
            .features-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="brand">
            <div class="brand-logo">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="brand-text">
                <h1>CBT ASSALAFIYAH</h1>
                <p>SMK ASSALAFIYAH KOTA TEGAL</p>
            </div>
        </div>
    </nav>

    <div class="hero-container">
        
        <div class="hero-content">
            <div class="badge">
                <i class="fa-solid fa-circle-check"></i> Computer Based Test (CBT) System v2.0
            </div>
            <h2 class="hero-title">
                Sistem Ujian Online <br>
                <span>SMK Assalafiyah</span> <br>
                Kota Tegal
            </h2>
            <p class="hero-description">
                Selamat datang di Platform Ujian Berbasis Komputer Resmi SMK Assalafiyah Kota Tegal. Media pelaksanaan Penilaian Harian, UTS, UAS, dan Ujian Sekolah secara transparan, efektif, dan jujur.
            </p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="feature-info">
                        <h5>Ujian Aman</h5>
                        <p>Anti-curang & terpantau.</p>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <div class="feature-info">
                        <h5>Hasil Realtime</h5>
                        <p>Nilai langsung terdata.</p>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-user-lock"></i></div>
                    <div class="feature-info">
                        <h5>Akses Mudah</h5>
                        <p>Gunakan akun terdaftar.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-sidebar">
            <div class="card-login">
                <div class="card-header-text">
                    <h3>Pintu Gerbang Portal</h3>
                    <p>Silakan pilih gerbang masuk sesuai hak akses Anda</p>
                </div>

                <div class="btn-action-group">
                    <a href="/login" class="btn-portal btn-student">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>MASUK SEBAGAI SISWA</span>
                    </a>
                    
                    <a href="/login" class="btn-portal btn-admin">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>PORTAL GURU / ADMIN</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <footer>
        &copy; 2026 CBT SMK Assalafiyah Kota Tegal. Seluruh Hak Cipta Dilindungi.
    </footer>

</body>
</html>