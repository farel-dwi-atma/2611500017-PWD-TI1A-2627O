<?php
declare(strict_types=1);

const NIM_MAHASISWA = "2611500017";
const NAMA_MAHASISWA = "Farel Dwi Abdillah";
const PROGRAM_STUDI = "TI";
const TAHUN_AKADEMIK = "2026/2027";
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "farel-dwi-atma";

function e(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

$semester = 1;
$ipk = 0.00;
$statusAktif = true;
$catatanTambahan = null;
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = PROGRAM_STUDI === "SI" ? "Sistem Informasi" : (PROGRAM_STUDI === "TI" ? "Teknik Informatika" : "Lainnya");

switch (PROGRAM_STUDI) {
	case "SI":
		$fokusProgramStudi = "Sistem informasi dan proses bisnis";
		break;
	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	default:
		$fokusProgramStudi = "Belum ditentukan";
}
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Profil Mahasiswa</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<header>
		<div class="header-top">
			<h1>Profil Mahasiswa</h1>
			<button
				class="nav-toggle"
				id="navToggle"
				type="button"
				aria-label="Buka navigasi"
				aria-controls="navMenu"
				aria-expanded="false">
				&#9776;
			</button>
		</div>
		<nav aria-label="Navigasi utama">
			<ul id="navMenu">
				<li><a href="#home">Beranda</a></li>
				<li><a href="#about">Tentang</a></li>
				<li><a href="#contact">Kontak</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<section id="home">
			<h2>Selamat Datang</h2>
			<p>
				Halo, saya <strong><?= e(NAMA_MAHASISWA) ?></strong>. Saya sedang mempelajari
				matakuliah <strong><?= e(NAMA_MATA_KULIAH) ?></strong> pada tahun akademik
				<?= e(TAHUN_AKADEMIK) ?>.
			</p>
			<img src="img/foto-profil.jpg" alt="Foto profil <?= e(NAMA_MAHASISWA) ?>" />
		</section>

		<section id="about">
			<h2>Tentang Saya</h2>
			<article>
				<h3>Profil Singkat</h3>
				<p>Program Studi: <?= e($namaProdi . " (" . PROGRAM_STUDI . ")") ?></p>
				<p>Fokus program studi: <?= e($fokusProgramStudi) ?></p>
				<p>Status mahasiswa: <?= $statusAktif ? "Aktif" : "Tidak aktif" ?></p>
				<p>Semester: <?= $semester ?> (<?= e($keteranganSemester) ?>)</p>
				<p>Sisa semester hingga batas: <?= $sisaSemester ?></p>
				<p>Pemeriksaan rentang semester: <?= e($statusSemester) ?></p>
				<p>IPK: <?= number_format($ipk, 2, ",", ".") ?></p>
				<p>Catatan tambahan: <?= e($catatanTambahan ?? "Belum ada") ?></p>

				<h3>Target Belajar (Perulangan for)</h3>
				<ol>
					<?php
					for ($index = 1; $index <= 5; $index++) {
						echo "<li>Target belajar ke-" . $index . ": ";
						switch ($index) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
						}
						echo "</li>";
					}
					?>
				</ol>

				<h3>Semester (Perulangan while)</h3>
				<ol>
					<?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++;
					}
					?>
				</ol>
			</article>
		</section>

		<section id="contact">
			<h2>Kontak</h2>
			<p>
				Kunjungi
				<a
					target="_blank"
					rel="noopener noreferrer"
					href="https://github.com/<?= e(PROFIL_GITHUB) ?>">profil GitHub saya</a>.
			</p>

			<?php if ($formSubmitted): ?>
				<div
					id="formResult"
					class="<?= $formErrors === [] ? "form-feedback-success" : "form-feedback-error" ?>"
					role="status"
					aria-live="polite">
					<?php if ($formErrors === []): ?>
						<h3>Pesan berhasil diproses</h3>
						<p>Terima kasih, <?= e($formData["nama"]) ?>. Berikut ringkasan pesan Anda:</p>
						<ul>
							<li>Email: <?= e($formData["email"]) ?></li>
							<li>Semester: <?= e($formData["semester"]) ?></li>
							<li>Tanggal kunjungan: <?= e($formData["tanggal"]) ?></li>
							<li>Jenis pesan: <?= e(ucfirst($formData["jenis_pesan"])) ?></li>
							<li>Topik: <?= e(implode(", ", $formData["minat"])) ?></li>
							<li>Program studi: <?= e($formData["prodi"]) ?></li>
							<li>Pesan: <?= e($formData["pesan"]) ?></li>
						</ul>
					<?php else: ?>
						<h3>Form belum dapat diproses</h3>
						<ul>
							<?php foreach ($formErrors as $error): ?>
								<li><?= e($error) ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<form id="contactForm" action="<?= e($formAction) ?>" method="<?= e($formMethod) ?>">
				<div class="form-group">
					<label for="nama">Nama Lengkap</label><br />
					<input
						class="input-form"
						type="text"
						id="nama"
						name="nama"
						placeholder="Masukkan nama lengkap"
						value="<?= e($formData["nama"]) ?>"
						minlength="3"
						maxlength="50"
						required />
				</div>

				<div class="form-group">
					<label for="email">Email</label><br />
					<input
						class="input-form"
						type="email"
						id="email"
						name="email"
						placeholder="nama@email.com"
						value="<?= e($formData["email"]) ?>"
						required />
				</div>

				<div class="form-group">
					<label for="semester">Semester</label><br />
					<input
						class="input-form"
						type="number"
						id="semester"
						name="semester"
						min="1"
						max="14"
						step="1"
						value="<?= e($formData["semester"]) ?>"
						required />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal Kunjungan</label><br />
					<input
						class="input-form"
						type="date"
						id="tanggal"
						name="tanggal"
						value="<?= e($formData["tanggal"]) ?>"
						required />
				</div>

				<div class="form-group">
					<p>Jenis Pesan</p>
					<input
						type="radio"
						id="pertanyaan"
						name="jenis_pesan"
						value="pertanyaan"
						<?= $formData["jenis_pesan"] === "pertanyaan" ? "checked" : "" ?>
						required />
					<label for="pertanyaan">Pertanyaan</label>
					<input
						type="radio"
						id="saran"
						name="jenis_pesan"
						value="saran"
						<?= $formData["jenis_pesan"] === "saran" ? "checked" : "" ?> />
					<label for="saran">Saran</label>
				</div>

				<div class="form-group">
					<p>Topik yang Diminati</p>
					<input
						type="checkbox"
						id="minat-html"
						name="minat[]"
						value="HTML"
						<?= in_array("HTML", $formData["minat"], true) ? "checked" : "" ?> />
					<label for="minat-html">HTML</label>
					<input
						type="checkbox"
						id="minat-css"
						name="minat[]"
						value="CSS"
						<?= in_array("CSS", $formData["minat"], true) ? "checked" : "" ?> />
					<label for="minat-css">CSS</label>
				</div>

				<div class="form-group">
					<label for="prodi">Program Studi</label><br />
					<select class="input-form" id="prodi" name="prodi" required>
						<option value="">-- Pilih Program Studi --</option>
						<option value="SI" <?= $formData["prodi"] === "SI" ? "selected" : "" ?>>Sistem Informasi</option>
						<option value="TI" <?= $formData["prodi"] === "TI" ? "selected" : "" ?>>Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pesan">Pesan</label><br />
					<textarea
						class="input-form"
						id="pesan"
						name="pesan"
						rows="4"
						maxlength="300"
						placeholder="Tulis pesan Anda"
						required><?= e($formData["pesan"]) ?></textarea>
				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
			</form>
		</section>
	</main>

	<footer>
		<p>&copy; <?= date("Y") ?> <?= e(NAMA_MAHASISWA) ?> [<?= e(NIM_MAHASISWA) ?>]</p>
	</footer>
	<script src="script.js"></script>
</body>
</html>
