
export default function form_authorization(data, form_class) {
	switch(data.status) {
		case 404: {
			$(`.${form_class} .alert`).remove();
			$(`.${form_class}`).append(`
				<div class="alert alert-danger" role="alert">
					Аккаунта не существует!
				</div>
			`);
			break;
		}
		case 200: {
			location.href = `/profile/${data.id}`;
			break;
		}
	}
}
