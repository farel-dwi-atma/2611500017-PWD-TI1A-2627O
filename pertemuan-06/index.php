<?php
declare(strict_types=1);

const JUDUL_HALAMAN = 'Profil Mahasiswa';
const NIM_MAHASISWA = '2611500017';

$namaMahasiswa = 'Farel Dwi Abdillah';
$tahunSekarang = date('Y');
$semester = 4;
$ipk = 3.75;
$aktif = true;
$topikBelajar = ['HTML', 'CSS', 'PHP'];
$jumlahTopik = count($topikBelajar);
$semesterBerikutnya = $semester + 1;
$progressBelajar = ($semester / 8) * 100;
$rentangSemesterValid = $semester >= 1 && $semester <= 14;

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= e(JUDUL_HALAMAN) ?></title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <h1><?= e(JUDUL_HALAMAN) ?></h1>
            <button class="nav-toggle" id="navToggle" type="button" aria-controls="navMenu"
                aria-expanded="false" aria-label="Buka navigasi">Menu</button>
            <nav id="navMenu" aria-label="Navigasi utama">
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container main-grid">
        <section id="home" class="panel">
            <h2>Selamat Datang</h2>
            <p>Halo, saya <?= e($namaMahasiswa) ?>. Saya sedang mempelajari Pemrograman Web Dasar.</p>
            <img class="profile-photo" src="img/foto-profil.jpg"
                alt="Foto profil Farel Dwi Abdillah" width="175" height="175" />
        </section>

        <section id="about" class="panel">
            <h2>Tentang Saya</h2>
            <article>
                <h3>Profil Singkat</h3>
                <p>Saya mahasiswa Program Studi Teknik Informatika.</p>
                <h3>Target Belajar</h3>
                <ol>
                    <li>Memahami struktur HTML5.</li>
                    <li>Menyusun halaman web semantik.</li>
                    <li>Memvalidasi dokumen HTML.</li>
                </ol>
            </article>
        </section>

        <section id="data-php" class="panel">
            <h2>Variabel, Tipe Data, dan Operator PHP</h2>
            <p>Nilai berikut dibuat dan dihitung oleh PHP di sisi peladen.</p>
            <dl>
                <dt>Nama (<?= e(get_debug_type($namaMahasiswa)) ?>)</dt>
                <dd><?= e($namaMahasiswa) ?></dd>
                <dt>Semester (<?= e(get_debug_type($semester)) ?>)</dt>
                <dd><?= e((string) $semester) ?></dd>
                <dt>IPK (<?= e(get_debug_type($ipk)) ?>)</dt>
                <dd><?= e((string) $ipk) ?></dd>
                <dt>Status aktif (<?= e(get_debug_type($aktif)) ?>)</dt>
                <dd><?= $aktif ? 'Ya' : 'Tidak' ?></dd>
                <dt>Topik belajar (<?= e(get_debug_type($topikBelajar)) ?>)</dt>
                <dd><?= e(implode(', ', $topikBelajar)) ?></dd>
                <dt>Operator</dt>
                <dd>
                    Ada <?= e((string) $jumlahTopik) ?> topik; semester berikutnya
                    <?= e((string) $semesterBerikutnya) ?>; progres
                    <?= e((string) $progressBelajar) ?>%; rentang semester
                    <?= $rentangSemesterValid ? 'valid' : 'perlu diperiksa' ?>.
                </dd>
            </dl>
        </section>

        <section id="contact" class="panel">
            <h2>Kontak</h2>
            <p>
                Kunjungi
                <a href="https://github.com/farel-dwi-atma/2611500017-PWD-TI1A-2627O">
                    profil GitHub saya
                </a>.
            </p>

            <form id="contactForm" novalidate>
                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input class="input-form" type="text" id="nama" name="nama"
                        placeholder="Masukkan nama lengkap" minlength="3" maxlength="50" required />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input-form" type="email" id="email" name="email"
                        placeholder="nama@email.com" required />
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input class="input-form" type="number" id="semester" name="semester"
                        min="1" max="14" required />
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input class="input-form" type="date" id="tanggal" name="tanggal"
                        required />
                </div>

                <fieldset class="form-group choice-group">
                    <legend>Jenis Pesan</legend>
                    <label><input type="radio" name="jenis_pesan" value="pertanyaan" required /> Pertanyaan</label>
                    <label><input type="radio" name="jenis_pesan" value="saran" /> Saran</label>
                </fieldset>

                <fieldset class="form-group choice-group">
                    <legend>Topik yang Diminati</legend>
                    <label><input type="checkbox" name="minat" value="HTML" /> HTML</label>
                    <label><input type="checkbox" name="minat" value="CSS" /> CSS</label>
                </fieldset>

                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <select class="input-form" id="prodi" name="prodi" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="SI">Sistem Informasi</option>
                        <option value="TI">Teknik Informatika</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea class="input-form" id="pesan" name="pesan" maxlength="300"
                        placeholder="Tulis pesan Anda" rows="5" required></textarea>
                </div>

                <p class="form-note">Form ini hanya divalidasi di browser. Data tidak dikirim atau disimpan.</p>
                <p class="form-feedback" id="formFeedback" role="status" aria-live="polite"></p>

                <div class="button-group">
                    <button type="submit">Kirim</button>
                    <button class="button-secondary" type="reset">Batal</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; <?= e($tahunSekarang) ?> <?= e($namaMahasiswa) ?> [<?= e(NIM_MAHASISWA) ?>]</p>
    </footer>
</body>
</html>