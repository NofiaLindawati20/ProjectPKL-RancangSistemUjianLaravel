<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Siswa\VerifikasiController;
use App\Http\Controllers\Siswa\UjianController;
use App\Http\Controllers\Siswa\SelesaiController;
use App\Http\Controllers\Siswa\SiswaUjianController;

use App\Http\Controllers\VerifikasiWajahController;

use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Guru\DataSoalController;
use App\Http\Controllers\Guru\PenilaianController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\RekapNilaiController;
use App\Http\Controllers\Guru\AnalisisSiswaController;
use App\Http\Controllers\Guru\ProfilGuruController;
use App\Http\Controllers\Guru\SoalController;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DataUtamaController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;

use App\Http\Controllers\Pengawas\PengawasController;
use App\Http\Controllers\Pengawas\PilihRuangController;
use App\Http\Controllers\Pengawas\LivePengawasanController;




Route::get('/', function () {
    return view('welcome');
});

//Login
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/redirect', [AuthController::class,'redirect']);
Route::get('/login', function () {
    return view('auth.login');
});

    //SISWA
    Route::get('/siswa',[SiswaUjianController::class,'dashboard'])->name('siswa.dashboard');
    // Jika rutenya berdiri sendiri, tambahkan ->middleware('auth') di ujungnya:
    Route::get('/siswa/my-exams', [App\Http\Controllers\Siswa\SiswaUjianController::class, 'myExams'])
    ->name('siswa.my_exams')
    ->middleware('auth');


    Route::post('/verifikasi/{id}', [VerifikasiWajahController::class, 'verify']);


    // VERIFIKASI & TOMBOL MULAI
    Route::get('/verifikasi/{id}', [VerifikasiController::class, 'index']);
    Route::post('/verifikasi/{id}', [VerifikasiController::class, 'proses']);

    // Rute untuk menampilkan halaman kamera verifikasi wajah siswa sebelum masuk ujian
    Route::get('/ujian/{id}/verifikasi', function ($id) {
        return view('siswa.verifikasi', ['id' => $id]);
    })->middleware(['auth']); // Sesuaikan dengan middleware siswa Anda

    //UJIAN UTAMA
    // Rute halaman utama ujian (mendukung parameter id ujian)
    Route::get('/ujian/{id}', [UjianController::class, 'index'])->name('ujian.index');
    
    // Rute penanganan kirim data otomatis latar belakang (AJAX)
    Route::post('/ujian/save-ajax', [UjianController::class, 'saveAjax']);
    Route::post('/ujian/toggle-ragu', [UjianController::class, 'toggleRagu']);
    Route::post('/ujian/upload-foto', [UjianController::class, 'uploadFoto']);
    // Rute submit selesai / waktu habis
    Route::post('/ujian/submit', [UjianController::class, 'submit'])->name('ujian.submit');


    
    // DASHBOARD
    Route::get('/admin', [AdminController::class,'dashboard']);


    //KELOLA USER

Route::prefix('admin')->group(function(){
    Route::get('/user', [UserController::class,'index'])->name('admin.users');
    Route::get('/user/create', [UserController::class,'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('admin.user.store');
    Route::delete('/user/{id}', [UserController::class,'destroy'])
    ->name('admin.user.destroy');
    // Rute Halaman Edit dan Proses Update User
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);

    });

    

    // DATA UTAMA
Route::prefix('admin')->group(function(){
    Route::get('/datautama', [DataUtamaController::class,'index'])->name('admin.datautama');
    // JALUR TAMBAH KELAS BARU (DATA UTAMA)
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/kelas/delete/{id}', [DataUtamaController::class,'deleteKelas']);
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
    Route::post('/kelas/{id}/update', [KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])
    ->name('admin.kelas.destroy');


    // JALUR TAMBAH SISWA BARU (DATA UTAMA)
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('admin.siswa.store');
    Route::get('/siswa/delete/{id}', [DataUtamaController::class,'deleteSiswa']);

    // JALUR TAMBAH MAPEL BARU (DATA UTAMA)
    Route::get('/admin/mapel/create', [DataUtamaController::class, 'createMapel'])->name('admin.mapel.create');
    Route::post('/admin/mapel/store', [DataUtamaController::class, 'storeMapel'])->name('admin.mapel.store');
    Route::get('/mapel/{id}/edit', [DatautamaController::class, 'editMapel'])->name('admin.mapel.edit');
    Route::post('/mapel/{id}/update', [DataUtamaController::class, 'updateMapel'])->name('admin.mapel.update');
    Route::delete('/mapel/{id}', [DatautamaController::class, 'destroyMapel'])->name('admin.mapel.destroy');
});

    // LAPORAN
Route::prefix('admin')->group(function(){
    Route::get('/laporan', [LaporanController::class,'index']);
});

    // PENGATURAN
Route::prefix('admin')->group(function(){
    Route::get('/pengaturan', [PengaturanController::class,'index']);
    Route::post('/pengaturan/update', [PengaturanController::class,'update']);
    Route::post('/pengaturan/password', [PengaturanController::class,'updatePassword']);

});

    //Registrasi wajah siswa
    // RUTE UNTUK GURU / ADMIN (Registrasi Wajah)
    Route::get('/admin/registrasi-wajah', [VerifikasiController::class, 'showRegistrasi']);
    Route::post('/admin/registrasi-wajah/store', [VerifikasiController::class, 'storeRegistrasi']);

    // RUTE UNTUK SISWA (Melakukan Verifikasi saat Ujian)
    // Sesuai dengan fetch POST di file verifikasi.blade.php Anda: "/verifikasi/{{ $id }}"
    Route::post('/verifikasi/{ujian_id}', [VerifikasiController::class, 'verifikasiSiswa']);



    //GURU

    Route::get('/guru',[GuruController::class,'dashboard'])->name('guru.dashboard');

    // BANK SOAL
    Route::prefix('guru')->group(function(){
       Route::get('/datasoal', [DataSoalController::class,'index'])->name('guru.datasoal');
    Route::get('/datasoal/{ujian_id}/detail', [DataSoalController::class,'detail']);
    Route::post('/datasoal/{ujian_id}/store', [DataSoalController::class,'store']);
    Route::get('/datasoal/delete/{id}', [DataSoalController::class,'destroy']);

    //Pembuatan Soal CBT
    Route::get('/buat-soal', [SoalController::class, 'create'])->name('guru.soal.create');
    Route::post('/buat-soal/store', [SoalController::class, 'store'])->name('guru.soal.store');

    // PENILAIAN
    Route::get('/penilaian', [PenilaianController::class,'index'])->name('guru.penilaian');
    Route::get('/penilaian/siswa', [NilaiController::class, 'index'])->name('guru.penilaian.siswa');
    Route::get('/penilaian/koreksi/{id}', [NilaiController::class, 'koreksi'])->name('guru.penilaian.koreksi');
    Route::post('/penilaian/simpan-koreksi/{id}', [NilaiController::class, 'simpanKoreksi'])->name('guru.penilaian.simpanKoreksi');

    // REKAP NILAI
    Route::get('/rekap-nilai', [RekapNilaiController::class,'index']);
    //analisis siswwa
    Route::get('/analisissiswa', [AnalisisSiswaController::class,'index']);

    // ANALISIS SISWA

    // PROFIL GURU
    Route::get('/profil', [ProfilGuruController::class,'index']);
    Route::post('/profil/update', [ProfilGuruController::class,'update']);




    });

    //pengawas
    Route::prefix('pengawas')->group(function(){
    Route::get('/pilih-ruang', [PilihRuangController::class,'index'])->name('pengawas.pilih-ruang');
    
    Route::get('/ruang/{ruang}', [LivePengawasanController::class,'index']);
    Route::post('/curang/{id}', [LivePengawasanController::class,'curang']);
    Route::get('/reset-status', [LivePengawasanController::class,'resetStatus']);
    Route::get('/berita-acara', [App\Http\Controllers\Pengawas\PengawasController::class, 'historiPengawasan'])
    ->name('pengawas.berita_acara')
    ->middleware('auth');
});






Route::get('/test', function(){
    return "OK";
});


