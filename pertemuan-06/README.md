# Pertemuan 6 - Dasar Pemrograman PHP

## Perubahan

- P6 dikembangkan sebagai salinan P5 di direktori ini. Berkas artefak P5 tetap tidak diubah.
- `index.php` menghasilkan judul, identitas, tahun, tipe data, perhitungan, kategori, dan daftar belajar menggunakan PHP di sisi peladen.
- Contoh variabel dan tipe data meliputi string, integer, float, boolean, dan array. Operator aritmetika, perbandingan, logika, serta ternary ditampilkan bersama hasilnya.
- Fungsi kategori semester menerapkan `if`, `elseif`, dan `else`, termasuk contoh nilai di luar rentang.
- Pemetaan kode program studi menerapkan `switch` dan cabang `default`.
- Daftar target belajar dihasilkan dengan `for`; daftar latihan dihasilkan dengan `while` yang berhenti setelah tiga iterasi.
- Keluaran teks dinamis di-escape untuk konteks HTML.
- Form dan JavaScript validasi dari P5 dipertahankan sebagai perilaku sisi browser. P6 tidak memproses atau menyimpan data form di PHP; pemrosesan form merupakan materi P7.
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
| Buka `/index.php` melalui server lokal | HTTP 200; judul, identitas, tahun, serta bagian PHP tampil. Tidak ditemukan pesan PHP Warning, Fatal error, Parse error, atau Notice pada keluaran. |
| Tipe data dan operator | Ditampilkan string, int, float, bool, dan array; hitungan topik 3, semester berikutnya 5, progres 50%, dan rentang semester valid. |
| `if - elseif - else` | Semester 0 dan 15 masuk kategori di luar rentang; semester 1 masuk tahap dasar; semester 4 tahap pengembangan; semester 7 tahap lanjutan. |
| `switch` | Kode TI menghasilkan Teknik Informatika, SI menghasilkan Sistem Informasi, dan DKV menjalankan cabang default. |
| Perulangan `for` | Menghasilkan tepat tiga target belajar. |
| Perulangan `while` | Menghasilkan tepat tiga latihan, dari latihan ke-1 sampai ke-3, lalu berhenti. |
| Aset halaman | `/style.css`, `/script.js`, dan `/img/foto-profil.jpg` masing-masing merespons HTTP 200. |
| Browser desktop 1365 px | Layout grid lima baris tampil sesuai deklarasi; tombol navigasi mobile tersembunyi. |
| Navigasi browser | Tombol Menu membuka navigasi dan menampilkan tautan Beranda, Tentang, dan Kontak. |

### Debugging

Pada pemuatan browser pertama, permintaan otomatis ke `/favicon.ico` menghasilkan HTTP 404. Favicon data kosong ditambahkan, lalu halaman dimuat ulang dan aset utama diperiksa kembali; tidak ada permintaan favicon yang gagal pada pengujian ulang. Seluruh uji keluaran PHP, cabang, loop, dan aset di atas dijalankan kembali dan lulus.

## Pengelolaan Git

Perubahan P6 dibuat bertahap dalam commit terpisah untuk kerangka PHP, tipe data dan operator, percabangan, tiap perulangan, tata letak, serta perbaikan debugging. Setiap tahap kode di-lint atau diuji pada keluaran yang relevan, lalu commit di-push ke branch `main`. Dokumentasi pengujian ini juga dikelola dalam commit tersendiri.
