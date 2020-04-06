
export default function validation(form_object) {
	let form_class = form_object.attr('class');
	let inputs = $(`.${form_class} input#needs_validate`);

	if (inputs.length == 0) return true;

	$(`.${form_class} .alert`).remove();

	let patterns = {
		login: /\w{3,10}/,
		password: /\d{3,10}/
	};

	let error_fields = [];

	$(inputs).each(function() {
		if ( !patterns[$(this).attr('name')].test($(this).val()) ) {
			error_fields.push($(this).attr('data-title'));
		}
	});

	if (error_fields.length > 0) {
		for (let i = 0; i < error_fields.length; i++) {
			$(`.${form_class}`).append(`
				<div class="alert alert-danger" role="alert">
					${error_fields[i]} неверного формата!
				</div>
			`);
		}
		error_fields = null;
		return false;
	} else {
		return true;
	}
}
