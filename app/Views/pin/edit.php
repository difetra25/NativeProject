<?= $this->extend('admin/base') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4 font-weight-bold">Update your post <?= $data['caption'] ?></h5>

            <form action="/pin/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group">
                    <label for="example-caption">Caption</label>
                    <input type="text" class="form-control" id="example-caption" aria-describedby="emailHelp" 
                        placeholder="Write a caption..." required name="caption" value="<?= $data['caption']; ?>" >
                </div>

                <div class="form-group">
                    <label for="example-location">Location</label>
                    <input type="text" class="form-control" id="example-location" aria-describedby="emailHelp" 
                        placeholder="Enter your location" required name="location" value="<?= $data['location']; ?>">
                </div>


                <div class="form-group">
                    <label for="example-hashtag-category">Hashtag</label>
                    <select class="form-control" name="hashtag" id="example-hashtag-category">
                        <option value="utilities" <?= ($data['hashtag'] == 'utilities') ? 'selected' : ''; ?>>Utilities</option>
                        <option value="food_and_beverages" <?= ($data['hashtag'] == 'food_and_beverages') ? 'selected' : ''; ?>> Food & Beverages</option>
                        <option value="books" <?= ($data['hashtag'] == 'books') ? 'selected' : ''; ?>>Books</option>
                        <option value="entertainment" <?= ($data['hashtag'] == 'entertainment') ? 'selected' : ''; ?>>Entertainment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-upload">Upload</label>
                    <input type="file" class="form-control" id="example-upload" aria-describedby="photoHelp" name="upload">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>