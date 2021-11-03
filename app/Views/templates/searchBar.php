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
                                <select class="custom-select form-control" name="categories">
                                    <option value="-1" <?php echo set_select('categories','-1',TRUE); ?> >Category</option>
                                    <option value="1" <?php echo set_select('categories','1'); ?>>Hobby</option>
                                    <option value="2" <?php echo set_select('categories','2'); ?>>Work</option>
                                    <option value="3" <?php echo set_select('categories','3'); ?>>Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <input class="form-control" name="price" value="<?php echo set_value('price'); ?>" type="number" step="0.01" placeholder="max price" min="0" max="30000000">
                        </div>
                        <div class="col-2">
                            <select class="form-control" name="order" id="order">
                                <option value="desc" <?php echo set_select('order','desc',TRUE); ?> >Desc</option>
                                <option value="asc" <?php echo set_select('order','asc'); ?> >Asc</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>