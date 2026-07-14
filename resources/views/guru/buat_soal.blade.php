<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Buat Soal - CBT Guru</title>
    <link rel="stylesheet" href="{{ asset('css/buat-soal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    
    <style>
        /* Gaya tambahan agar form input rapi */
        .soal-builder-item { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0; position: relative; }
        .input-group-custom { margin-bottom: 12px; }
        .input-group-custom label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        .input-group-custom textarea, .input-group-custom input[type="text"] { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
        .pg-option-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
        .pg-option-row input[type="text"] { flex: 1; }
        .file-input-wrapper { font-size: 12px; color: #64748b; }
        .btn-delete-soal { position: absolute; top: 15px; right: 15px; background: #fee2e2; color: #ef4444; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

    <form action="{{ route('guru.soal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <header class="main-header">
            <div class="header-left">
                <a href="{{ route('guru.datasoal') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i></a>
                <h2>Buat Soal Ujian Baru</h2>
            </div>
            <div class="header-right">
                <button type="submit" class="btn-primary-green"><i class="fa-regular fa-floppy-disk"></i> Simpan Ujian</button>
            </div>
        </header>

        <section class="meta-section">
            <div class="meta-grid">
                <div class="meta-group">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" required>
                        <option value="">-- Pilih Mapel --</option>
                        @foreach($data_mapel as $mapel)
                            <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="meta-group">
                    <label>Kelas</label>
                    <select name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($data_kelas as $kelas)
                            <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="meta-group">
                    <label>Ujian / Penilaian</label>
                    <select name="nama_ujian" required>
                        <option value="Ulangan Harian">Ulangan Harian</option>
                        <option value="UTS">Ujian Tengah Semester</option>
                        <option value="UAS">Ujian Akhir Semester</option>
                    </select>
                </div>
                <div class="meta-group">
                    <label>Durasi (Menit)</label>
                    <input type="number" name="durasi" value="90" min="1" required>
                </div>
                <div class="meta-group">
                    <label>Tanggal Ujian</label>
                    <input type="date" name="tanggal_ujian" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>
        </section>

        <main class="content-layout">
            <div class="left-column">
                <div class="panel-card">
                    <div class="panel-header">
                        <h3>Konstruksi Lembar Soal</h3>
                        <div class="header-actions">
                            <button type="button" class="btn-add btn-pg" id="btnTambahPG"><i class="fa-solid fa-plus"></i> Tambah Pilihan Ganda</button>
                            <button type="button" class="btn-add btn-uraian" id="btnTambahUraian"><i class="fa-solid fa-plus"></i> Tambah Uraian</button>
                        </div>
                    </div>

                    <div id="container-soal"></div>

                </div>
            </div>

            <div class="right-column">
                <div class="sidebar-card">
                    <h4>Pengaturan Lembar Kerja</h4>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="acak_jawaban" value="1" checked> Acak pilihan jawaban (PG)</label>
                        <label><input type="checkbox" name="acak_soal" value="1" checked> Acak urutan soal siswa</label>
                    </div>
                </div>
                <div class="action-card-group">
                    <button type="submit" class="btn-block btn-warning-gold">Simpan & Terbitkan</button>
                </div>
            </div>
        </main>
    </form>

    <script>
        let soalCount = 0;
        const containerSoal = document.getElementById('container-soal');

        // Fungsi memperbarui nomor urut tampilan soal secara otomatis
        function updateNomorUrut() {
            const items = containerSoal.querySelectorAll('.soal-builder-item');
            items.forEach((item, index) => {
                item.querySelector('.nomor-soal-title').innerText = `Soal No. ${index + 1}`;
            });
        }

        // Event Handler Tombol Tambah Pilihan Ganda
        document.getElementById('btnTambahPG').addEventListener('click', () => {
            const index = soalCount++;
            const htmlPG = `
                <div class="soal-builder-item" data-type="pg">
                    <button type="button" class="btn-delete-soal" onclick="this.parentElement.remove(); updateNomorUrut();">Hapus</button>
                    <h4 class="nomor-soal-title" style="color: #10b981;">Soal No. -</h4>
                    <input type="hidden" name="soals[${index}][tipe]" value="pg">
                    
                    <div class="input-group-custom">
                        <label>Pertanyaan Soal (PG)</label>
                        <textarea name="soals[${index}][pertanyaan]" rows="3" placeholder="Tuliskan pertanyaan di sini..." required></textarea>
                        <div class="file-input-wrapper"><i class="fa-regular fa-image"></i> Upload Gambar Soal: <input type="file" name="soals[${index}][gambar_soal]" accept="image/*"></div>
                    </div>

                    <div class="input-group-custom">
                        <label>Pilihan Jawaban & Kunci</label>
                        ${['a', 'b', 'c', 'd', 'e'].map(letter => `
                            <div class="pg-option-row">
                                <input type="radio" name="soals[${index}][jawaban_benar]" value="${letter.toUpperCase()}" required title="Pilih sebagai kunci jawaban">
                                <strong>${letter.toUpperCase()}.</strong>
                                <input type="text" name="soals[${index}][${letter}]" placeholder="Teks pilihan ${letter.toUpperCase()}" required>
                                <input type="file" name="soals[${index}][gambar_${letter}]" accept="image/*" class="file-input-wrapper">
                            </div>
                        `).join('')}
                    </div>

                    <div class="input-group-custom" style="width: 150px;">
                        <label>Bobot Poin</label>
                        <input type="number" name="soals[${index}][poin]" value="5" min="1">
                    </div>
                </div>
            `;
            containerSoal.insertAdjacentHTML('beforeend', htmlPG);
            updateNomorUrut();
        });

        // Event Handler Tombol Tambah Uraian
        document.getElementById('btnTambahUraian').addEventListener('click', () => {
            const index = soalCount++;
            const htmlUraian = `
                <div class="soal-builder-item" data-type="essay">
                    <button type="button" class="btn-delete-soal" onclick="this.parentElement.remove(); updateNomorUrut();">Hapus</button>
                    <h4 class="nomor-soal-title" style="color: #f59e0b;">Soal No. -</h4>
                    <input type="hidden" name="soals[${index}][tipe]" value="essay">
                    
                    <div class="input-group-custom">
                        <label>Pertanyaan Soal Uraian / Essay</label>
                        <textarea name="soals[${index}][pertanyaan]" rows="4" placeholder="Tuliskan instruksi/soal uraian di sini..." required></textarea>
                        <div class="file-input-wrapper"><i class="fa-regular fa-image"></i> Upload Gambar Pendukung: <input type="file" name="soals[${index}][gambar_soal]" accept="image/*"></div>
                    </div>

                    <div class="input-group-custom" style="width: 150px;">
                        <label>Bobot Poin</label>
                        <input type="number" name="soals[${index}][poin]" value="10" min="1">
                    </div>
                </div>
            `;
            containerSoal.insertAdjacentHTML('beforeend', htmlUraian);
            updateNomorUrut();
        });
    </script>
</body>
</html>