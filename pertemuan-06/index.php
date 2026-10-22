<?php
declare(strict_types=1);

const JUDUL_HALAMAN = 'Profil Mahasiswa';
const NIM_MAHASISWA = '2611500017';

$namaMahasiswa = 'Farel Dwi Abdillah';
$tahunSekarang = date('Y');

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function kategoriSemester(int $semester): string
{
    if ($semester <= 2) {
        return 'Tahap dasar';
    } elseif ($semester <= 6) {
        return 'Tahap pengembangan';
    } else {
        return 'Tahap lanjutan';
    }
}

function namaProgramStudi(string $kode): string
{
    switch ($kode) {
        case 'TI':
            return 'Teknik Informatika';
        case 'SI':
            return 'Sistem Informasi';
        default:
            return 'Program studi belum terdaftar';
    }
}

$contohSemester = [1, 4, 7];
$contohProgram = ['TI', 'SI', 'DKV'];
$kodeProgram = 'TI';
$targetBelajar = [
    'Membuat halaman web dengan PHP',
    'Mengolah variabel, tipe data, dan operator',
    'Menggunakan percabangan dan perulangan',
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="data:," />
    <title><?= e(JUDUL_HALAMAN) ?></title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <h1><?= e(JUDUL_HALAMAN) ?></h1>
            <button class="nav-toggle" id="navToggle" type="button" aria-controls="navMenu"
                aria-expanded="false" aria-label="Buka navigasi">
                <span class="hamburger-icon" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            <nav id="navMenu" aria-label="Navigasi utama">
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#github">GitHub</a></li>
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

        <section id="biodata" class="panel">
            <h2>Biodata Mahasiswa</h2>
            <dl>
                <dt>Nama</dt>
                <dd><?= e($namaMahasiswa) ?></dd>
                <dt>NIM</dt>
                <dd><?= e(NIM_MAHASISWA) ?></dd>
                <dt>Program Studi</dt>
                <dd><?= e(namaProgramStudi($kodeProgram)) ?></dd>
            </dl>
        </section>

        <section id="percabangan" class="panel">
            <h2>Percabangan if - elseif - else</h2>
            <p>Semester ditentukan dengan percabangan <code>if</code>, <code>elseif</code>, dan <code>else</code>.</p>
            <ul>
                <?php foreach ($contohSemester as $contoh): ?>
                    <li>Semester <?= e((string) $contoh) ?>: <?= e(kategoriSemester($contoh)) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="switch" class="panel">
            <h2>Percabangan switch</h2>
            <p>Program studi ditentukan dengan percabangan <code>switch</code>, termasuk cabang <code>default</code>.</p>
            <ul>
                <?php foreach ($contohProgram as $kode): ?>
                    <li><?= e($kode) ?>: <?= e(namaProgramStudi($kode)) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="perulangan-for" class="panel">
            <h2>Perulangan for</h2>
            <p>Daftar target belajar dibuat oleh PHP menggunakan perulangan <code>for</code>.</p>
            <ol>
                <?php for ($index = 0; $index < count($targetBelajar); $index++): ?>
                    <li><?= e($targetBelajar[$index]) ?></li>
                <?php endfor; ?>
            </ol>
        </section>

        <section id="perulangan-while" class="panel">
            <h2>Perulangan while</h2>
            <p>Penghitung bertambah pada setiap iterasi hingga mencapai tiga latihan.</p>
            <ol>
                <?php
                $pertemuanSaatIni = 1;
                $jumlahPertemuan = 3;
                while ($pertemuanSaatIni <= $jumlahPertemuan):
                ?>
                    <li>Latihan ke-<?= e((string) $pertemuanSaatIni) ?></li>
                <?php
                    $pertemuanSaatIni++;
                endwhile;
                ?>
            </ol>
        </section>

    </main>

    <footer class="site-footer" id="github">
        <p>&copy; <?= e($tahunSekarang) ?> <?= e($namaMahasiswa) ?> [<?= e(NIM_MAHASISWA) ?>]</p>
        <a href="https://github.com/farel-dwi-atma/2611500017-PWD-TI1A-2627O">
            Profil GitHub
        </a>
    </footer>
</body>
</html>