<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="{{ asset('css/style-kelas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container-wrapper" style="padding: 40px; background-color: #f4f7f6; min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="width: 100%; max-width: 800px;">
        
        <div class="header-inline" style="display: flex; align-items: center; margin-bottom: 25px;">
            <a href="/admin/kelas" class="btn-back" style="margin-right: 15px; color: #666; text-decoration: none; background: #fff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-arrow-left" style="font-size: 1rem;"></i>
            </a>
            <div>
                <h2 style="margin: 0; font-size: 1.6rem; color: #111; font-weight: 700;">Edit Kelas</h2>
                <p style="margin: 4px 0 0 0; font-size: 0.9rem; color: #777;">Menu Data Utama / Perbarui ruang kelas di dalam sistem</p>
            </div>
        </div>

        <div class="card-form" style="background: #fff; border-radius: 16px; padding: 35px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #edf2f7;">
            <h4 style="color: #0b5129; margin-top: 0; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; font-weight: 600;">
                <i class="fa-solid fa-school" style="color: #d4a373;"></i> Formulir Data Kelas
            </h4>

            <form action="/admin/kelas/{{ $kelas->id }}/update" method="POST">
                @csrf

                <div class="form-group" style="margin-bottom: 24px;">
                    <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Nama Kelas</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-laptop" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" placeholder="Contoh: X Teknik Komputer Jaringan 1" required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Nama Wali Kelas</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-user-tie" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                        <input type="text" name="wali_kelas" value="{{ old('wali_kelas', $kelas->wali_kelas) }}" placeholder="Contoh: Ahmad Subarjo, S.Pd." required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 35px;">
                    <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Jumlah Siswa</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-users" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                        <input type="text" value="{{ $kelas->siswas_count ?? 0 }}" readonly style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #718096; cursor: not-allowed;">
                    </div>
                </div>

                <div class="actions-wrapper" style="display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #edf2f7; padding-top: 25px;">
                    <a href="/admin/kelas" class="btn-cancel" style="padding: 12px 30px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fff; color: #4a5568; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; transition: all 0.2s;">Batal</a>
                    <button type="submit" class="btn-save" style="padding: 12px 30px; border: none; border-radius: 10px; background: #0b5129; color: #fff; font-weight: 600; font-size: 0.9rem; cursor: pointer; display: inline-flex; align-items: center; transition: all 0.2s;">SIMPAN KELAS</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>