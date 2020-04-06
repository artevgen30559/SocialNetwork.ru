"use strict";
import validation from './validation.mjs';
import form_register from './form_register.mjs';
import form_authorization from './form_authorization.mjs';

$('form').submit(function(e) {
	e.preventDefault();

	let target_form_class 	= $(this).attr('class');
	let form = document.getElementsByClassName(`${target_form_class}`)[0];

	// Validate form fields
	let isValidate = validation($(this));
	if (!isValidate) return false;

	let 	action = $(this).attr('action'),
			method = $(this).attr('method');

	// Communication to server
	async function link_server() {
		let response = await fetch(action, {
			method: method,
			body: new FormData(form)
		});
		let data = await response.json();
		// Call function with the name like class target form
		let responseHandler = eval(target_form_class)(data, target_form_class);
	} link_server().catch(error => console.log(error));
});
