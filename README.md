Nama :  Nofia Lindawati
NIM : 23215034
Prodi : Teknik Informatika / 6B

# 📚 Project PKL - Sistem Ujian Online Berbasis Web & Android

## 📖 Deskripsi

Project ini merupakan bagian dari **Praktik Kerja Lapangan (PKL)** dengan judul:

> **Rancang Bangun Aplikasi Ujian Online Berbasis Android dengan Sistem Monitoring Peserta Menggunakan Computer Vision di SMK Assalafiyah Kota Tegal**

Project dikembangkan menggunakan:

- **Laravel** sebagai Backend dan REST API
- **Android Studio** sebagai aplikasi peserta ujian
- **MySQL** sebagai database
- **Computer Vision** sebagai fitur monitoring/verifikasi peserta ujian

---

# 🚧 Status Pengembangan

> **⚠️ Project masih dalam tahap pengembangan (Work In Progress).**

Repository ini **belum berisi fitur yang lengkap**.

Versi saat ini masih berfokus pada:

- Pembuatan tampilan (User Interface/UI)
- Perancangan struktur database
- Perancangan arsitektur sistem
- Pengembangan backend Laravel
- Persiapan REST API
- Dokumentasi PKL

Beberapa fitur utama masih dalam proses implementasi dan pengujian.

---

# 📂 Struktur Repository

```
ProjectPKL-SistemUjian
│
├── backend-laravel/
│   └── Source code Laravel (Tahap pengembangan)
│
├── android-app/
│   └── Source code Android Studio (tahap pengembangan)
│
├── database/
│   └── ujian_db.sql
│
├── dokumentasi/
│   ├── Laporan PKL
│   ├── ERD
│   ├── Use Case Diagram
│   ├── Activity Diagram
│   ├── Sequence Diagram
│   └── Screenshot UI
│
├── README.md
└── LICENSE
```

---

# 👥 Hak Akses Sistem

## 👨‍💼 Admin

Admin memiliki hak akses penuh terhadap sistem.

Fitur utama:

- Mengelola akun pengguna
- Mengelola data guru
- Mengelola data siswa
- Mengelola kelas
- Mengelola mata pelajaran
- Mengelola ujian
- Monitoring data sistem

---

## 👨‍🏫 Guru

Guru bertugas mengelola proses akademik ujian.

Fitur:

- Membuat ujian
- Membuat soal pilihan ganda
- Membuat soal essay
- Mengelola bank soal
- Melihat peserta ujian
- Memberikan penilaian
- Melihat hasil ujian

---

## 👀 Pengawas

Pengawas bertanggung jawab selama pelaksanaan ujian.

Fitur:

- Monitoring peserta ujian
- Melihat daftar peserta
- Melihat status ujian
- Mencatat pelanggaran
- Mengelola berita acara ujian
- Mencetak laporan pelaksanaan ujian

---

## 👨‍🎓 Siswa / Peserta

Peserta ujian dapat:

- Login ke aplikasi
- Memilih ujian
- Melakukan verifikasi wajah
- Mengikuti ujian
- Menjawab soal pilihan ganda dan atau soal essay
- Mengunggah jawaban (jika diperlukan)
- Mengirim jawaban
- Melihat hasil ujian

---

# 🛠️ Teknologi

## Backend

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- Bootstrap
- REST API

## Mobile

- Android Studio
- Java/Kotlin
- Retrofit
- CameraX
- ML Kit / Computer Vision

---

# 🚀 Roadmap

- [x] Perancangan UI
- [x] Perancangan Database
- [x] Login Multi Role
- [x] Dashboard Admin
- [x] Dashboard Guru
- [x] Dashboard Pengawas
- [x] Dashboard Peserta
- [ ] REST API Laravel
- [ ] Aplikasi Android
- [ ] Face Verification
- [ ] Face Tracking
- [ ] Monitoring Peserta
- [ ] Penilaian Otomatis
- [ ] Export Laporan
- [ ] Deployment

---

# ⚙️ Cara Menjalankan Project

## Backend Laravel

```bash
git clone https://github.com/NofiaLindawati20/ProjectPKL-RancangSistemUjianLaravel.git

cd backend-laravel

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

---

# 📌 Catatan

Project ini dibuat sebagai media pembelajaran dan penyelesaian kegiatan Praktik Kerja Lapangan (PKL).

Seluruh fitur akan terus diperbarui hingga sistem selesai dikembangkan.

---

# 👨‍💻 Developer

**Nofia Lindawati**
**23215034**
Mahasiswa Teknik Informatika
Universitas Harkat Negeri

---

# 📄 License

Project ini menggunakan lisensi **MIT License** dan dikembangkan untuk keperluan pendidikan, penelitian, serta Praktik Kerja Lapangan (PKL).
