
export default function dinamic_search(value) {
	async function show_matches() {
		let response = await fetch('/models/Search.php', {
			method: 'POST',
			body: JSON.stringify(value),
		});
		let data = await response.json();
		show_results(data);
	}
	show_matches().catch(error => console.log(error));
}


function show_results(data) {
	if (data.status == 200) {
		$('.search_result a').remove();
		for (let user of data.matches) {
			if (user.google_id != null) user.id = user.google_id;
			$('.search_result').append(`
				<a href="/profile/${user.id}" class="result_user_link list-group-item list-group-item-action">
					<div class="result_user_info d-flex">
						<div class="box">
							<img src="${user.avatar}" alt="">
						</div>
						<h5 class="mb-1 result_user_name">${user.name} ${user.surname}</h5>
						<small class="result_user_age">${user.status}</small>
					</div>
				</a>
			`);
		}
	} else {
		$('.search_result a').remove();
	}
	if (data.status == 404) {
		$('.search_result a').remove();
	}

}
