<?php
    helper('form');
?>
<body>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add new advert</h5>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('adverts/addAction'); ?>
                    <div class="md-6">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="md-6">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control" aria-label="With textarea" ></textarea>
                    </div>

                    <div class="md-6">
                        <label for="price" class="form-label">Price:</label>
                        <input name="price" type="number" class="form-control" min="0.00" max="2500000" step="0.01">
                    </div>
                    <div class="md-6">
                        <label for="inputState" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <!-- #TODO add categories pulled from database-->
                            <?php
                                foreach($categories as $category)
                                {
                                    echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                                }

                            ?>
                        </select>
                    </div>
                    <div class="md-6">
                        <label for="picture" class="form-label">Add files</label>
                        <input type="file" name="picture" class="form-control" aria-label="Upload">
                    </div>
                    <div class="md-6">
                        <label for="isPromoted" class="form-label">Is promoted</label>
                        <input type="checkbox" name="isPromoted" aria-label="Upload">
                    </div>
                    <div class="md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

