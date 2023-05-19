<?= $this->extend('admin/base') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Your Post</h6>

    </div>

    <h6 class="font-weight-bold text-primary mt-3">
        <a href="/pin/new" class="btn btn-primary ml-3">Posting your story</a> 
    </h6>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col ">ID</th>
                        <th scope="col ">Caption</th>
                        <th scope="col ">Location</th>
                        <th scope="col ">Hashtag</th>
                        <th scope="col ">Upload</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php $no = 0; ?>
                    <?php foreach ($pins as $item): ?>
                        <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= $item['caption'] ?></td>
                            <td><?= $item['location'] ?></td>
                            <td><?= $item['hashtag'] ?></td>
                            <td><img src="/uploads/<?= $item['upload'] ?>" alt="" width=100 height=100></td>
                            <td>
                                <div class="btn-group " role="group " aria-label="Basic example ">
                                    <form action="/pin/<?= $item['id'] ?>" method="POST" onsubmit="return confirm(`Are you sure?`)">
                                        <a href="/pin/<?= $item['id'] ?>/edit" class="btn btn-info text-white "><i class='bx bx-pencil'></i> Edit</a>
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger text-white" type="submit">
                                            <i class='bx bx-trash'></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th scope="col ">ID</th>
                        <th scope="col ">Caption</th>
                        <th scope="col ">Location</th>
                        <th scope="col ">Hashtag</th>
                        <th scope="col ">Upload</th>
                        <th scope="col " width="180px">Action</th>
                    </tr>
                </tfoot> -->
            </table>
        </div>

        <div class="col-12">
            <?= $pager->links('pins', 'custom_pagination') ?>
        </div>

    </div>
</div>
<?= $this->endSection() ?>