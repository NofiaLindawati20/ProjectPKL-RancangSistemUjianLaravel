package com.example.ujianonlinesiswa

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityHalamanMulaiBinding

class HalamanMulaiActivity : AppCompatActivity() {

    private lateinit var binding: ActivityHalamanMulaiBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityHalamanMulaiBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnMulaiUjian.setOnClickListener {
            val intent = Intent(this, UjianSoalActivity::class.java)
            startActivity(intent)
            finish() // Mencegah siswa kembali ke konfirmasi data saat ujian berjalan
        }
    }
}