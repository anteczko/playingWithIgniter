<div class="container">
    <H1>Hello in all adverts view!!!</H1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <?php
            if(! empty($rows))
            {
                foreach($rows as $row)
                {
                    echo '<div class="col">';
                    echo view('adverts/singleAdvertCard',['row'=>$row]);
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>