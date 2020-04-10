<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$data_button = json_decode(file_get_contents('php://input'));

$receiver = $data_button[0];
$sender = $data_button[1];

$query = $pdo->query("UPDATE friends SET accepted = '1' WHERE sender = '$sender' AND receiver = '$receiver'");
$query->exec();

// $query = $pdo->query("INSERT INTO friends (sender, receiver, accept, accepted) VALUES ('$sender', '$receiver', '1', '1')");
// $query->exec();
