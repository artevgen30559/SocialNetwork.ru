
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
			location.href = '/';
			break;
		}
	}
}
