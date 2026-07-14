package com.example.ujianonlinesiswa

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityVerifikasiWajahBinding

class VerifikasiWajahActivity : AppCompatActivity() {

    private lateinit var binding: ActivityVerifikasiWajahBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityVerifikasiWajahBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Simulasi: Ketuk lingkaran kamera untuk memicu proses "Berhasil Verifikasi"
        binding.cardKameraFrame.setOnClickListener {
            binding.tvStatusVerifikasi.text = "Verifikasi Berhasil! Membuka halaman..."
            binding.tvStatusVerifikasi.setTextColor(resources.getColor(android.R.color.holo_green_dark))

            // Jeda 1.5 detik lalu pindah halaman otomatis
            Handler(Looper.getMainLooper()).postDelayed({
                val intent = Intent(this, HalamanMulaiActivity::class.java)
                startActivity(intent)
                finish()
            }, 1500)
        }
    }
}