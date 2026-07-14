package com.example.ujianonlinesiswa

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityUjianSelesaiBinding

class UjianSelesaiActivity : AppCompatActivity() {

    private lateinit var binding: ActivityUjianSelesaiBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityUjianSelesaiBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // BINDING KODE SKOR NILAI SUDAH DIHAPUS AGAR TIDAK ERROR

        binding.btnLihatHasil.setOnClickListener {
            Toast.makeText(this, "Membuka detail lembar jawaban...", Toast.LENGTH_SHORT).show()
        }

        binding.btnKeluarMenu.setOnClickListener {
            // Kembali ke halaman Pilih Ujian & membersihkan tumpukan halaman lama
            val intent = Intent(this, PilihUjianActivity::class.java)
            intent.flags = Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK
            startActivity(intent)
            finish()
        }
    }
}