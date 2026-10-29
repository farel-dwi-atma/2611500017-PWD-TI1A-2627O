<?php
declare(strict_types=1);

session_start();
require_once __DIR__ . "/form-validation.php";

if (($_SERVER["REQUEST_METHOD"] ?? "GET") === "POST") {
	$formResult = createContactFormData($_POST);
	$_SESSION["postFormResult"] = $formResult;
	header("Location: index.php", true, 303);
	exit;
}

$formResult = $_SESSION["postFormResult"] ?? null;
unset($_SESSION["postFormResult"]);

$formSubmitted = is_array($formResult);
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
$formMethod = "post";
$formAction = "index.php";

require __DIR__ . "/profile-page.php";
