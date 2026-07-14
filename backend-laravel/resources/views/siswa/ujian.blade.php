<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Kerja Ujian - CBT System</title>
    <link rel="stylesheet" href="{{ asset('css/style-pengerjaan-soal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <header class="exam-top-bar">
        <div class="exam-info-left">
            <div class="exam-badge-icon"><i class="fa-solid fa-file-lines"></i></div>
            <div class="exam-meta">
                <span class="exam-title">{{ $ujian->nama_ujian ?? 'Ulangan Harian' }}</span>
                <span class="exam-subject">{{ $ujian->mapel->nama_mapel ?? 'Mata Pelajaran' }}</span>
            </div>
        </div>
        
        <div class="exam-info-right">
            <div class="timer-box">
                <i class="fa-regular fa-clock animate-pulse"></i>
                <div class="timer-text">
                    <span class="timer-label">Sisa Waktu</span>
                    <span class="timer-countdown" id="countdown-timer">01:29:37</span>
                </div>
            </div>
            <div class="student-profile-tab">
                <span class="student-name">{{ auth()->user()->name ?? 'Nama Siswa' }}</span>
                <span class="student-nis">NISN. {{ auth()->user()->nisn ?? '00000000' }}</span>
            </div>
        </div>
    </header>

    <div class="exam-layout-container">
        
        <main class="question-working-area">
            
            <div class="question-card-header">
                <span class="current-number-badge">SOAL NOMOR {{ $current_number }}</span>
                @php
                    $jenis = strtolower(trim($soal->jenis_soal ?? 'pg'));
                    $is_essay = ($jenis == 'essay' || $jenis == 'uraian' || $jenis == 'esay');
                @endphp
                <span class="question-type-badge">
                    {{ $is_essay ? 'Essay / Uraian' : 'Pilihan Ganda' }}
                </span>
            </div>

            <div class="question-statement-box">
                @php
                    $pertanyaan = $soal->teks_soal ?? $soal->isi_soal ?? $soal->soal ?? $soal->pertanyaan ?? '';
                @endphp

                <div class="question-text-content">
                    @if(!empty($pertanyaan))
                        {!! $pertanyaan !!}
                    @else
                        <p style="color:#ef4444; font-weight: bold;"><i class="fa-solid fa-circle-exclamation"></i> Konten teks soal tidak ditemukan di database.</p>
                    @endif
                </div>
            </div>

            <div class="options-container" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                
                @if($is_essay)
                    <div class="essay-box" style="display: flex; flex-direction: column; gap: 15px;">
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:10px; color:#1e293b;">
                                <i class="fa-solid fa-pen-clip"></i> Jawaban Uraian Tulis:
                            </label>
                            <textarea id="essay-input" rows="6" placeholder="Ketik jawaban lengkap Anda di sini..." 
                                      style="width:100%; padding:15px; border-radius:12px; border:2px solid #edf2f7; font-size:1rem; outline:none; resize:vertical; font-family: inherit;"
                                      onchange="saveProgressAjax('{{ $soal->id }}', this.value)">{{ $jawaban_saved ?? '' }}</textarea>
                        </div>

                        <div class="upload-photo-section" style="border: 2px dashed #cbd5e1; padding: 20px; border-radius:12px; background: #f8fafc;">
                            <label style="display:block; font-weight:bold; margin-bottom:8px; color:#1e293b;">
                                <i class="fa-solid fa-camera"></i> Lampiran Foto Jawaban (Opsional):
                            </label>
                            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px;">Jika jawaban ditulis di kertas, Anda bisa memfoto dan mengunggahnya di sini (Format: JPG, JPEG, PNG).</p>
                            
                            <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                <input type="file" id="foto-jawaban-input" accept="image/*" style="display: none;" onchange="uploadFotoJawaban('{{ $soal->id }}')">
                                <button type="button" onclick="document.getElementById('foto-jawaban-input').click()" style="background: #0f172a; color:#fff; border:none; padding: 10px 18px; border-radius:8px; font-weight:600; cursor:pointer; display:inline-flex; align-items:center; gap:8px;">
                                    <i class="fa-solid fa-cloud-arrow-up"></i> Pilih Gambar
                                </button>
                                <span id="upload-status-text" style="font-size:0.9rem; color:#475569; font-weight: 500;">
                                    {{ isset($soal->foto_jawaban) && $soal->foto_jawaban ? '✓ Foto jawaban terunggah' : 'Belum ada file terpilih' }}
                                </span>
                            </div>

                            <div id="photo-preview-container" style="margin-top: 15px; display: {{ (isset($soal->foto_jawaban) && $soal->foto_jawaban) ? 'block' : 'none' }};">
                                <img id="photo-preview" src="{{ isset($soal->foto_jawaban) ? asset('storage/' . $soal->foto_jawaban) : '#' }}" alt="Preview" style="max-height: 180px; border-radius: 8px; border: 1px solid #cbd5e1;">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="options-list-container" style="display: flex; flex-direction: column; gap: 12px;">
                        @foreach(['A', 'B', 'C', 'D', 'E'] as $opsi)
                            @php 
                                $field_opsi = 'opsi_' . strtolower($opsi);
                                // Mengamankan jika property database null atau kosong agar tidak error
                                $isi_opsi = $soal->$field_opsi ?? null;
                                $is_selected = ($jawaban_saved ?? '') == $opsi;
                            @endphp

                            @if(!empty(trim($isi_opsi)))
                                <label class="option-item-card {{ $is_selected ? 'option-selected' : '' }}" style="border: 2px solid {{ $is_selected ? '#0b5129' : '#edf2f7' }}; padding: 1rem; border-radius: 12px; display: flex; align-items: center; gap: 12px; cursor: pointer; background: #fff;">
                                    <input type="radio" name="answer_option" value="{{ $opsi }}" class="radio-hidden" 
                                           {{ $is_selected ? 'checked' : '' }}
                                           onclick="selectOption(this, '{{ $soal->id }}', '{{ $opsi }}')">
                                    <span class="option-alphabet" style="font-weight: bold; background: {{ $is_selected ? '#0b5129' : '#f1f5f9' }}; color: {{ $is_selected ? '#fff' : '#0f172a' }}; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">{{ $opsi }}</span>
                                    <div class="option-text-content" style="color: #334155;">
                                        <span>{!! $isi_opsi !!}</span>
                                    </div>
                                </label>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="action-navigation-bar">
                <button class="btn-nav btn-prev" onclick="navigateSoal({{ $current_number - 1 }})" {{ $current_number == 1 ? 'disabled' : '' }}>
                    <i class="fa-solid fa-arrow-left"></i> Soal Sebelumnya
                </button>
                
                <label class="btn-ragu-checkbox" id="label-ragu" style="background-color: {{ $is_ragu ? '#f1c40f' : '#fff' }}; border: 2px solid #f1c40f; color: {{ $is_ragu ? '#fff' : '#f39c12' }}; padding: 0.6rem 1.5rem; border-radius: 10px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;">
                    <input type="checkbox" id="check-ragu" style="display: none;" {{ $is_ragu ? 'checked' : '' }} onchange="toggleRagu('{{ $soal->id }}', this.checked)">
                    <i class="fa-solid fa-warning"></i> <span id="text-ragu">{{ $is_ragu ? 'Terpilih Ragu' : 'Ragu-Ragu' }}</span>
                </label>
                
                <button class="btn-nav btn-next" onclick="navigateSoal({{ $current_number + 1 }})" {{ $current_number == count($all_soal_ids) ? 'disabled' : '' }}>
                    Soal Berikutnya <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

        </main>

        <aside class="exam-sidebar-navigation">
            <div class="sidebar-nav-header">
                <h4><i class="fa-solid fa-grip"></i> Navigasi Soal</h4>
                <span class="answered-counter">Terjawab: <b>{{ $total_terjawab }} / {{ count($all_soal_ids) }}</b></span>
            </div>

            <div class="numbers-grid-container">
                @foreach($all_soal_ids as $index => $idSoal)
                    @php
                        $no = $index + 1;
                        $status_class = 'status-unanswered';
                        
                        if($no == $current_number) {
                            $status_class = 'status-current';
                        } elseif(isset($list_status_jawaban[$idSoal])) {
                            if($list_status_jawaban[$idSoal]['ragu']) {
                                $status_class = 'status-doubtful';
                            } elseif($list_status_jawaban[$idSoal]['terisi']) {
                                $status_class = 'status-answered';
                            }
                        }
                    @endphp
                    <div class="num-box {{ $status_class }}" onclick="navigateSoal({{ $no }})">
                        {{ $no }}
                    </div>
                @endforeach
            </div>

            <div class="nav-legend-box">
                <div class="legend-item"><div class="leg-color status-current"></div> <span>Aktif</span></div>
                <div class="legend-item"><div class="leg-color status-answered"></div> <span>Terjawab</span></div>
                <div class="legend-item"><div class="leg-color status-doubtful"></div> <span>Ragu-Ragu</span></div>
                <div class="legend-item"><div class="leg-color status-unanswered"></div> <span>Belum Diisi</span></div>
            </div>

            <button class="btn-finish-exam" onclick="confirmFinishExam()">
                <i class="fa-solid fa-circle-check"></i> Selesai & Kirim Jawaban
            </button>
        </aside>

    </div>

    <script>
        function navigateSoal(page) {
            window.location.href = `?page=${page}`;
        }

        function selectOption(inputElement, soalId, opsi) {
            const allCards = inputElement.closest('.options-list-container').querySelectorAll('.option-item-card');
            allCards.forEach(c => {
                c.classList.remove('option-selected');
                c.style.borderColor = '#edf2f7';
                c.querySelector('.option-alphabet').style.background = '#f1f5f9';
                c.querySelector('.option-alphabet').style.color = '#0f172a';
            });

            const currentCard = inputElement.closest('.option-item-card');
            currentCard.classList.add('option-selected');
            currentCard.style.borderColor = '#0b5129';
            currentCard.querySelector('.option-alphabet').style.background = '#0b5129';
            currentCard.querySelector('.option-alphabet').style.color = '#fff';
            
            saveProgressAjax(soalId, opsi);
        }

        // AMAN: Reload halaman baru dieksekusi setelah data benar-benar sukses masuk database
        function saveProgressAjax(soalId, nilaiJawaban) {
            fetch('/siswa/ujian/save-ajax', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    soal_id: soalId,
                    jawaban: nilaiJawaban
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Progress tersimpan");
                // Menghindari flash refresh mengganggu kenyamanan mengetik essay, reload hanya untuk update counter/warna sidebar
                if(document.getElementById('essay-input') === null) {
                    location.reload();
                }
            })
            .catch(err => console.error("Auto-save terhambat: ", err));
        }

        // FUNGSI AJAX UNTUK PROSES UPLOAD FOTO URAIAN
        function uploadFotoJawaban(soalId) {
            const fileInput = document.getElementById('foto-jawaban-input');
            const statusText = document.getElementById('upload-status-text');
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImg = document.getElementById('photo-preview');

            if (fileInput.files.length === 0) return;

            statusText.innerText = "Mengunggah file...";
            
            const formData = new FormData();
            formData.append('soal_id', soalId);
            formData.append('foto_jawaban', fileInput.files[0]);

            fetch('/siswa/ujian/upload-foto', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    statusText.innerText = "✓ Foto jawaban berhasil diunggah!";
                    statusText.style.color = "#16a34a";
                    previewImg.src = data.path;
                    previewContainer.style.display = "block";
                } else {
                    statusText.innerText = "❌ Gagal unggah: " + data.message;
                    statusText.style.color = "#dc2626";
                }
            })
            .catch(err => {
                statusText.innerText = "❌ Terjadi kesalahan jaringan.";
                statusText.style.color = "#dc2626";
            });
        }

        // KUNCI PERBAIKAN: Fungsi async dan perbaikan CSS instant tanpa memotong jalur fetch database
        function toggleRagu(soalId, isChecked) {
            const labelRagu = document.getElementById('label-ragu');
            const textRagu = document.getElementById('text-ragu');
            const statusRaguVal = isChecked ? 1 : 0;

            if(isChecked) {
                labelRagu.style.backgroundColor = '#f1c40f';
                labelRagu.style.color = '#fff';
                textRagu.innerText = 'Terpilih Ragu';
            } else {
                labelRagu.style.backgroundColor = '#fff';
                labelRagu.style.color = '#f39c12';
                textRagu.innerText = 'Ragu-Ragu';
            }

            fetch('/siswa/ujian/toggle-ragu', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ soal_id: soalId, ragu: statusRaguVal })
            })
            .then(() => {
                console.log("Status ragu tersimpan di DB.");
            });
        }

        function confirmFinishExam() {
            if(confirm("Apakah Anda yakin ingin menyelesaikan ujian ini?")) {
                window.location.href = "/siswa/dashboard";
            }
        }
    </script>
</body>
</html>