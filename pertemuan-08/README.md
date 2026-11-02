# pertemuan-08
https://github.com/farel-dwi-atma/2611500017-PWD-TI1A-2627O/tree/main/pertemuan-08

## UTS: Formulir Rencana Kegiatan Mahasiswa

### Tahapan pengerjaan

1. Memeriksa struktur aplikasi, form Kontak, dan validasi JavaScript yang sudah tersedia.
2. Menambahkan tautan navigasi dan section Rencana Kegiatan Mahasiswa sebelum section Kontak.
3. Membuat form dengan input nama, kategori, tanggal, lokasi, dan deskripsi kegiatan.
4. Memproses form melalui POST, memvalidasi data di PHP, menyimpan hasil melalui session, lalu mengarahkan kembali ke section formulir menggunakan pola Post-Redirect-Get.
5. Menampilkan kembali data dengan `htmlspecialchars()` dan menyediakan validasi sisi klien menggunakan JavaScript.

### Pengujian

Uji melalui server PHP lokal pada 2 November 2026:

- Lulus: menu Rencana Kegiatan ditemukan dan terhubung ke section.
- Lulus: POST tidak valid menampilkan pesan validasi PHP.
- Lulus: POST valid diarahkan kembali dan hasil kegiatan tampil.
- Lulus: masukan yang berisi tag `<script>` ditampilkan sebagai teks HTML ter-escape.
- Lulus: POST form Kontak tetap menampilkan hasilnya.
- Lulus: validasi JavaScript menampilkan pesan saat form kosong.
- Lulus: tombol Batal mengosongkan input dan menu navigasi responsif dapat dibuka.
- Lulus: `php -l` tidak menemukan kesalahan sintaks.

Lakukan `git add`, `git commit`, dan `git push` secara bertahap setelah pengembangan berikutnya, lalu tambahkan hasil aktualnya di bagian ini.