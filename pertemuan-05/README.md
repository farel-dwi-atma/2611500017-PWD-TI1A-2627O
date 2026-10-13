# Pertemuan 5

## Perubahan

- P5 dibuat sebagai salinan artefak P4; berkas P4 tidak diubah.
- Navigasi memiliki tombol menu pada layar di bawah 768px. Menu dapat dibuka, ditutup dengan tombol Escape, atau ditutup setelah tautan dipilih.
- Validasi form mengikuti urutan pada template modul. Hasil validasi ditampilkan pada satu area feedback.
- Nama dibatasi 3 sampai 50 karakter, email mengikuti pola alamat email, semester harus berada pada rentang 1 sampai 14, dan minimal satu topik harus dipilih.
- Pesan **“Form berhasil divalidasi.”** hanya berarti aturan sisi klien terpenuhi. Data tidak dikirim ke server atau disimpan.

## Cara Menjalankan

Buka `index.html` di browser. Tidak diperlukan framework atau server.

## Pengujian

Pengujian dilakukan di browser pada viewport 375px dan 768px. Hasil aktual dicatat setelah setiap interaksi diuji.

### Navigasi

- 375px, menu awal tertutup: diharapkan tautan tersembunyi; aktual sesuai. **Lulus.**
- Tombol Menu diklik: diharapkan tautan tampil dan `aria-expanded` menjadi `true`; aktual sesuai. **Lulus.**
- Tautan bagian dipilih: diharapkan halaman menuju bagian dan menu tertutup; aktual sesuai. **Lulus.**
- Tombol Escape ditekan saat menu terbuka: diharapkan menu tertutup dan fokus kembali ke tombol; aktual sesuai. **Lulus.**
- 768px: diharapkan tautan tampil dan tombol Menu tersembunyi; aktual sesuai. **Lulus.**

### Validasi Form

- Nama kosong: diharapkan ditolak dengan pesan aturan nama; aktual sesuai. **Lulus.**
- Nama 2 karakter atau 51 karakter: diharapkan ditolak; aktual sesuai. **Lulus.**
- Nama 3 atau 50 karakter: diharapkan diterima; aktual sesuai. **Lulus.**
- Email kosong atau format salah: diharapkan ditolak; aktual sesuai. **Lulus.**
- Semester kosong, 0, atau 15: diharapkan ditolak; aktual sesuai. **Lulus.**
- Semester 1, 14, dan 1.5: diharapkan diterima sesuai pengecekan rentang pada template; aktual sesuai. **Lulus.**
- Tanggal kunjungan kosong: diharapkan ditolak; aktual sesuai. **Lulus.**
- Jenis pesan belum dipilih: diharapkan ditolak; aktual sesuai. **Lulus.**
- Program studi belum dipilih: diharapkan ditolak; aktual sesuai. **Lulus.**
- Tidak ada topik dipilih: diharapkan ditolak; aktual sesuai. **Lulus.**
- Pesan kosong atau 301 karakter: diharapkan ditolak; aktual sesuai. **Lulus.**
- Pesan 300 karakter: diharapkan diterima; aktual sesuai. **Lulus.**
- Semua data wajib valid: diharapkan muncul pesan “Form berhasil divalidasi.” tanpa mengirim data; aktual sesuai dan halaman tidak berpindah. **Lulus.**
- Tombol Batal setelah validasi gagal: diharapkan isian, pesan, dan penanda error dibersihkan; aktual sesuai. **Lulus.**
- Input setelah feedback tampil: diharapkan feedback dikosongkan; aktual sesuai. **Lulus.**

## Debugging

Setelah halaman dimuat ulang, JavaScript, CSS, dan gambar berhasil dimuat. Tidak ditemukan error console, error JavaScript, atau request aset yang gagal. Tidak ada perbaikan tambahan setelah pengujian.

Pemeriksaan sintaks `script.js` menggunakan Node.js v22.23.2 juga lulus (`node --check`).