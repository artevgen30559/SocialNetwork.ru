<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/config/GoogleConfig.php');
	// Gooogle Authorization Link
	$loginURL = $gClient->createAuthUrl();

	if (isset($_SESSION['id'])) {
		header("Location: /profile/".$_SESSION['id']);
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Социальная</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/layouts/head.php'); ?>
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/layouts/header.php'); ?>
		<?php if (!isset($_SESSION['id'])) { ?>
		<section class="welcome">
			<h3 class="welcome-caption">Зарегистрируйтесь или авторизуйтесь, чтобы начать.</h3>
		</section>
		<?php } ?>


	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/layouts/footer.php'); ?>
</html>
