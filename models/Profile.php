<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$id = $_GET['user'];

if (isset($_SESSION['id'])) {
	$query = $pdo->query("SELECT * FROM users WHERE id = $id LIMIT 1");
	$result = $query->fetch();

	print_r($result);
}
