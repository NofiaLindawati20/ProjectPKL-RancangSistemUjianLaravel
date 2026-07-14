package com.example.ujianonlinesiswa

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ujianonlinesiswa.databinding.ActivityLoginBinding

class LoginActivity : AppCompatActivity() {

    private lateinit var binding: ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnMasuk.setOnClickListener {
            val email = binding.etEmail.text.toString().trim()
            val password = binding.etPassword.text.toString().trim()

            // Validasi input sederhana sebelum login lokal (Sementara)
            if (email.isNotEmpty() && password.isNotEmpty()) {
                val intent = Intent(this, PilihUjianActivity::class.java)
                startActivity(intent)
                finish() // Mengunci halaman login agar tidak bisa back
            } else {
                Toast.makeText(this, "Harap isi email dan password!", Toast.LENGTH_SHORT).show()
            }
        }
    }
}