<h4 style="margin: 20px 0;">Мои друзья</h4>
<?php if (!empty($friends_list)) { ?>
<?php	foreach ($friends_list as $friend) { ?>
<div class="card mb-3">
	<div class="row no-gutters">
		<div class="col-md-2">
			<img src="<?php echo $friend['avatar'];?>" class="card-img" alt="...">
		</div>
		<div class="col-md-7">
			<div class="card-body">
				<h5 class="card-title"><?php echo $friend['name'];?></h5>
			</div>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<button style="height: 100%;" class="btn btn-dark">Написать</button>
		</div>
	</div>
</div>
<?php } } else { ?>
	<div class="jumbotron jumbotron-fluid" style="padding: 20px; margin: 0;">
		<div class="container">
			<p class="lead" style="padding: 0; margin: 0;">Список друзей пуст</p>
		</div>
	</div>
<?php }?>

<?php if (!empty($friend_requests)) { ?>
<h4 style="margin: 30px 0;">Заявки в друзья</h4>
<?php	foreach ($friend_requests as $friend) { ?>
<div class="card mb-3">
	<div class="row no-gutters">
		<div class="col-md-2">
			<img src="<?php echo $friend['avatar'];?>" class="card-img" alt="...">
		</div>
		<div class="col-md-7">
			<div class="card-body">
				<h5 class="card-title"><?php echo $friend['name'] . ' ' . $friend['surname'];?></h5>
			</div>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<button style="height: 100%;" class="btn btn-dark">Принять заявку</button>
		</div>
	</div>
</div>
<?php } }?>

<?php if (!empty($sended_requests)) { ?>
<h4 style="margin: 30px 0;">Вы предложили дружить</h4>
<?php	foreach ($sended_requests as $friend) { ?>
<div class="card mb-3">
	<div class="row no-gutters">
		<div class="col-md-2">
			<img src="<?php echo $friend['avatar'];?>" class="card-img" alt="...">
		</div>
		<div class="col-md-7">
			<div class="card-body">
				<h5 class="card-title"><?php echo $friend['name'] . ' ' . $friend['surname'];?></h5>
			</div>
		</div>
	</div>
</div>
<?php } }?>
