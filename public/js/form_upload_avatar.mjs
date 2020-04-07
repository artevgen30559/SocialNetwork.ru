
export default function form_upload_avatar(data) {
	switch(data.status) {
		case 201: {
			location.reload();
			break;
		}
	}
}
