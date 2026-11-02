# Pertemuan 08 - Formulir Rencana Kegiatan Mahasiswa

Repository ini berisi pengembangan aplikasi pada folder `bahan-pertemuan-08` untuk menambahkan formulir rencana kegiatan mahasiswa tanpa menghilangkan fitur profil dan formulir Kontak yang sudah tersedia.

## Perubahan Kode

### `bahan-pertemuan-08/index.php`

- Menambahkan menu navigasi **Rencana Kegiatan** yang menuju `#rencana-kegiatan`.
- Menambahkan section **Rencana Kegiatan Mahasiswa** sebelum section Kontak.
- Membuat formulir dengan metode `POST` dan lima input:
  - Nama Kegiatan
  - Kategori Kegiatan
  - Tanggal Pelaksanaan
  - Lokasi Kegiatan
  - Deskripsi Kegiatan
- Menambahkan penanda `form_type` agar PHP dapat membedakan POST formulir kegiatan dari POST formulir Kontak yang sudah ada.
- Menormalisasi input teks dengan `trim()`, memeriksa tipe data agar nilai POST bukan array, lalu memvalidasi data di sisi server:
  - Nama kegiatan: 3-100 karakter.
  - Kategori: harus salah satu dari Akademik, Organisasi, Sosial, atau Lainnya.
  - Tanggal: harus sesuai format tanggal `YYYY-MM-DD` dan merupakan tanggal yang valid.
  - Lokasi: 2-100 karakter.
  - Deskripsi: 10-500 karakter.
- Menyimpan data valid ke session. Jika data tidak valid, menyimpan pesan kesalahan dan nilai input agar pengguna dapat memperbaikinya.
- Menggunakan pola Post-Redirect-Get: setelah POST, browser diarahkan kembali ke `index.php#rencana-kegiatan`.
- Menampilkan hasil kegiatan dari session. Nilai yang dimasukkan pengguna di-escape dengan `htmlspecialchars()` sebelum ditampilkan; baris baru pada deskripsi ditampilkan menggunakan `nl2br()`.
- Memisahkan pemrosesan formulir kegiatan dari pemrosesan formulir Kontak agar fitur Kontak tetap bekerja seperti sebelumnya.

### `bahan-pertemuan-08/script.js`

- Menambahkan validasi sisi klien untuk kelima input kegiatan dengan aturan batas yang sama seperti validasi PHP.
- Menampilkan pesan kesalahan jika input belum valid dan membersihkan pesan ketika pengguna mengubah input atau menekan **Batal**.
- Mengirim form ke PHP setelah validasi berhasil.
- Mempertahankan kode navigasi responsif dan validasi formulir Kontak yang sudah tersedia.

### `bahan-pertemuan-08/style.css`

- Menata section kegiatan menggunakan warna, border, padding, label, tombol, dan gaya textarea yang mengikuti pola section Kontak.
- Membentangkan section kegiatan selebar area utama pada layar yang lebih lebar.

### `bahan-pertemuan-08/README.md`

Berisi deskripsi singkat fitur, petunjuk menjalankan aplikasi lokal, dan ringkasan hasil pengujian.

## Cara Menjalankan

1. Letakkan repository di document root Laragon, misalnya `C:\laragon\www\pwd\2611500017-PWD-TI1A-2627O`.
2. Jalankan Apache dari Laragon.
3. Buka <http://localhost/pwd/2611500017-PWD-TI1A-2627O/pertemuan-08/bahan-pertemuan-08/>.
4. Pilih menu **Rencana Kegiatan**, isi seluruh input sesuai aturan validasi, lalu tekan **Kirim**.
5. Data yang berhasil disimpan akan muncul pada section yang sama setelah redirect. Tombol **Batal** mengosongkan input.

## Hasil Pengujian

Pengujian dilakukan pada 2 November 2026 melalui PHP lokal dan browser.

- `php -l` pada `bahan-pertemuan-08/index.php`: lulus, tidak ada kesalahan sintaks.
- Menu Rencana Kegiatan menuju section baru dan navigasi responsif dapat dibuka.
- Validasi JavaScript menampilkan pesan ketika formulir kegiatan dikirim dalam keadaan kosong.
- POST kosong ditolak oleh PHP dan pesan validasi tampil.
- POST dengan data valid mengikuti redirect ke `#rencana-kegiatan` dan hasil kelima input ditampilkan.
- Input nama yang berisi tag `<script>` ditampilkan sebagai teks ter-escape, tidak dijalankan sebagai markup.
- Tombol **Batal** mengosongkan input formulir.
- POST formulir Kontak tetap menampilkan hasilnya.
- `git diff --check` tidak menemukan kesalahan whitespace pada perubahan.

## Git/GitHub

Catat perkembangan dan hasil pengujian berikutnya di README ini. Setelah meninjau perubahan, kirim ke repository GitHub secara bertahap:

```powershell
git add pertemuan-08/README.md pertemuan-08/bahan-pertemuan-08/index.php pertemuan-08/bahan-pertemuan-08/script.js pertemuan-08/bahan-pertemuan-08/style.css pertemuan-08/bahan-pertemuan-08/README.md
git commit -m "Menambahkan formulir rencana kegiatan"
$branch = git branch --show-current
git push -u origin $branch
```
