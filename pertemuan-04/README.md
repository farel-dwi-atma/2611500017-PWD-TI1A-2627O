# Pertemuan 4

## Perkembangan

CSS halaman profil mahasiswa dipisahkan ke `style.css`. Box Model diterapkan pada elemen halaman, Flexbox digunakan untuk navigasi, dan CSS Grid digunakan untuk tata letak konten. Desain dibuat mobile-first tanpa framework CSS. Pada layar desktop, judul dan navigasi tetap rata tengah.

## Pengujian tampilan

Halaman diperiksa pada beberapa ukuran viewport:

| Ukuran | Hasil |
| --- | --- |
| 375px | Layout satu kolom, gambar tampil, tidak ada scroll horizontal. |
| 767px | Layout tetap satu kolom dan tidak ada scroll horizontal. |
| 768px | Layout berubah menjadi dua kolom; judul tetap rata tengah. |
| 1366px | Layout dua kolom, gambar tampil, tidak ada scroll horizontal. |

Perbaikan yang dilakukan: susunan header desktop diubah agar judul tetap rata tengah.

## Validasi CSS

`style.css` divalidasi menggunakan [W3C CSS Validation Service](https://jigsaw.w3.org/css-validator/) pada 13 Oktober 2026. Hasilnya valid, dengan 0 galat dan 0 peringatan. Tidak ada perbaikan tambahan dari hasil validasi.
