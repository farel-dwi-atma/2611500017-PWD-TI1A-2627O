# Pertemuan 7 - Pemrosesan Formulir dengan PHP

## Perubahan dari P6

P7 dikembangkan sebagai salinan terpisah dari artefak P6; file di `pertemuan-06/` tidak diubah sebagai bagian dari pekerjaan ini. Contoh metode `POST` dan `GET` dipisahkan agar alur masing-masing jelas:

- `index.php` memproses formulir menggunakan metode `POST`.
- `indexGet.php` memproses formulir yang sama menggunakan metode `GET`.
- Kedua alur menggunakan aturan validasi bersama dari `form-validation.php` dan tampilan bersama dari `profile-page.php`.
- PHP memvalidasi nama, email, semester, tanggal, jenis pesan, topik, program studi, dan pesan di sisi server.
- Data yang dikirim ditampilkan kembali dengan escaping HTML. Isian form dipertahankan jika ada validasi yang gagal.
- Alur POST menggunakan pola Post/Redirect/Get dan session untuk mencegah pengiriman ulang saat halaman di-refresh. Alur GET menampilkan data pada query string.
- JavaScript digunakan untuk navigasi; pemrosesan form tetap berjalan di PHP tanpa bergantung pada JavaScript.
- Input yang valid menampilkan ringkasan pesan. Input yang tidak valid menampilkan daftar kesalahan.

## Cara Menjalankan

1. Letakkan repository di document root Laragon, misalnya `C:\laragon\www\pwd\2611500017-PWD-TI1A-2627O`.
2. Jalankan Apache dari Laragon.
3. Buka <http://localhost/pwd/2611500017-PWD-TI1A-2627O/pertemuan-07/> untuk menguji POST.
4. Buka <http://localhost/pwd/2611500017-PWD-TI1A-2627O/pertemuan-07/indexGet.php> untuk menguji GET.
5. Isi formulir dan pilih setidaknya satu topik untuk melihat hasil pemrosesan PHP.

## Hasil Pengujian

Pengujian aktual dijalankan pada 29 Oktober 2026 melalui Apache Laragon di localhost menggunakan PHP 8.3.33.

- `php -l` untuk `index.php`, `indexGet.php`, `form-validation.php`, dan `profile-page.php`: lulus, tidak ada kesalahan sintaks.
- Halaman POST dan GET: masing-masing HTTP 200; keluaran profil, percabangan, perulangan, dan formulir tampil tanpa warning atau notice PHP.
- `style.css`, `script.js`, dan `img/foto-profil.jpg`: masing-masing merespons HTTP 200.
- POST dan GET dengan data lengkap yang valid: ringkasan seluruh data tampil.
- Uji nama berisi markup HTML: markup ditampilkan sebagai teks ter-escape, bukan elemen HTML.
- POST dan GET dengan data tidak valid: server menolak data dan menampilkan kesalahan untuk nama, email, semester, tanggal, jenis pesan, topik, program studi, dan pesan.
- Batas panjang: nama 50 karakter Unicode dan pesan 300 karakter diterima; nama 51 karakter dan pesan 301 karakter ditolak.
- Hasil POST hanya ditampilkan sekali setelah redirect; bentuk input yang tidak sesuai, seperti semester berbentuk array, ditolak tanpa warning PHP.
- Respons POST valid dan tidak valid tidak menghasilkan warning, notice, atau fatal error PHP.

## Git/GitHub

Perubahan P7 ditinjau dan diuji sebelum dicatat dalam commit. P6 dipertahankan terpisah sebagai baseline.
