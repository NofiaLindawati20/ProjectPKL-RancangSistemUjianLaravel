<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Wajah Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style-registrasi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="reg-container">
    <div class="reg-header">
        <a href="{{ url('/admin') }}" class="btn-back" title="Kembali ke Data Utama">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        <h2>Pendaftaran Vektor Wajah</h2>
        <p>Pilih siswa dan ambil data wajah untuk verifikasi ujian</p>
    </div>

    <div class="form-group">
        <label for="siswa_id">Pilih Siswa:</label>
        <select id="siswa_id" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }} (Kelas: {{ $siswa->kelas->nama_kelas ?? ' - ' }})</option>
            @endforeach
        </select>
    </div>

    <div class="camera-box">
        <video id="video" width="100%" autoplay playsinline></video>
        <div class="scanner-focus"></div>
    </div>

    <div class="status-box">
        <div class="spinner" id="loading" style="display:none;"></div>
        <p id="statusText">Memuat model kecerdasan buatan...</p>
    </div>

    <div class="button-wrapper">
        <button onclick="daftarkanWajah()" class="btn-reg">Pindai & Simpan Wajah</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api/dist/face-api.js"></script>
<script>
    const video = document.getElementById('video');
const statusText = document.getElementById('statusText');
const loading = document.getElementById('loading');
let modelsLoaded = false;

// 1. FUNGSI UNTUK MEMUAT MODEL AI (BERURUTAN)
async function loadModels() {
    // Kita tembak langsung modelnya dari raw GitHub terpercaya agar tidak diblokir oleh Edge lokal
    const MODEL_URL = "https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights";
    
    try {
        statusText.innerText = "Mengunduh komponen AI dari CDN resmi (Mohon tunggu)...";
        
        // Memuat model langsung dari internet
        await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
        await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
        await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);
        
        modelsLoaded = true;
        statusText.innerText = "Model AI siap! Sedang mengaktifkan kamera...";
        console.log("Model face-api sukses dimuat 🚀");
        
        startCamera();
    } catch (error) {
        statusText.innerText = "Gagal memuat komponen AI! Pastikan laptop Anda terhubung ke internet.";
        console.error("Detail Eror Edge:", error);
    }
}

async function daftarkanWajah() {
    const siswaId = document.getElementById('siswa_id').value;
    
    // 1. Validasi Input Sebelum Proses
    if (!siswaId) { 
        alert("Pilih siswa terlebih dahulu dari menu drop-down!"); 
        return; 
    }
    if (!modelsLoaded) { 
        alert("Model AI belum siap sepenuhnya!"); 
        return; 
    }

    loading.style.display = 'block';
    statusText.innerText = "Sedang menganalisis struktur wajah... Tetap menghadap kamera.";

    try {
        // 2. Deteksi Wajah dari Elemen Video
        const detection = await faceapi.detectSingleFace(video, new faceapi.SsdMobilenetv1Options())
                                        .withFaceLandmarks()
                                        .withFaceDescriptor();

        if (!detection) {
            loading.style.display = 'none';
            statusText.innerText = "Gagal mendeteksi wajah! Pastikan posisi wajah pas di tengah frame.";
            alert("Wajah tidak terdeteksi oleh AI. Coba posisikan wajah Anda lebih dekat atau perbaiki pencahayaan.");
            return;
        }

        statusText.innerText = "Wajah terdeteksi! Sedang mengirim data ke server...";
        console.log("Vektor Wajah Berhasil Diekstrak:", detection.descriptor);

        // 3. Kirim Array Descriptor ke Backend Laravel
        const response = await fetch("/admin/registrasi-wajah/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                siswa_id: siswaId,
                descriptor: Array.from(detection.descriptor) // Mengubah Float32Array menjadi Array biasa agar bisa di-JSON
            })
        });

        const data = await response.json();
        loading.style.display = 'none';

        if (data.status === 'success') {
            statusText.innerText = "Wajah berhasil didaftarkan ke sistem! 🎉";
            alert("Berhasil mendaftarkan wajah siswa!");
        } else {
            statusText.innerText = "Gagal menyimpan data wajah.";
            alert("Gagal dari server: " + (data.message || "Terjadi kesalahan internal."));
        }

    } catch (error) {
        loading.style.display = 'none';
        statusText.innerText = "Terjadi gangguan sistem.";
        console.error("Detail Eror Saat Klik Simpan:", error);
        alert("Terjadi eror! Periksa console browser (Tekan F12) untuk melihat detail kesalahan.");
    }
}

// 3. FUNGSI KHUSUS MENYALAKAN KAMERA
function startCamera() {
    navigator.mediaDevices.getUserMedia({ 
        video: { 
            width: { ideal: 640 },
            height: { ideal: 480 },
            facingMode: "user" // Memastikan menggunakan kamera depan/laptop
        } 
    })
    .then(stream => {
        video.srcObject = stream;
        statusText.innerText = "Sistem dan Kamera siap! Silakan pilih siswa.";
    })
    .catch(err => {
        statusText.innerText = "Gagal mengakses kamera! Izinkan izin kamera (permission) di browser Anda.";
        console.error("Eror Kamera:", err);
        alert("Browser diblokir untuk mengakses kamera. Silakan cek ikon gembok di URL bar!");
    });
}

// Jalankan inisialisasi pertama kali saat halaman terbuka
loadModels();
</script>
</body>
</html>