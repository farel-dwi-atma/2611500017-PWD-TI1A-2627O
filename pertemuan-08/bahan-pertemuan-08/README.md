# Pertemuan 08 - Formulir Rencana Kegiatan Mahasiswa

P8 dikembangkan dengan mempertahankan fitur aplikasi profil mahasiswa dan formulir Kontak yang sudah tersedia. Fitur baru yang ditambahkan:

- Menu navigasi **Rencana Kegiatan** mengarah ke section formulir yang ditempatkan sebelum section Kontak.
- Formulir menerima nama kegiatan, kategori kegiatan, tanggal pelaksanaan, lokasi kegiatan, dan deskripsi kegiatan.
- JavaScript memvalidasi kelengkapan dan batas panjang input di sisi klien.
- PHP memvalidasi ulang data di sisi server, termasuk kategori yang diizinkan dan format tanggal.
- Formulir menggunakan metode `POST`. Data valid disimpan di session dan ditampilkan setelah redirect dengan pola Post-Redirect-Get.
- Input yang tidak valid menampilkan pesan kesalahan dan nilai isian dipertahankan agar dapat diperbaiki.
- Data yang ditampilkan kembali diamankan menggunakan `htmlspecialchars()`. Deskripsi juga mendukung baris baru.
- Form Kontak tetap memproses data secara terpisah; navigasi responsif dan fitur profil yang sudah ada dipertahankan.

## Cara Menjalankan

1. Letakkan repository di document root Laragon, misalnya `C:\laragon\www\pwd\2611500017-PWD-TI1A-2627O`.
2. Jalankan Apache dari Laragon.
3. Buka <http://localhost/pwd/2611500017-PWD-TI1A-2627O/pertemuan-08/bahan-pertemuan-08/>.
4. Pilih menu **Rencana Kegiatan**, isi semua input, lalu tekan **Kirim**.
5. Hasil kegiatan yang berhasil disimpan akan ditampilkan kembali di section Rencana Kegiatan Mahasiswa. Coba tombol **Batal** untuk mengosongkan input.

## Hasil Pengujian

Pengujian dilakukan pada 2 November 2026 menggunakan server PHP lokal Laragon dan browser.

- `php -l` untuk `index.php`: lulus, tidak ada kesalahan sintaks.
- Menu Rencana Kegiatan dan section formulir tampil; menu navigasi responsif dapat dibuka.
- Validasi JavaScript menampilkan pesan saat formulir kosong.
- POST kosong ditolak oleh PHP dan pesan kesalahan tampil.
- POST valid diarahkan kembali ke `index.php#rencana-kegiatan`; data kelima input tampil setelah redirect.
- Masukan nama kegiatan yang berisi tag `<script>` ditampilkan sebagai teks ter-escape, bukan dijalankan sebagai markup.
- Tombol **Batal** mengosongkan input.
- POST formulir Kontak tetap menampilkan hasilnya.

## Git/GitHub

Perubahan P8 dan hasil pengujian dicatat dalam README ini. Setelah meninjau perubahan, simpan dan kirim bertahap ke repository GitHub menggunakan `git add`, `git commit`, dan `git push`.
