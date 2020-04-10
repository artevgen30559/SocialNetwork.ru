
import logout from './logout.mjs';
import send_request from './send_request.mjs';
import accept_request from './accept_request.mjs';

export default function handler_button(button) {

	let controller 	= button.attr('data-controller');
	let action 			= button.attr('data-action');
	let data_button	= button.attr('data-button');
	console.log(button);
	if (/&/.test(data_button)) data_button = data_button.split('&');
	if (controller == undefined) return false;

	async function call_controller() {
		let response = await fetch(controller, {
			method: 'POST',
			body: JSON.stringify(data_button)
		});
		let data = await response.json();
		eval(action)(data);
	}

	call_controller().catch(error => console.log(error));
}
