<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Pelajaran - CBT Admin</title>
    <link rel="stylesheet" href="{{ asset('css/tambah-mapel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="page-background">

    <div class="main-container">
        <div class="page-header">
            <a href="{{ route('admin.datautama') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-text">
                <h1>Edit Mata Pelajaran</h1>
                <p>Menu Data Utama / Perbarui jenis mata pelajaran di dalam sistem</p>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <h4>
                    <i class="fa-solid fa-book-open icon-gold"></i> Formulir Data Mata Pelajaran
                </h4>
            </div>

            <form action="{{ route('admin.mapel.store') }}" method="POST" class="form-body">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label class="input-label">Kode Mapel</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-barcode"></i></span>
                            <input type="text" name="kode" value="{{ old('kode') }}" placeholder="Contoh: MP-001" required class="form-input">
                        </div>
                        @error('kode') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="input-label">Kategori / Kelompok</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-layer-group"></i></span>
                            <select name="kategori" required class="form-input select-appearance">
                                <option value="" disabled>Pilih Kategori...</option>
                                <option value="Eksak" {{ old('kategori') == 'Eksak' ? 'selected' : '' }}>Eksak (MIPA)</option>
                                <option value="Bahasa" {{ old('kategori') == 'Bahasa' ? 'selected' : '' }}>Bahasa & Sastra</option>
                                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Ilmu Pengetahuan Sosial</option>
                                <option value="Produktif" {{ old('kategori') == 'ProduktifTKJ' ? 'selected' : '' }}>Kejuruan / Produktif TKJ</option>
                                <option value="Produktif" {{ old('kategori') == 'ProduktifTKR' ? 'selected' : '' }}>Kejuruan / Produktif TKR</option>
                                <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Wajib / Umum</option>
                            </select>
                            <span class="select-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                        </div>
                        @error('kategori') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Nama Mata Pelajaran</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-book"></i></span>
                        <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}" placeholder="Contoh: Matematika Peminatan atau Pemrograman Berorientasi Objek" required class="form-input">
                    </div>
                    @error('nama_mapel') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="input-label">Guru Pengampu</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <input type="text" name="guru_pengampu" value="{{ old('guru_pengampu') }}" placeholder="Contoh: Sri Wahyuni, M.Kom." required class="form-input">
                    </div>
                    @error('guru_pengampu') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-footer">
                    <a href="{{ route('admin.datautama') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">PERBARUI MAPEL</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>