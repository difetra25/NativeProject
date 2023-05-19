<?= $this->extend('admin/base') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4 font-weight-bold">Your Profile</h5>

            <form action="/profile/<?= $data['id'] ?>" method="post">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group">
                    <label for="example-name">Name</label>
                    <input type="text" class="form-control" id="example-name" aria-describedby="emailHelp" 
                        placeholder="Write a name..." required name="name" value="<?= $data['name']; ?>" >
                </div>

                <div class="form-group">
                    <label for="example-email">Email</label>
                    <input type="text" class="form-control" id="example-email" aria-describedby="emailHelp" 
                        placeholder="Enter your email" required name="email" value="<?= $data['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="example-password">Change Password</label>
                    <input type="password" class="form-control" id="example-password" aria-describedby="passwordHelp" 
                        placeholder="Enter your password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>