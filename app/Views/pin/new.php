<?= $this->extend('admin/base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4 font-weight-bold">Create new post</h5>

            <form action="/pin" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="example-caption">Caption</label>
                    <input type="text" class="form-control" id="example-caption" aria-describedby="emailHelp" 
                        placeholder="Write a caption..." required name="caption">
                </div>

                <div class="form-group">
                    <label for="example-location">Location</label>
                    <input type="text" class="form-control" id="example-location" aria-describedby="emailHelp" 
                        placeholder="Enter your location" required name="location">
                </div>


                <div class="form-group">
                    <label for="example-hashtag-category">Hashtag</label>
                    <select class="form-control" name="hashtag" id="example-hashtag-category">
                        <option value="utilities">Utilities</option>
                        <option value="food_and_beverages"> Food & Beverages</option>
                        <option value="books">Books</option>
                        <option value="entertainment">Entertainment</option>
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