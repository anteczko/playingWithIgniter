<!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
    <div class="row row-cols-auto">
        <?php
        if(! empty($adverts)) {
            foreach ($adverts as $row) {
                echo $row['id'].' | '.$row['title'].' | '.$row['description'];
            }
        }
        ?>
    </div>
</div>
</body>
</html>