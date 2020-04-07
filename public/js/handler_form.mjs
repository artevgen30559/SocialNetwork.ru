
import validation from './validation.mjs';

import form_register from './form_register.mjs';
import form_authorization from './form_authorization.mjs';
import form_upload_avatar from './form_upload_avatar.mjs';

export default function handler_form(form) {
	let target_form_class 	= form.attr('class');
	let form_by_class = document.getElementsByClassName(`${target_form_class}`)[0];

	// Validate form fields
	let isValidate = validation(form);
	if (!isValidate) return false;

	let 	action = form.attr('action'),
			method = form.attr('method');

	// Communication to server
	async function link_server() {
		let response = await fetch(action, {
			method: method,
			body: new FormData(form_by_class)
		});
		let data = await response.json();
		// Call function with the name like class target form
		eval(target_form_class)(data, target_form_class);
	} link_server().catch(error => console.log(error));
}
