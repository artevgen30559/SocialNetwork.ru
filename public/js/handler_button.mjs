
import logout from './logout.mjs';

export default function handler_button(button) {

	let controller = button.attr('data-controller');
	let action 		= button.attr('data-action');
	let data 		= button.attr('data-button');

	if(controller == undefined) return false;

	async function call_controller() {
		let response = await fetch(controller);
		let data = await response.json();
		eval(action)(data);
	}

	call_controller().catch(error => console.log(error));
}
