<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$id = $_GET['user'];

if (isset($_SESSION['id'])) {
	if (!isset($id)) $id = $_SESSION['id'];
	$query = $pdo->query("SELECT * FROM users WHERE id = $id OR google_id = $id LIMIT 1");
	$user_account_info = $query->fetch();
	if (empty($user_account_info)) header("Location: /profile/".$_SESSION['id']);
} else {
	header('Location: /');
}
