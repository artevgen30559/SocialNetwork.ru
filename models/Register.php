<?php
include('../config/db.php');

$name 		= $_POST['name'];
$login 		= $_POST['login'];
$password 	= $_POST['password'];

$userIsExsist = false;

$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $pdo->prepare($sql);
$params = [
	'login' => $login,
];
$stmt->execute($params);
$result = $stmt->fetchAll();

foreach ($result as $item) {
	if (password_verify($password, $item['password'])) {
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
		$_SESSION['id'] = $item['id'];
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
