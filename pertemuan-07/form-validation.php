<?php
declare(strict_types=1);

function createContactFormData(array $input): array
{
	$data = [
		"nama" => "",
		"email" => "",
		"semester" => "",
		"tanggal" => "",
		"jenis_pesan" => "",
		"minat" => [],
		"prodi" => "",
		"pesan" => "",
	];
	$errors = [];

	foreach (["nama", "email", "semester", "tanggal", "jenis_pesan", "prodi", "pesan"] as $field) {
		if (!isset($input[$field])) {
			continue;
		}
		if (!is_string($input[$field])) {
			$errors[] = "Format data form tidak valid.";
			continue;
		}
		$data[$field] = trim($input[$field]);
	}

	if (isset($input["minat"])) {
		if (!is_array($input["minat"])) {
			$errors[] = "Format topik yang diminati tidak valid.";
		} else {
			$data["minat"] = array_values(array_unique(array_filter(
				$input["minat"],
				static fn ($interest): bool => is_string($interest) && in_array($interest, ["HTML", "CSS"], true)
			)));
			foreach ($input["minat"] as $interest) {
				if (!is_string($interest) || !in_array($interest, ["HTML", "CSS"], true)) {
					$errors[] = "Pilihan topik tidak valid.";
					break;
				}
			}
		}
	}

	$nameLength = mb_strlen($data["nama"], "UTF-8");
	if ($nameLength < 3 || $nameLength > 50) {
		$errors[] = "Nama lengkap harus diisi 3 sampai 50 karakter.";
	}
	if (filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
		$errors[] = "Masukkan alamat email yang valid.";
	}

	$semester = filter_var($data["semester"], FILTER_VALIDATE_INT);
	if ($semester === false || $semester < 1 || $semester > 14) {
		$errors[] = "Semester harus diisi dengan angka 1 sampai 14.";
	}

	$date = $data["tanggal"];
	$dateIsValid = preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) === 1
		&& checkdate(
			(int) substr($date, 5, 2),
			(int) substr($date, 8, 2),
			(int) substr($date, 0, 4)
		);
	if (!$dateIsValid) {
		$errors[] = "Tanggal kunjungan tidak valid.";
	}

	if (!in_array($data["jenis_pesan"], ["pertanyaan", "saran"], true)) {
		$errors[] = "Pilih jenis pesan yang tersedia.";
	}
	if ($data["minat"] === []) {
		$errors[] = "Pilih minimal satu topik yang diminati.";
	}
	if (!in_array($data["prodi"], ["SI", "TI"], true)) {
		$errors[] = "Pilih program studi yang tersedia.";
	}

	$messageLength = mb_strlen($data["pesan"], "UTF-8");
	if ($messageLength < 1 || $messageLength > 300) {
		$errors[] = "Pesan harus diisi dan maksimal 300 karakter.";
	}

	return ["data" => $data, "errors" => array_values(array_unique($errors))];
}
