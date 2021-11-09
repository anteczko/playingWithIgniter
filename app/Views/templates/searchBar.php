<?php helper('form'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#searchBar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            Search
        </button>
        <form action="/adverts/searchAction" method="post">
            <div class="collapse navbar-collapse" id="searchBar">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <button class="btn form-control btn-success" type="submit">
                                Search
                            </button>
                        </div>
                        <div class="col-3">
                            <input class="form-control" name="title" value="<?php echo set_value('title'); ?>" type="search" placeholder="Search by title">
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="categories">Category</label>
                                </div>
                                <select class="custom-select form-control" name="category">
                                    <option value="default" <?php echo set_select('category','default',TRUE); ?> >Category</option>
                                    <?php
                                    foreach($categories as $category)
                                    {
                                        $id=$category['id'];
                                        $name=$category['name'];
                                        echo '<option value="'. $id .'"'. set_select( 'category', $id ) .' >'. $category['name'] .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <input class="form-control" name="price" value="<?php echo set_value('price'); ?>" type="number" step="0.01" placeholder="max price" min="0" max="30000000">
                        </div>
                        <div class="col-2">
                            <select class="form-control" name="order" id="order">
                                <option value="desc" <?php echo set_select('order','desc',TRUE); ?> >Descending</option>
                                <option value="asc" <?php echo set_select('order','asc'); ?> >Ascending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>