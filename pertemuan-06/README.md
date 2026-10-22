# Pertemuan 6 - Dasar Pemrograman PHP

## Perubahan

- P6 dikembangkan sebagai salinan P5 di direktori ini. Berkas artefak P5 tetap tidak diubah.
- `index.php` menghasilkan judul, biodata, kategori, dan daftar belajar menggunakan PHP di sisi peladen.
- Biodata nama, NIM, dan program studi ditampilkan secara jelas pada bagian tersendiri.
- Fungsi kategori semester menerapkan `if`, `elseif`, dan `else` untuk contoh semester 1, 4, dan 7.
- Panel `if-elseif-else` dan `switch` memakai pola tampilan yang seragam: penjelasan singkat dan daftar hasil.
- Panel perulangan `for` dan `while` direntangkan agar tingginya sama pada baris desktop.
- Pemetaan kode program studi menerapkan `switch` dan cabang `default`.
- Daftar target belajar dihasilkan dengan `for`; daftar latihan dihasilkan dengan `while` yang berhenti setelah tiga iterasi.
- Keluaran teks dinamis di-escape untuk konteks HTML.
- Form kontak tidak ditampilkan di P6; pemrosesan form tetap menjadi materi P7.
- Tautan profil GitHub tersedia pada footer di samping informasi hak cipta.
- Permintaan favicon yang semula menghasilkan 404 saat pengujian browser diatasi dengan favicon data kosong.

## Cara Menjalankan

Pastikan PHP CLI tersedia. Dari direktori root repositori jalankan:

```powershell
php -S 127.0.0.1:8000 -t pertemuan-06
```

Buka `http://127.0.0.1:8000/` di browser. Untuk menghentikan server, tekan `Ctrl+C` pada terminal.

Jika PHP Laragon belum ada di PATH, gunakan executable PHP Laragon, misalnya:

```powershell
C:\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe -S 127.0.0.1:8000 -t pertemuan-06
```

Perintah lint dari root repositori:

```powershell
php -l pertemuan-06\index.php
```

## Pengujian Aktual

Pengujian dijalankan pada 22 Oktober 2026 dengan PHP 8.3.33 CLI dan server bawaan PHP. Server lokal yang diuji menggunakan `127.0.0.1:8076` (direktori dokumen `pertemuan-06`).

| Pemeriksaan | Hasil aktual |
| --- | --- |
| `php -l pertemuan-06\index.php` | Tidak ada kesalahan sintaks. |
| Buka `/index.php` melalui server lokal | HTTP 200; judul, biodata nama/NIM/program studi, tahun, serta bagian PHP tampil. Tidak ditemukan pesan PHP Warning, Fatal error, Parse error, atau Notice pada keluaran. |
| `if - elseif - else` | Semester 1 masuk tahap dasar; semester 4 tahap pengembangan; semester 7 tahap lanjutan. Tidak ada contoh sampai semester 15. |
| `switch` | Kode TI menghasilkan Teknik Informatika, SI menghasilkan Sistem Informasi, dan DKV menjalankan cabang default. |
| Perulangan `for` | Menghasilkan tepat tiga target belajar. |
| Perulangan `while` | Menghasilkan tepat tiga latihan, dari latihan ke-1 sampai ke-3, lalu berhenti. |
| Tampilan panel perulangan | Pada viewport desktop 1365 px, panel `for` dan `while` sama-sama setinggi 268 px. |
| Aset halaman | `/style.css`, `/script.js`, dan `/img/foto-profil.jpg` masing-masing merespons HTTP 200. |
| Browser desktop 1365 px | Layout grid empat baris tampil sesuai deklarasi; tombol navigasi mobile tersembunyi. |
| Kontak dan GitHub | Form kontak tidak ada pada halaman; tautan profil GitHub tampil pada footer bersama informasi hak cipta. |
| Biodata mahasiswa | Nama Farel Dwi Abdillah, NIM 2611500017, dan program studi Teknik Informatika tampil pada panel biodata. |
| Navigasi browser | Tombol Menu membuka navigasi dan menampilkan tautan Beranda, Tentang, dan GitHub; tautan GitHub mengarahkan ke footer. |

### Debugging

Pada pemuatan browser pertama sebelumnya, permintaan otomatis ke `/favicon.ico` menghasilkan HTTP 404. Favicon data kosong ditambahkan dan pemuatan ulang tidak lagi meminta favicon yang gagal. Perubahan lanjutan diuji kembali: form tidak ada sehingga event handler form terkait juga dihapus dari JavaScript; navigasi tetap dapat dipakai. Seluruh hasil terbaru dicatat setelah pengujian ulang.

## Pengelolaan Git

Perubahan P6 dibuat bertahap dalam commit terpisah untuk kerangka PHP, tipe data dan operator, percabangan, tiap perulangan, tata letak, serta perbaikan debugging. Setiap tahap kode di-lint atau diuji pada keluaran yang relevan, lalu commit di-push ke branch `main`. Dokumentasi pengujian ini juga dikelola dalam commit tersendiri.
