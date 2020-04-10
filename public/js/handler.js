"use strict";

import handler_form from './handler_form.mjs';
import handler_button from './handler_button.mjs';
import dinamic_search from './dinamic_search.mjs';

$('form').submit(function(e) {
	e.preventDefault();
	handler_form($(this));
});

$('button[type="button"], a[type="button"]').on('click', function(e) {
	e.preventDefault();
	handler_button($(this));
});

$('.upload-avatar').change(function() {
	$('#uploadAvatarModal').modal('toggle');
});

$('.search_input').keyup(function(e) {
	e.preventDefault();
	dinamic_search($(this).val());
});
