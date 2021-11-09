<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <?php
            if(! empty($rows))
            {
                foreach($rows as $row)
                {
                    if($row['promoted_to']>=date("Y-m-d")){
                        $pic=array_search($row['id'], array_column($picture, 'advert_id'));
                        echo '<div class="card border-success">';
                        echo '<div class="col ">';
                        echo view('adverts/singleAdvertCard',['row'=>$row,'picture'=>$picture[$pic]]);
                        echo '</div>';
                        echo '</div>';
                    }
                }
                foreach($rows as $row)
                {
                    if($row['promoted_to']<date("Y-m-d")) {
                        $pic = array_search($row['id'], array_column($picture, 'advert_id'));
                        echo '<div class="col">';
                        echo view('adverts/singleAdvertCard', ['row' => $row, 'picture' => $picture[$pic]]);
                        echo '</div>';
                    }
                }
            }
        ?>
    </div>
</div>