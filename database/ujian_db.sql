-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2026 pada 07.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acaras`
--

CREATE TABLE `berita_acaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengawas_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_peserta_hadir` int(11) NOT NULL,
  `jumlah_peserta_absen` int(11) NOT NULL,
  `catatan_kejadian` text DEFAULT NULL,
  `status_pelaksanaan` varchar(255) NOT NULL DEFAULT 'Selesai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` text DEFAULT NULL,
  `is_benar` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `jumlah_siswa`, `created_at`, `updated_at`) VALUES
(1, 'X TKR 1', 'Marzuki', 20, '2026-06-25 18:49:09', '2026-06-25 18:49:42'),
(2, 'X TKJ 1', 'Erni Santika', 20, '2026-06-25 18:49:32', '2026-06-25 18:49:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `guru_pengampu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama_mapel`, `kategori`, `guru_pengampu`, `created_at`, `updated_at`) VALUES
(1, 'SB-001', 'Seni Budaya X', 'Bahasa', 'Laela', '2026-06-25 19:11:19', '2026-06-25 19:16:37'),
(2, 'MTK-001', 'Matematika X', 'Umum', 'Indah Lestari', '2026-06-25 19:35:53', '2026-06-25 19:35:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_06_154945_create_personal_access_tokens_table', 1),
(5, '2026_06_06_162023_create_ujians_table', 1),
(6, '2026_06_07_011732_create_jawabans_table', 1),
(7, '2026_06_08_015224_create_kelas_table', 1),
(8, '2026_06_08_015313_create_mapels_table', 1),
(9, '2026_06_12_023911_create_penilaians_table', 1),
(10, '2026_06_12_034819_create_profil_gurus_table', 1),
(11, '2026_06_12_035907_create_ruangs_table', 1),
(12, '2026_06_15_002659_create_pengawasans_table', 1),
(13, '2026_06_17_022428_create_soals_table', 1),
(14, '2026_06_17_054104_create_siswas_table', 1),
(15, '2026_06_19_031339_create_wajah_siswa_table', 1),
(16, '2026_06_22_045523_create_nilai_ujians_table', 1),
(17, '2026_06_22_050203_create_berita_acaras_table', 1),
(18, '2026_06_23_032550_create_guru_mapel_table', 1),
(19, '2026_06_23_032925_add_relasi_to_ujian', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujians`
--

CREATE TABLE `nilai_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_soal`
--

CREATE TABLE `paket_soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `acak_jawaban` tinyint(1) NOT NULL DEFAULT 1,
  `acak_soal` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawasans`
--

CREATE TABLE `pengawasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nomor_kursi` int(11) NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `status` enum('normal','curang') NOT NULL DEFAULT 'normal',
  `waktu_curang` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_pg` double NOT NULL DEFAULT 0,
  `nilai_essay` double DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `status_essay` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_gurus`
--

CREATE TABLE `profil_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangs`
--

CREATE TABLE `ruangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `kode_ruang` varchar(255) NOT NULL,
  `ujian` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `status` enum('aktif','siap','selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('djwr3jUFkmCBeRK6gfVxkOuKJfVjBYSIGYcK46HV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1k2Z0tFT0dkODZLM1Q3eXhCYXhEaHkxTjNNYTM5NW5SSGR6VVJwcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VyIjtzOjU6InJvdXRlIjtzOjExOiJhZG1pbi51c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1783570741);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `user_id`, `kelas_id`, `nama_siswa`, `nis`, `nisn`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 'Nur Aeni', '20160609', '9998414251', '2026-06-25 18:54:11', '2026-06-25 18:54:11'),
(4, 4, 1, 'Dadang Santoso', '20160618', '9998414446', '2026-06-25 18:56:45', '2026-06-25 18:56:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar_soal` varchar(255) DEFAULT NULL,
  `tipe` enum('pg','essay') NOT NULL DEFAULT 'pg',
  `a` text DEFAULT NULL,
  `b` text DEFAULT NULL,
  `c` text DEFAULT NULL,
  `d` text DEFAULT NULL,
  `e` text DEFAULT NULL,
  `gambar_a` varchar(255) DEFAULT NULL,
  `gambar_b` varchar(255) DEFAULT NULL,
  `gambar_c` varchar(255) DEFAULT NULL,
  `gambar_d` varchar(255) DEFAULT NULL,
  `gambar_e` varchar(255) DEFAULT NULL,
  `jawaban_benar` varchar(255) DEFAULT NULL,
  `poin` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soals`
--

INSERT INTO `soals` (`id`, `ujian_id`, `pertanyaan`, `gambar_soal`, `tipe`, `a`, `b`, `c`, `d`, `e`, `gambar_a`, `gambar_b`, `gambar_c`, `gambar_d`, `gambar_e`, `jawaban_benar`, `poin`, `created_at`, `updated_at`) VALUES
(1, 1, 'sebutkan unsur seni rupa', NULL, 'essay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2026-06-25 19:19:02', '2026-06-25 19:19:02'),
(2, 1, 'jelaskan unsur seni musik', NULL, 'essay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2026-06-25 19:19:02', '2026-06-25 19:19:02'),
(3, 1, 'sebutka tarian khas tegal', NULL, 'essay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2026-06-25 19:19:02', '2026-06-25 19:19:02'),
(4, 2, '1+1=', NULL, 'pg', '1', '4', '2', '6', '0', NULL, NULL, NULL, NULL, NULL, 'C', 5, '2026-06-25 20:03:23', '2026-06-25 20:03:23'),
(5, 2, '11-1=', NULL, 'pg', '10', '9', '8', '7', '6', NULL, NULL, NULL, NULL, NULL, 'A', 5, '2026-06-25 20:03:23', '2026-06-25 20:03:23'),
(6, 2, 'berapa nilai dari phi?', NULL, 'essay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2026-06-25 20:03:23', '2026-06-25 20:03:23'),
(7, 2, 'tuliskan rumus luas persegi', NULL, 'essay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2026-06-25 20:03:23', '2026-06-25 20:03:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujians`
--

CREATE TABLE `ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `acak_jawaban` tinyint(1) NOT NULL DEFAULT 0,
  `acak_soal` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ujians`
--

INSERT INTO `ujians` (`id`, `nama_ujian`, `mapel`, `kelas`, `durasi`, `tanggal_ujian`, `acak_jawaban`, `acak_soal`, `created_at`, `updated_at`, `guru_id`) VALUES
(1, 'Ulangan Harian', 'Seni Budaya X', 'X TKJ 1', 30, '2026-06-30', 1, 1, '2026-06-25 19:19:02', '2026-06-25 19:19:02', NULL),
(2, 'UTS', 'Matematika X', 'X TKR 1', 45, '2026-06-29', 1, 1, '2026-06-25 20:03:22', '2026-06-25 20:03:22', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa','pengawas') NOT NULL DEFAULT 'siswa',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Nur Aeni', 'nur@gmail.com', 'siswa', NULL, '$2y$12$Qw6WVQQQnFVSMSpT0qhhre5b00vfCuy8xiITA5e9sdpbSHAKz9R3e', NULL, '2026-06-25 18:54:11', '2026-06-25 18:54:11'),
(4, 'Dadang Santoso', 'dadang@gmail.com', 'siswa', NULL, '$2y$12$qk5OeTazWpAPlAjkq.USmOSpN3ugWh.B61C2IFJeEiQ808olmc606', NULL, '2026-06-25 18:56:45', '2026-06-25 18:56:45'),
(5, 'Laela', 'laela@gmail.com', 'guru', NULL, '$2y$12$C6QMpij3rhDVtk9wjE50/eJ2mNl7MDT4g5Fpo93clxm8uTE2COvYC', NULL, '2026-06-25 19:32:23', '2026-06-25 19:32:23'),
(6, 'Marzuki', 'marzuki@gmail.com', 'guru', NULL, '$2y$12$kk9dPZIeAXXIY9Qlye672.X4yTX0aubzgNrj/rYJw/2N4qzEhf7zi', NULL, '2026-06-25 19:33:10', '2026-06-25 19:33:10'),
(7, 'Laela', 'laelaa@gmail.com', 'pengawas', NULL, '$2y$12$BJIgFphn7oIabgKUTy1JwedEiGCcoTa3AGMZOfI85xBYkrS6YujBq', NULL, '2026-06-25 19:34:01', '2026-06-25 19:34:01'),
(8, 'Indah Lestari', 'indah@gmail.com', 'admin', NULL, '$2y$12$rHMxO7Uh9hwLiJHiv0BB1uAjaLkoK7YOUUMgAIcnUwaUbKRu6JMX.', NULL, '2026-06-25 19:34:34', '2026-06-25 19:34:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wajah_siswa`
--

CREATE TABLE `wajah_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `descriptor` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acaras_pengawas_id_foreign` (`pengawas_id`),
  ADD KEY `berita_acaras_ujian_id_foreign` (`ujian_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_mapel_guru_id_foreign` (`guru_id`),
  ADD KEY `guru_mapel_mapel_id_foreign` (`mapel_id`);

--
-- Indeks untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapel_kode_unique` (`kode`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_ujians`
--
ALTER TABLE `nilai_ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_ujians_user_id_foreign` (`user_id`),
  ADD KEY `nilai_ujians_ujian_id_foreign` (`ujian_id`);

--
-- Indeks untuk tabel `paket_soal`
--
ALTER TABLE `paket_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengawasans`
--
ALTER TABLE `pengawasans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `profil_gurus`
--
ALTER TABLE `profil_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD UNIQUE KEY `siswas_nisn_unique` (`nisn`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soals_ujian_id_foreign` (`ujian_id`);

--
-- Indeks untuk tabel `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujians_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wajah_siswa`
--
ALTER TABLE `wajah_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `nilai_ujians`
--
ALTER TABLE `nilai_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket_soal`
--
ALTER TABLE `paket_soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengawasans`
--
ALTER TABLE `pengawasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_gurus`
--
ALTER TABLE `profil_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `wajah_siswa`
--
ALTER TABLE `wajah_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD CONSTRAINT `berita_acaras_pengawas_id_foreign` FOREIGN KEY (`pengawas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berita_acaras_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_mapel_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_ujians`
--
ALTER TABLE `nilai_ujians`
  ADD CONSTRAINT `nilai_ujians_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ujians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soals`
--
ALTER TABLE `soals`
  ADD CONSTRAINT `soals_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujians`
--
ALTER TABLE `ujians`
  ADD CONSTRAINT `ujians_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
