<?php
	include($_SERVER['DOCUMENT_ROOT'].'/models/Profile.php');
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
		<section class="profile-info">
			<div class="container">
				<div class="card user-info" style="width: 18rem;">
					<img src="<?php echo $user_account_info['avatar'];?>" class="card-img-top" alt="avatar.jpg">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/views/modalUploadAvatar.php');?>
					<div class="card-body">
						<h5 class="user-name"><?php echo $user_account_info['name'] . ' ' . $user_account_info['surname'];?></h5>
						<h6 class="card-subtitle mb-2 text-muted user-status"><?php echo $user_account_info['status'];?></h6>
						<ul class="list-group list-group-flush user-extend-data">
							<li class="list-group-item">Город: <?php echo $user_account_info['city'];?></li>
							<li class="list-group-item">Возраст: <?php echo $user_account_info['age'];?></li>
						</ul>
						<?php if ($_SESSION['id'] != $user_account_info['id'] && $_SESSION['id'] != $user_account_info['google_id']) {?>
						<a href="#" class="btn btn-primary">Добавить в друзья</a>
						<a href="#" class="btn btn-primary">Написать сообщение</a>
						<?php } else { ?>
							<a href="#" class="btn btn-primary">Перейти в диалоги</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/layouts/footer.php'); ?>
</html>
