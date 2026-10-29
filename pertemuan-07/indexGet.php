<?php
declare(strict_types=1);

require_once __DIR__ . "/form-validation.php";

$formFields = ["nama", "email", "semester", "tanggal", "jenis_pesan", "minat", "prodi", "pesan"];
$formSubmitted = array_intersect($formFields, array_keys($_GET)) !== [];
$formResult = $formSubmitted ? createContactFormData($_GET) : null;
$formData = $formResult["data"] ?? [
	"nama" => "",
	"email" => "",
	"semester" => "",
	"tanggal" => "",
	"jenis_pesan" => "",
	"minat" => [],
	"prodi" => "",
	"pesan" => "",
];
$formErrors = $formResult["errors"] ?? [];
$formMethod = "get";
$formAction = "indexGet.php";

require __DIR__ . "/profile-page.php";
