<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col-8">
            <div class="card h-100">
                <!-- TODO add function to display image from database -->
                <img src="/uploads/images/<?= $picture['name'] ?>" class="card-img-bottom" alt="...">
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
        </div>
        <div class="col-4">
            <div class="card h-100">
                <div class="card-header">
                    Seller
                </div>
                <!-- TODO add function to display image from database -->
                <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" class="card-img-bottom" alt="...">
                <div class="card-header">
                    <h5 class="card-title"><?= $user['username'] ?> (<?= $user['email'] ?>)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $user['role'] ?></p>
                </div>
                <div class="card-footer text-end">
                    <p class="card-text text-end"><?= $user['phone_number'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>