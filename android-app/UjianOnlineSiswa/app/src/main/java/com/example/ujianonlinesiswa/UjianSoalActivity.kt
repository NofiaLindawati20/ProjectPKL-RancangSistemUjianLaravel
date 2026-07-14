package com.example.ujianonlinesiswa

import android.content.Intent
import android.graphics.Color
import android.os.Bundle
import android.view.View
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityUjianSoalBinding

class UjianSoalActivity : AppCompatActivity() {

    private lateinit var binding: ActivityUjianSoalBinding
    private var posisiSoalSimulasi = 1 // Penanda simulasi langkah soal

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityUjianSoalBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Default awal: Munculkan format pilihan ganda
        aturTampilanJawaban("pilihan_ganda")

        // Logika Navigasi Tombol Selanjutnya
        binding.btnSelanjutnya.setOnClickListener {
            if (posisiSoalSimulasi == 1) {
                // Simulasi Soal ke-2 berubah bentuk jadi Uraian
                binding.tvInfoNomor.text = "Soal 4 dari 15"
                binding.tvSoal.text = "4. Jelaskan langkah penyelesaian matriks ordo 2x2 dan berikan rumusnya!"
                aturTampilanJawaban("uraian")

                binding.btnSelanjutnya.text = "SELESAI UJIAN" // Ubah teks tombol di akhir soal
                posisiSoalSimulasi = 2
            } else {
                // Jika sudah di akhir simulasi soal, bawa ke halaman selesai
                val intent = Intent(this, UjianSelesaiActivity::class.java)
                startActivity(intent)
                finish()
            }
        }

        binding.btnSebelumnya.setOnClickListener {
            if (posisiSoalSimulasi == 2) {
                // Kembali ke format pilihan ganda
                binding.tvInfoNomor.text = "Soal 3 dari 15"
                binding.tvSoal.text = "3. Nilai dari 2x² + 5x - 3 jika x = 2 adalah ..."
                aturTampilanJawaban("pilihan_ganda")

                binding.btnSelanjutnya.text = "SELANJUTNYA ›"
                posisiSoalSimulasi = 1
            }
        }
    }

    // Fungsi Pengatur Tampilan Dinamis (Pilihan Ganda vs Uraian)
    private fun aturTampilanJawaban(tipeSoal: String) {
        if (tipeSoal == "pilihan_ganda") {
            binding.layoutPilihanGanda.visibility = View.VISIBLE
            binding.layoutUraian.visibility = View.GONE

            binding.tvTipeSoalLabel.text = "Pilihan Ganda"
            binding.tvTipeSoalLabel.setBackgroundColor(Color.parseColor("#FFCC00")) // Kuning
            binding.tvTipeSoalLabel.setTextColor(Color.BLACK)
        } else if (tipeSoal == "uraian") {
            binding.layoutPilihanGanda.visibility = View.GONE
            binding.layoutUraian.visibility = View.VISIBLE

            binding.tvTipeSoalLabel.text = "Uraian / Esai"
            binding.tvTipeSoalLabel.setBackgroundColor(Color.parseColor("#006633")) // Hijau
            binding.tvTipeSoalLabel.setTextColor(Color.WHITE)
        }
    }
}