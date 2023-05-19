<?= $this->extend('admin/base') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Category : <?= $caption ?>  </h6>
	</div>


	<div class="card-body">
		<div class="row">
			<?php foreach($query as $data) { ?>
				<div class="col-md-4">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="/uploads/<?= $data['upload'] ?>" height="200px">
						<div class="card-body">
							<h5 class="card-title font-weight-bold"><?= $data['caption'] ?></h5>
							<p class="card-text"><?= $data['location'] ?></p>
							<a href="/pin/<?= $data['id'] ?>" class="btn btn-primary">More</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?= $this->endSection() ?>