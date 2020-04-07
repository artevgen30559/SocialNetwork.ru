
export default function form_register(data, form_class) {
	switch(data.status) {
		case 409: {
			$(`.${form_class} .alert`).remove();
			$(`.${form_class}`).append(`
				<div class="alert alert-danger" role="alert">
					Пользователь уже существует!
				</div>
			`);
			break;
		}
		case 200: {
			$('#registerModal').modal('toggle');
			setTimeout(function() {
				$('body').append(`
					<div class="alert alert-success" role="alert">
						Регистрация прошла успешно! Теперь вы можете авторизоваться
					</div>
				`);
			}, 100);
			break;
		}
	}
}
