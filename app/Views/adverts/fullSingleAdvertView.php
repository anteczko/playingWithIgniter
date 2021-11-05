<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col-8">
            <?php echo view('adverts/singleAdvertView',['row'=>$row]); ?>
        </div>
        <div class="col-4">
            <div class="card h-100">
                <!-- TODO add function to display image from database -->
                <img src="/uploads/images/pic.jpg" class="card-img-bottom" alt="...">
                <div class="card-header">
                    <h5 class="card-title">Card title</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">dane dane, dane joł, </p>
                    <p class="card-text">Advert created:xx-yy-zz?></p>
                </div>
                <div class="card-footer text-end">
                    <p class="card-text text-end">miliony monet</p>
                </div>
            </div>
        </div>
    </div>
</div>