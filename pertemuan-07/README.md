# Pertemuan 7 - Pemrosesan Formulir dengan PHP

## Perubahan dari P6

P7 dikembangkan sebagai salinan terpisah dari artefak P6; file di `pertemuan-06/` tidak diubah sebagai bagian dari pekerjaan ini. Form kontak sekarang dikirim menggunakan metode `POST` dan diproses di `index.php`.

- PHP memvalidasi nama, email, semester, tanggal, jenis pesan, topik, program studi, dan pesan di sisi server.
- Data yang dikirim ditampilkan kembali dengan escaping HTML. Isian form dipertahankan jika ada validasi yang gagal.
- JavaScript digunakan untuk navigasi; pemrosesan form tetap berjalan di PHP tanpa bergantung pada JavaScript.
- Input yang valid menampilkan ringkasan pesan. Input yang tidak valid menampilkan daftar kesalahan.

## Cara Menjalankan

1. Letakkan repository di document root Laragon, misalnya `C:\laragon\www\pwd\2611500017-PWD-TI1A-2627O`.
2. Jalankan Apache dari Laragon.
3. Buka <http://localhost/pwd/2611500017-PWD-TI1A-2627O/pertemuan-07/>.
4. Isi formulir kontak dan pilih setidaknya satu topik untuk melihat hasil pemrosesan PHP.

## Hasil Pengujian

Pengujian aktual dijalankan pada 29 Oktober 2026 melalui Apache Laragon di localhost menggunakan PHP 8.3.33.

- `php -l pertemuan-07\index.php`: lulus, tidak ada kesalahan sintaks.
- GET halaman P7: HTTP 200; keluaran profil, percabangan, perulangan, dan formulir tampil tanpa warning atau notice PHP.
- `style.css`, `script.js`, dan `img/foto-profil.jpg`: masing-masing merespons HTTP 200.
- POST dengan data lengkap yang valid: HTTP 200; ringkasan seluruh data tampil.
- Uji nama berisi markup HTML: markup ditampilkan sebagai teks ter-escape, bukan elemen HTML.
- POST dengan data tidak valid: server menolak data dan menampilkan kesalahan untuk nama, email, semester, tanggal, jenis pesan, topik, program studi, dan pesan.
- Batas panjang: nama 50 karakter Unicode dan pesan 300 karakter diterima; nama 51 karakter dan pesan 301 karakter ditolak.
- Respons POST valid dan tidak valid tidak menghasilkan warning, notice, atau fatal error PHP.

## Git/GitHub

Perubahan P7 ditinjau dan diuji sebelum dicatat dalam commit. P6 dipertahankan terpisah sebagai baseline.
