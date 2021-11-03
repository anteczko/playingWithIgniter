<?= helper('displayWebsiteElement'); ?>
<div class="card h-100">
    <!-- TODO add function to display image from database -->
    <img src="https://ireland.apollo.olxcdn.com/v1/files/9nodf6o5dh8f3-PL/image;s=644x461" class="card-img-bottom" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?= Short_to( $row['title'] ,24) ?></h5>
        <p class="card-text"><?= Short_to( $row['description'] ) ?></p>
        <p class="card-text text-end"><?= $row['price'] ?></p>
        <!-- TODO add link to that exact advert -->
        <a href="#" class="stretched-link"></a>
    </div>
</div>