"use strict";

import handler_form from './handler_form.mjs';
import handler_button from './handler_button.mjs';

$('form').submit(function(e) {
	e.preventDefault();
	let handler_form_init = handler_form($(this));
});

$('button[type="button"]').on('click', function(e) {
	e.preventDefault();
	let handler_button_init = handler_button($(this));
});

$('.upload-avatar').change(function() {
	$('#uploadAvatarModal').modal('toggle');
});
