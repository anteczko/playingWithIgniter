<nav class="navbar navbar-light bg-light border">
    <div class="row align-items-start ">
        <form class="form-inline" action="/olx/adverts/search" method="post">
            <div class="col">
                <input value="Szukaj" class="btn btn-primary" type="submit">
            </div>
            <div class="col">
                filtruj oferty według nazwy:
                <input class="form-control mr-sm-2" type="text" name="title" class="form-control">
            </div>
            <div class="col">
                filtruj oferty według maksymalnej ceny:
                <input type="number" name="price" value="10000" step="0.01" min="0.01">
            </div>
            <div class="col">
                Kategoria:
                <select class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="example-getting-started" multiple="multiple">
                    <?php
                    if(! empty($categories)) {
                        foreach ($categories as $row) {
                            //echo '<li><a class="dropdown-item" ="'.$row['id'].'"> '.$row['name'].'</option></li>';
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col">

                <label for="sorting">Sortuj według:</label>
                <select name="sorting">
                    <option value="0">Najtańsze</option>
                    <option value="1">Najdroższe</option>
                </select>

            </div>
        </form>
    </div>
</nav>
