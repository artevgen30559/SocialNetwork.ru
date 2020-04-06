<?php
include('../config/db.php');

$login 		= $_POST['login'];
$password 	= $_POST['password'];

$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $pdo->prepare($sql);
$params = [
	'login' => $login,
];
$stmt->execute($params);
$result = $stmt->fetchAll();

if (empty($result)) {
	echo json_encode([
		'status' => 404,
		'message' => 'User was not found'
	]);
	exit();
}

foreach ($result as $item) {
	if (password_verify($password, $item['password'])) {
		$_SESSION['id'] = $item['id'];
		echo json_encode([
			'status' => 200,
			'message' => 'Authorization success',
			'id' => $item['id']
		]);
		exit();
	} else {
		echo json_encode([
			'status' => 404,
			'message' => 'User was not found'
		]);
		exit();
	}
}
