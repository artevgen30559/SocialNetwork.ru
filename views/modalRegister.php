<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Регистрация аккаунта</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="models/Register.php" class="form_register" id="form-register">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="name" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<input type="text" id="needs_validate" data-title="Логин" name="login" class="form-control" placeholder="Логин" aria-label="Логин" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<input type="text" id="needs_validate" data-title="Пароль" name="password" class="form-control" placeholder="Пароль" aria-describedby="basic-addon1">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
				<button type="submit" form="form-register" class="btn btn-primary">Зарегистрироваться</button>
			</div>
		</div>
	</div>
</div>
