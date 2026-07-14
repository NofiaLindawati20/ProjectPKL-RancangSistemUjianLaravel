<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Pelajaran</title>
    <link rel="stylesheet" href="{{ asset('css/style-kelas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container-wrapper" style="padding: 40px; background-color: #f4f7f6; min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="width: 100%; max-width: 800px;">
        
        <div class="header-inline" style="display: flex; align-items: center; margin-bottom: 25px;">
            <a href="/admin/datautama" class="btn-back" style="margin-right: 15px; color: #666; text-decoration: none; background: #fff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-arrow-left" style="font-size: 1rem;"></i>
            </a>
            <div>
                <h2 style="margin: 0; font-size: 1.6rem; color: #111; font-weight: 700;">Edit Mata Pelajaran</h2>
                <p style="margin: 4px 0 0 0; font-size: 0.9rem; color: #777;">Menu Data Utama / Perbarui jenis mata pelajaran ke dalam sistem</p>
            </div>
        </div>

        <div class="card-form" style="background: #fff; border-radius: 16px; padding: 35px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #edf2f7;">
            <h4 style="color: #0b5129; margin-top: 0; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; font-weight: 600;">
                <i class="fa-solid fa-book" style="color: #d4a373;"></i> Formulir Data Mata Pelajaran
            </h4>

            <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST">
                @csrf

                <div style="display: flex; gap: 20px; margin-bottom: 24px;">
                    <div class="form-group" style="flex: 1;">
                        <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Kode Mapel</label>
                        <div class="input-icon-wrapper" style="position: relative;">
                            <i class="fa-solid fa-barcode" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                            <input type="text" name="kode" value="{{ old('kode', $mapel->kode) }}" placeholder="Contoh: MP-001" required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748;">
                        </div>
                    </div>

                    <div class="form-group" style="flex: 1;">
                        <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Kategori / Kelompok</label>
                        <div class="input-icon-wrapper" style="position: relative;">
                            <i class="fa-solid fa-layer-group" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                            <select name="kategori" required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748; appearance: none; -webkit-appearance: none;">
                                <option value="" disabled selected>Pilih Kategori...</option>
                                <option value="Eksak" {{ old('kategori') == 'Eksak' ? 'selected' : '' }}>Eksak (MIPA)</option>
                                <option value="Bahasa" {{ old('kategori') == 'Bahasa' ? 'selected' : '' }}>Bahasa & Sastra</option>
                                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Ilmu Pengetahuan Sosial</option>
                                <option value="Produktif" {{ old('kategori') == 'ProduktifTKJ' ? 'selected' : '' }}>Kejuruan / Produktif TIK</option>
                                <option value="Produktif" {{ old('kategori') == 'ProduktifTKR' ? 'selected' : '' }}>Kejuruan / Produktif TKR</option>
                                <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Wajib / Umum</option>
                            </select>
                            <i class="fa-solid fa-chevron-down" style="position: absolute; right: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; pointer-events: none;"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Nama Mata Pelajaran</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-floppy-disk" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                        <input type="text" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}" placeholder="Contoh: Matematika Peminatan atau Pemrograman Berorientasi Objek" required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 35px;">
                    <label style="display: block; font-weight: 700; font-size: 0.8rem; color: #718096; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Guru Pengampu</label>
                    <div class="input-icon-wrapper" style="position: relative;">
                        <i class="fa-solid fa-chalkboard-user" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #a0aec0; font-size: 1.1rem;"></i>
                        <input type="text" name="guru_pengampu" value="{{ old('guru_pengampu', $mapel->guru_pengampu) }}" placeholder="Contoh: Sri Wahyuni, M.Kom." required style="width: 100%; padding: 14px 14px 14px 50px; border: 1px solid #e2e8f0; border-radius: 10px; background-color: #f8fafc; box-sizing: border-box; font-size: 0.95rem; color: #2d3748;">
                    </div>
                </div>

                <div class="actions-wrapper" style="display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #edf2f7; padding-top: 25px;">
                    <a href="/admin/datautama" class="btn-cancel" style="padding: 12px 30px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fff; color: #4a5568; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; transition: all 0.2s;">Batal</a>
                    <button type="submit" class="btn-save" style="padding: 12px 30px; border: none; border-radius: 10px; background: #0b5129; color: #fff; font-weight: 600; font-size: 0.9rem; cursor: pointer; display: inline-flex; align-items: center; transition: all 0.2s;">SIMPAN MAPEL</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>