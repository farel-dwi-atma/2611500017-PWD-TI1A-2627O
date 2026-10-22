# Pertemuan 6 - PHP

## Isi

Halaman profil menggunakan PHP untuk menampilkan biodata dan contoh percabangan `if-elseif-else`, `switch`, serta perulangan `for` dan `while`. Form belum disertakan karena akan dipelajari pada P7. Artefak P5 tetap tidak diubah.

## Cara Menjalankan

Dari folder utama proyek, jalankan:

```powershell
php -S 127.0.0.1:8000 -t pertemuan-06
```

Buka `http://127.0.0.1:8000/` di browser. Tekan `Ctrl+C` untuk menghentikan server.

## Hasil Pengujian

Pengujian dilakukan pada 22 Oktober 2026 menggunakan PHP 8.3.33.

- `php -l pertemuan-06\index.php`: lulus, tidak ada kesalahan sintaks.
- Localhost: halaman dan aset CSS, JavaScript, serta gambar merespons HTTP 200.
- Percabangan: semester 1, 4, dan 7 menampilkan kategori yang sesuai; `switch` menguji kode TI, SI, dan nilai bawaan.
- Perulangan: `for` menghasilkan tiga target belajar dan `while` menghasilkan tiga latihan.
- Browser: tombol hamburger berfungsi pada lebar 375 px; panel `for` dan `while` sama tinggi pada desktop 1365 px.
