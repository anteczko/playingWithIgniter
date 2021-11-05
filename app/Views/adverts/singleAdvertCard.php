<?= helper('displayWebsiteElement'); ?>
<div class="card h-100">
    <!-- TODO add function to display image from database -->
    <img src="/uploads/images/<?= $picture['name'] ?>" class="card-img-bottom" alt="...">
    <div class="card-header">
        <h5 class="card-title"><?= Short_to( $row['title'] ,24) ?></h5>
    </div>
    <div class="card-body">
        <p class="card-text"><?= Short_to( $row['description'] ) ?></p>

        <!-- TODO add link to that exact advert -->
        <a href="/adverts/<?= $row['id'] ?>" class="stretched-link"></a>
    </div>
    <div class="card-footer text-end">
            <p class="card-text text-end"><?= $row['price'] ?>zł</p>
    </div>
</div>