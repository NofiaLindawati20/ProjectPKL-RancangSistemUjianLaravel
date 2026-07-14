package com.example.ujianonlinesiswa

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityPilihUjianBinding

class PilihUjianActivity : AppCompatActivity() {

    private lateinit var binding: ActivityPilihUjianBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityPilihUjianBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Sesuai id CardView Matematika di XML kamu
        binding.cardMatematika.setOnClickListener {
            val intent = Intent(this, VerifikasiWajahActivity::class.java)
            startActivity(intent)
        }
    }
}