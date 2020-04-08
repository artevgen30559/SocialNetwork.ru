<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');
include($_SERVER['DOCUMENT_ROOT'].'/config/GoogleConfig.php');

if (isset($_GET['code'])) {
	$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	$gClient->setAccessToken($token['access_token']);
	$google_oauth = new Google_Service_Oauth2($gClient);
	$google_account_info = $google_oauth->userinfo->get();

	$sql = "SELECT * FROM users WHERE google_id = :google_id LIMIT 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['google_id' => $google_account_info['id']]);
	$result = $stmt->fetch();

	if (empty($result)) {
		$sql = "INSERT INTO users (name, surname, avatar, google_id) VALUES (:name, :surname, :avatar, :google_id)";
		$stmt = $pdo->prepare($sql);
		$params = [
			'name' => $google_account_info['givenName'],
			'surname' => $google_account_info['familyName'],
			'avatar' => $google_account_info['picture'],
			'google_id' => 12312
		];
		$stmt->execute($params);
	}
	exit();
	$_SESSION['id'] = $google_account_info['id'];
	header('Location: /');
}
