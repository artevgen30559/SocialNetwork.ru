
import validation from './validation.mjs';

$('form').submit(function(e) {
	e.preventDefault();
	validation($(this));
});
