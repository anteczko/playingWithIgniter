<?= helper('displayWebsiteElement');
echo view('templates/websiteHeaderView');?>
<div class="container-fluid">
    <div class="card col-sm-12 d-flex align-self-stretch">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                foreach($categories as $category)
                {

                    echo '<div class="col">
                            <div class="card-body">
                                <img src="/uploads/categories_images/'.$category['picture_name'].'" class="img_thumbnail vh-10" style="width:100%; height:15vh; object-fit:cover;">
                                <a href="/adverts/category/'.$category['name'].'" class="stretched-link"></a>
                            </div>
                              <div class="card-footer bg-transparent border-success">'.$category['name'].'</div>
                    </div>';

                }
                ?>
        </div>
    </div>
</div>