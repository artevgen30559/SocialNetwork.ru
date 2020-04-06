<?php include($_SERVER['DOCUMENT_ROOT'].'/views/modalRegister.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/views/modalAuthorization.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/views/modalAuthorization.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/config/GoogleConfig.php'); ?>
<?php
	$loginURL = $gClient->createAuthUrl();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">NETwork</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Домашняя</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
		</ul>
		<?php if (!isset($_SESSION['id'])) { ?>
		<div class="navbar-action">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#authorizationModal" data-whatever="@mdo">Авторизация</button>
			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#registerModal" data-whatever="@mdo">Регистрация</button>
			<button type="button" class="btn btn-danger" name="button" onclick="window.location='<?php echo $loginURL; ?>'">Google</button>
		</div>
		<?php } else { ?>
		<div class="navbar-action">
			<button type="button" data-controller="/models/Logout.php" data-action="logout" class="btn btn-primary">Выход из аккаунта</button>
		</div>
		<?php } ?>
	</div>
</nav>
