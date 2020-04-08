<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

// Parse raw data
$search_value = json_decode(trim(file_get_contents('php://input')));

if ($search_value == '') {
	echo json_encode([
		'status' => 404,
		'message' => 'Matches not found'
	]);
	exit();
}

$query = $pdo->query("SELECT * FROM users WHERE name LIKE '%$search_value%' OR surname LIKE '%$search_value%' LIMIT 5");
$result = $query->fetchAll();

if (empty($result)) {
	echo json_encode([
		'status' => 404,
		'message' => 'Matches not found'
	]);
} else {
	echo json_encode([
		'status' => 200,
		'matches' => $result
	]);
}
