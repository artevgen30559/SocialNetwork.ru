<?php if ($_SESSION['id'] == $user_account_info['id']) {?>
<form class="form_upload_avatar" id="form_upload_avatar" action="/models/UploadAvatar.php" method="POST" enctype="multipart/form-data">
	<div class="custom-file">
		<input type="file" class="custom-file-input upload-avatar" id="customFile" name="avatar">
		<label class="custom-file-label" for="customFile">Изменить avatar</label>
	</div>
</form>

<div class="modal fade" id="uploadAvatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Загрузить выбранный avatar?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
				<button type="submit" form="form_upload_avatar" class="btn btn-primary">Загрузить</button>
			</div>
		</div>
	</div>
</div>
<?php }?>
