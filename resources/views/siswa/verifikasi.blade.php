<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Wajah</title>

    <link rel="stylesheet" href="{{ asset('css/style-verifikasi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="bg-shape shape-top-left"></div>
<div class="bg-shape shape-bottom-right"></div>

<div class="verification-container">

    <div class="verification-header">
        <h2>Verifikasi Wajah</h2>
        <p class="subtitle">Pastikan wajah Anda berada di dalam frame</p>
    </div>

    <!-- CAMERA AREA -->
    <div class="camera-frame-wrapper">
        <div class="camera-frame">
            <video id="video" width="100%" autoplay playsinline></video>
            <canvas id="canvas" style="display:none;"></canvas>
            <div class="scanner-line"></div>
        </div>
    </div>

    <!-- STATUS -->
    <div class="status-wrapper">
        <div class="loading-spinner" id="loading" style="display:none;"></div>
        <p class="status-text" id="statusText">Siap untuk verifikasi</p>
    </div>

    <!-- ERROR -->
    @if(session('error'))
        <p style="color:red; text-align:center;">
            {{ session('error') }}
        </p>
    @endif

    <!-- TIPS -->
    <div class="tips-box">
        <div class="tips-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>
        <div class="tips-content">
            <strong>Tips:</strong> Pastikan wajah terlihat jelas dan tidak ada orang lain di sekitar Anda.
        </div>
    </div>

    <!-- BUTTON -->
    <div style="text-align:center; margin-top:20px;">
        <button onclick="capture()" class="btn-submit">Verifikasi & Lanjut</button>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api/dist/face-api.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api/dist/face-api.js"></script>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const statusText = document.getElementById('statusText');
    const loading = document.getElementById('loading');

    let modelsLoaded = false;

    // 📦 LOAD MODEL FACE-API.JS LANGSUNG DARI CDN AGAR TIDAK DIBLOKIR BROWSER
    async function loadModels() {
        const MODEL_URL = "https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights";

        try {
            statusText.innerText = "Mengunduh komponen kecerdasan buatan (Mohon tunggu)...";
            
            await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
            await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
            await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);

            modelsLoaded = true;
            console.log("Model berhasil diload 🚀");
            statusText.innerText = "Model AI siap! Sedang mengaktifkan kamera...";
            
            // Jalankan kamera HANYA setelah model siap
            startCamera();
        } catch (error) {
            statusText.innerText = "Gagal memuat komponen AI! Pastikan Anda terhubung ke internet.";
            console.error("Detail Eror Verifikasi:", error);
        }
    }

    // 🎥 FUNGSI AKTIFKAN KAMERA
    function startCamera() {
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "user" } })
            .then(stream => {
                video.srcObject = stream;
                statusText.innerText = "Kamera aktif, posisikan wajah Anda di tengah frame";
            })
            .catch(err => {
                alert("Kamera tidak bisa diakses! Izinkan izin kamera di browser Anda.");
                console.error(err);
            });
    }

    // Jalankan pemuatan model saat halaman pertama kali dibuka
    loadModels();

    // 📸 CAPTURE + VERIFIKASI WAJAH KE BACKEND LARAVEL
    async function capture() {
        if (!modelsLoaded) {
            alert("Model AI belum siap!");
            return;
        }

        loading.style.display = 'block';
        statusText.innerText = "Mendeteksi wajah Anda...";

        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0);

        // 🧠 DETEKSI WAJAH VIA BROWSER
        const detection = await faceapi
            .detectSingleFace(video, new faceapi.SsdMobilenetv1Options())
            .withFaceLandmarks()
            .withFaceDescriptor();

        if (!detection) {
            loading.style.display = 'none';
            statusText.innerText = "Wajah tidak terdeteksi! Coba dekorasi ulang posisi wajah.";
            return;
        }

        const image = canvas.toDataURL('image/png');
        statusText.innerText = "Mencocokkan wajah dengan database...";

        // 🚀 KIRIM KE BACKEND FaceVerificationController
        fetch("/verifikasi/{{ $id }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                image: image,
                descriptor: Array.from(detection.descriptor)
            })
        })
        .then(res => res.json())
        .then(data => {
            loading.style.display = 'none';

            if (data.status === 'success') {
                statusText.innerText = "Verifikasi berhasil! Mengalihkan ke halaman ujian... 🚀";
                setTimeout(() => {
                    window.location.href = "/ujian/{{ $id }}/mulai";
                }, 1500);
            } else {
                statusText.innerText = "Wajah tidak dikenali! Gunakan pencahayaan yang cukup.";
                alert("Verifikasi Gagal: Wajah Anda tidak cocok dengan data terdaftar.");
            }
        })
        .catch(err => {
            loading.style.display = 'none';
            statusText.innerText = "Terjadi gangguan server!";
            console.error(err);
        });
    }
</script>
</body>
</html>