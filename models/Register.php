<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$name 		= $_POST['name'];
$login 		= $_POST['login'];
$password 	= $_POST['password'];

$userIsExsist = false;

$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $pdo->prepare($sql);
$stmt->execute(['login' => $login]);
$result = $stmt->fetchAll();

foreach ($result as $user) {
	if (password_verify($password, $user['password'])) {
		$userIsExsist = true;
		break;
	}
}

if (!$userIsExsist) {
	$sql = "INSERT INTO users (name, login, password) VALUES (:name, :login, :password)";
	$stmt = $pdo->prepare($sql);
	$params = [
		'name' => $name,
		'login' => $login,
		'password' => password_hash($password, PASSWORD_DEFAULT)
	];
	$result = $stmt->execute($params);
	if ($result) {
		echo json_encode([
			'status' => 200,
			'message' => 'User was created'
		]);
	}
} else {
	echo json_encode([
		'status' => 409,
		'message' => 'User already exists'
	]);
}
