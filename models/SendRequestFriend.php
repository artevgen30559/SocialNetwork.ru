<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$data_button = json_decode(file_get_contents('php://input'));

$sender = $data_button[0];
$receiver = $data_button[1];

$sql = "INSERT INTO friends (sender, receiver, accept, accepted) VALUES (:sender, :receiver, 1, 0)";
$stmt = $pdo->prepare($sql);
$params = [
	'sender' => $sender,
	'receiver' => $receiver
];
$stmt->execute($params);
