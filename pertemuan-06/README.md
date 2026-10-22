# Pertemuan 6 - Dasar Pemrograman PHP

## Perubahan

- P6 dikembangkan sebagai salinan P5 di direktori ini. Berkas artefak P5 tetap tidak diubah.
- `index.php` menghasilkan judul, identitas, tahun, tipe data, perhitungan, kategori, dan daftar belajar menggunakan PHP di sisi peladen.
- PHP menggunakan variabel, tipe data, dan operator di sisi peladen; nilai variabel serta hasil perhitungan tidak ditampilkan sebagai data di halaman.
- Fungsi kategori semester menerapkan `if`, `elseif`, dan `else` untuk contoh semester 1, 4, dan 7.
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
| Buka `/index.php` melalui server lokal | HTTP 200; judul, identitas, tahun, serta bagian PHP tampil. Tidak ditemukan pesan PHP Warning, Fatal error, Parse error, atau Notice pada keluaran. |
| Variabel, tipe data, dan operator | PHP menggunakan nilai di sisi peladen, tetapi nilai variabel dan hasil perhitungan tidak ditampilkan sebagai daftar data pada halaman. |
| `if - elseif - else` | Semester 1 masuk tahap dasar; semester 4 tahap pengembangan; semester 7 tahap lanjutan. Tidak ada contoh sampai semester 15. |
| `switch` | Kode TI menghasilkan Teknik Informatika, SI menghasilkan Sistem Informasi, dan DKV menjalankan cabang default. |
| Perulangan `for` | Menghasilkan tepat tiga target belajar. |
| Perulangan `while` | Menghasilkan tepat tiga latihan, dari latihan ke-1 sampai ke-3, lalu berhenti. |
| Aset halaman | `/style.css`, `/script.js`, dan `/img/foto-profil.jpg` masing-masing merespons HTTP 200. |
| Browser desktop 1365 px | Layout grid empat baris tampil sesuai deklarasi; tombol navigasi mobile tersembunyi. |
| Kontak dan GitHub | Form kontak tidak ada pada halaman; tautan profil GitHub tampil pada footer bersama informasi hak cipta. |
| Navigasi browser | Tombol Menu membuka navigasi dan menampilkan tautan Beranda, Tentang, dan GitHub; tautan GitHub mengarahkan ke footer. |
| Tampilan nilai variabel | Halaman tidak menampilkan daftar nilai/tipe, IPK, jumlah topik, semester berikutnya, atau hasil progres. |

### Debugging

Pada pemuatan browser pertama sebelumnya, permintaan otomatis ke `/favicon.ico` menghasilkan HTTP 404. Favicon data kosong ditambahkan dan pemuatan ulang tidak lagi meminta favicon yang gagal. Perubahan lanjutan diuji kembali: form tidak ada sehingga event handler form terkait juga dihapus dari JavaScript; navigasi tetap dapat dipakai. Seluruh hasil terbaru dicatat setelah pengujian ulang.

## Pengelolaan Git

Perubahan P6 dibuat bertahap dalam commit terpisah untuk kerangka PHP, tipe data dan operator, percabangan, tiap perulangan, tata letak, serta perbaikan debugging. Setiap tahap kode di-lint atau diuji pada keluaran yang relevan, lalu commit di-push ke branch `main`. Dokumentasi pengujian ini juga dikelola dalam commit tersendiri.
