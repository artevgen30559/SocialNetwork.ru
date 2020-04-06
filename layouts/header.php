<?php include('views/modalRegister.php'); ?>
<?php include('views/modalAuthorization.php'); ?>
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
		<div class="navbar-action">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#authorizationModal" data-whatever="@mdo">Авторизация</button>
			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#registerModal" data-whatever="@mdo">Регистрация</button>
		</div>
	</div>
</nav>
