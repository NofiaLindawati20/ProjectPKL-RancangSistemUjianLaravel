<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Kerja Ujian - CBT System</title>
    <link rel="stylesheet" href="{{ asset('css/style-pengerjaan-soal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="exam-top-bar">
        <div class="exam-info-left">
            <div class="exam-badge-icon"><i class="fa-solid fa-file-lines"></i></div>
            <div class="exam-meta">
                <span class="exam-title">Penilaian Akhir Semester (PAS)</span>
                <span class="exam-subject">Matematika Peminatan • Kelas XII MIPA</span>
            </div>
        </div>
        
        <div class="exam-info-right">
            <div class="timer-box">
                <i class="fa-regular fa-clock animate-pulse"></i>
                <div class="timer-text">
                    <span class="timer-label">Sisa Waktu</span>
                    <span class="timer-countdown" id="countdown-timer">01:29:45</span>
                </div>
            </div>
            <div class="student-profile-tab">
                <span class="student-name">Muhammad Rafli</span>
                <span class="student-nis">NISN. 004812315</span>
            </div>
        </div>
    </header>

    <div class="exam-layout-container">
        
        <main class="question-working-area">
            
            <div class="question-card-header">
                <span class="current-number-badge">SOAL NOMOR 14</span>
                <span class="question-type-badge">Pilihan Ganda</span>
            </div>

            <div class="question-statement-box">
                <p>Diketahui fungsi <span class="math">f(x) = sin²(2x - π/3)</span>. Turunan pertama dari fungsi tersebut atau nilai dari <span class="math">f'(x)</span> adalah...</p>
                
                </div>

            <div class="options-list-container">
                
                <label class="option-item-card">
                    <input type="radio" name="answer_option" value="A" class="radio-hidden">
                    <span class="option-alphabet">A</span>
                    <div class="option-text-content">
                        <span class="math">2 sin(2x - π/3)</span>
                    </div>
                </label>

                <label class="option-item-card option-selected">
                    <input type="radio" name="answer_option" value="B" class="radio-hidden" checked>
                    <span class="option-alphabet">B</span>
                    <div class="option-text-content">
                        <span class="math">2 sin(4x - 2π/3)</span>
                    </div>
                </label>

                <label class="option-item-card">
                    <input type="radio" name="answer_option" value="C" class="radio-hidden">
                    <span class="option-alphabet">C</span>
                    <div class="option-text-content">
                        <span class="math">2 cos(4x - 2π/3)</span>
                    </div>
                </label>

                <label class="option-item-card">
                    <input type="radio" name="answer_option" value="D" class="radio-hidden">
                    <span class="option-alphabet">D</span>
                    <div class="option-text-content">
                        <span class="math">-2 sin(4x - 2π/3)</span>
                    </div>
                </label>

                <label class="option-item-card">
                    <input type="radio" name="answer_option" value="E" class="radio-hidden">
                    <span class="option-alphabet">E</span>
                    <div class="option-text-content">
                        <span class="math">-2 cos(4x - 2π/3)</span>
                    </div>
                </label>

            </div>

            <div class="action-navigation-bar">
                <button class="btn-nav btn-prev"><i class="fa-solid fa-arrow-left"></i> Soal Sebelumnya</button>
                
                <label class="btn-ragu-checkbox">
                    <input type="checkbox" id="check-ragu">
                    <span class="ragu-custom-box"><i class="fa-solid fa-warning"></i> Ragu-Ragu</span>
                </label>
                
                <button class="btn-nav btn-next">Soal Berikutnya <i class="fa-solid fa-arrow-right"></i></button>
            </div>

        </main>

        <aside class="exam-sidebar-navigation">
            <div class="sidebar-nav-header">
                <h4><i class="fa-solid fa-grip"></i> Navigasi Soal</h4>
                <span class="answered-counter">Terjawab: <b>12 / 40</b></span>
            </div>

            <div class="numbers-grid-container">
                <div class="num-box status-answered">1</div>
                <div class="num-box status-answered">2</div>
                <div class="num-box status-answered">3</div>
                <div class="num-box status-answered">4</div>
                <div class="num-box status-answered">5</div>
                <div class="num-box status-answered">6</div>
                <div class="num-box status-answered">7</div>
                <div class="num-box status-answered">8</div>
                <div class="num-box status-answered">9</div>
                <div class="num-box status-answered">10</div>

                <div class="num-box status-answered">11</div>
                <div class="num-box status-answered">12</div>
                <div class="num-box status-unanswered">13</div>
                
                <div class="num-box status-current">14</div>
                
                <div class="num-box status-doubtful">15</div>

                <div class="num-box status-unanswered">16</div>
                <div class="num-box status-unanswered">17</div>
                <div class="num-box status-unanswered">18</div>
                <div class="num-box status-unanswered">19</div>
                <div class="num-box status-unanswered">20</div>
                <div class="num-box status-unanswered">21</div>
                <div class="num-box status-unanswered">22</div>
                <div class="num-box status-unanswered">23</div>
                <div class="num-box status-unanswered">24</div>
                <div class="num-box status-unanswered">25</div>
                <div class="num-box status-unanswered">26</div>
                <div class="num-box status-unanswered">27</div>
                <div class="num-box status-unanswered">28</div>
                <div class="num-box status-unanswered">29</div>
                <div class="num-box status-unanswered">30</div>
                <div class="num-box status-unanswered">31</div>
                <div class="num-box status-unanswered">32</div>
                <div class="num-box status-unanswered">33</div>
                <div class="num-box status-unanswered">34</div>
                <div class="num-box status-unanswered">35</div>
                <div class="num-box status-unanswered">36</div>
                <div class="num-box status-unanswered">37</div>
                <div class="num-box status-unanswered">38</div>
                <div class="num-box status-unanswered">39</div>
                <div class="num-box status-unanswered">40</div>
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
        // Logika sederhana untuk interaktivitas pilihan ganda
        const optionCards = document.querySelectorAll('.option-item-card');
        optionCards.forEach(card => {
            card.addEventListener('click', function() {
                optionCards.forEach(c => c.classList.remove('option-selected'));
                this.classList.add('option-selected');
            });
        });

        function confirmFinishExam() {
            if(confirm("Apakah Anda yakin ingin menyelesaikan ujian ini? Pastikan semua soal telah diperiksa kembali.")) {
                alert("Jawaban berhasil dikunci dan dikirim ke bank data guru.");
                // Arahkan ke halaman selesai
            }
        }
    </script>

</body>
</html>