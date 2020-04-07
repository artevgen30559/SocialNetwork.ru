
export default function dinamic_search(value) {
	async function show_matches() {
		let response = await fetch('/models/Search.php', {
			method: 'POST',
			body: value,
		});
		let data = await response.text();
		console.log(data);
	}
	show_matches().catch(error => console.log(error));
}
