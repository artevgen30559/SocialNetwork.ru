<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

$id = $_GET['user'];

if (isset($_SESSION['id'])) {
	if (!isset($id)) $id = $_SESSION['id'];
	$query = $pdo->query("SELECT * FROM users WHERE id = '$id'");
	$user_account_info = $query->fetch();
	if (empty($user_account_info)) header("Location: /profile/".$_SESSION['id']);


	// Get friends list
	$friends_list = [];
	$query = $pdo->query("SELECT * FROM friends");
	$result = $query->fetchAll();

	for ($i = 0; $i < count($result); $i++) {
		if ($result[$i]['sender'] == $_SESSION['id']
			&& $result[$i]['accepted'] == 1) {
			$query = $pdo->query("SELECT * FROM friends LEFT JOIN users ON friends.receiver = users.id LIMIT 1 OFFSET $i");
			$friends_list[] = $query->fetch();
		}
		if ($result[$i]['receiver'] == $_SESSION['id']
			&& $result[$i]['accepted'] == 1) {
			$query = $pdo->query("SELECT * FROM friends LEFT JOIN users ON friends.sender = users.id LIMIT 1 OFFSET $i");
			$friends_list[] = $query->fetch();
		}
	}

	// Get friend requests
	$query = $pdo->query("SELECT * FROM friends INNER JOIN users ON friends.sender = users.id WHERE friends.accepted != '1' AND friends.sender != ".$_SESSION['id']);
	$friend_requests = $query->fetchAll();

	// Get sended requests
	$query = $pdo->query("SELECT * FROM friends INNER JOIN users ON friends.receiver = users.id WHERE friends.accepted != '1' AND friends.sender = ".$_SESSION['id']);
	$sended_requests = $query->fetchAll();

} else {
	header('Location: /');
}
