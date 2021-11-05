<div class="card h-100">
    <!-- TODO add function to display image from database -->
    <img src="/uploads/images/<?= $picture[0]['name'] ?>" class="card-img-bottom" alt="...">
    <div class="card-header">
        <h5 class="card-title"><?= $row['title'] ?></h5>
    </div>
    <div class="card-body">
        <p class="card-text"><?= $row['description']?></p>
        <p class="card-text">Advert created:<?= $row['creation_timestamp']?></p>
    </div>
    <div class="card-footer text-end">
        <p class="card-text text-end"><?= $row['price'] ?>zł</p>
    </div>
</div>
