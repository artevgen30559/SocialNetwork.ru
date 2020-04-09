<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$errors_field = [];
$avatar = $_FILES['avatar'];

$extension = explode('.', $avatar['name']);
$normalized_extension = strtolower(end($extension));
$extensions_allowed = ['jpeg', 'jpg', 'png'];

// IF extension is not allowed
if (!in_array($normalized_extension, $extensions_allowed)) $errors_field[] = 'Extension is not allowed';

// IF size > 5MB
if ($avatar['size'] / pow(1024, 2) > 5) $errors_field[] = 'File too big';

// IF errors not found
if (empty($errors_field)) {
	$generate_file_name = uniqid('AVATAR', true) . ".$normalized_extension";
	$avatar_directory = $_SERVER['DOCUMENT_ROOT'] . "/public/avatars/$generate_file_name";
	move_uploaded_file($avatar['tmp_name'], $avatar_directory);

	$sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$avatar_localpath = "/public/avatars/$generate_file_name";
	$stmt->execute(['avatar' => $avatar_localpath, 'id' => $_SESSION['id']]);

	echo json_encode([
		'status' => 201,
		'message' => 'Avatar was updated'
	]);
} else {
	echo json_encode([
		'status' => 406,
		'message' => 'Not Acceptable',
		'error_field' => $errors_field
	]);
}
