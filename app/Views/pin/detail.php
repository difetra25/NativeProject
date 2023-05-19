<?= $this->extend('admin/base') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">


	<div class="card-body">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card" style="width: 25rem;">
					<img class="card-img-top" src="/uploads/<?= $pin['upload'] ?>" height="300px">
					<div class="card-body">
						<h5 class="card-title font-weight-bold"><?= $pin['caption'] ?></h5>
						<p class="card-text"><?= $pin['location'] ?></p>
						<hr>
						<p class="card-text"><?= $pin['hashtag'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 ml-3">
			<h5>Comments</h5>
			<div class="row">
				<div class="col-md-11">
					<form action="add_comment" method="POST">
						<div class="form-group">
							<input type="hidden" name="id" value="<?= $pin['id'] ?>">
							<textarea name="comment" cols="10" rows="7" class="form-control" required>
							</textarea>
							<button class="btn btn-primary mt-3">Send</button>
						</div>
					</form>
				</div>
			</div>
			<?php foreach($query as $data) { ?>
				<div class="row mt-3">
					<div class="col-md-1">
						<img src="https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg" width="60px">
					</div>
					<div class="col-md-11">
						<h6 class="font-weight-bold mt-1"><?= $data['name'] ?></h6>
						<p><?= $data['comment'] ?></p>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?= $this->endSection() ?>