<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <div class="row row-cols-auto">
            <?php
                if(! empty($adverts)){
                    foreach($adverts as $row){
                        echo "<div class='col'>";
                        echo view('olx/advertView',$row);
                        echo "</div>";
                    }
                }
                ?>
        </div>
    </div>
</body>
</html>

