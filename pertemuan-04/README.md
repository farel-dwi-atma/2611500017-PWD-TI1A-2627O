# Pertemuan 4 — Layout dan Responsive Design

## Perkembangan

Artefak profil mahasiswa dari Pertemuan 3 dikembangkan di direktori ini. CSS telah dipisahkan ke `style.css` dan ditautkan dari `index.html`. Implementasi menggunakan CSS biasa tanpa framework.

- **CSS Box Model:** `box-sizing: border-box` diterapkan secara global; panel, form, tombol, dan elemen lain menggunakan padding, border, serta margin yang sesuai.
- **Flexbox:** navigasi menggunakan Flexbox dengan `flex-wrap` agar tautan tetap rapi pada layar sempit. Judul header dan navigasi ditata rata tengah.
- **CSS Grid:** `.main-grid` memakai satu kolom sebagai layout dasar dan menjadi dua kolom dengan area bernama pada viewport desktop.
- **Mobile-first:** layout dasar berlaku di bawah `768px`; media query `min-width: 768px` menambahkan tata letak desktop.
- **Kenyamanan penggunaan:** gambar responsif, input form memenuhi lebar panel, navigasi dapat membungkus, dan elemen interaktif memiliki indikator fokus.

## Pengujian viewport

Halaman diperiksa di browser pada ukuran viewport berikut. Pemeriksaan memastikan layout, judul header, gambar profil, dan lebar dokumen.

| Kategori | Ukuran viewport | Yang diperiksa | Hasil aktual |
| --- | ---: | --- | --- |
| Mobile | 375px | Navigasi, form, gambar, dan scroll horizontal | Lulus; satu kolom, foto termuat, judul rata tengah, tidak ada overflow horizontal |
| Mobile | 767px | Layout sebelum breakpoint | Lulus; satu kolom dan tidak ada overflow horizontal |
| Desktop | 768px | Peralihan pada breakpoint dan posisi header | Lulus; grid menjadi dua kolom, judul tetap rata tengah, tidak ada overflow horizontal |
| Desktop | 1366px | Lebar konten, posisi panel, navigasi, dan gambar | Lulus; grid dua kolom, foto termuat, tidak ada overflow horizontal |

Pemeriksaan dilakukan dengan mengatur ukuran viewport pada browser terintegrasi. Perbaikan yang diterapkan: header desktop sebelumnya memakai susunan baris; aturan breakpoint diubah menjadi kolom dengan alignment tengah agar judul tetap rata tengah bersama navigasi pada layar desktop. Pemeriksaan ini bukan dilakukan melalui panel DevTools browser lokal.

## Validasi CSS

Validasi dilakukan menggunakan [W3C CSS Validation Service](https://jigsaw.w3.org/css-validator/) terhadap `style.css` pada 13 Oktober 2026.

- Hasil validasi: Valid.
- Galat: 0.
- Peringatan: 0.
- Perbaikan berdasarkan hasil validator: Tidak ada; stylesheet lolos validasi.

## Struktur berkas

- `index.html` — halaman profil mahasiswa.
- `style.css` — aturan Box Model, Flexbox, Grid, dan responsive design.
- `img/foto-profil.jpg` — foto profil.
- `.gitkeep` — dipertahankan sesuai arahan dosen.