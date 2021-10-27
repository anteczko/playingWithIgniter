<body>
<div class="row">
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                Registration Succesful!!!
            </div>
            <?php
            foreach($rows as $key => $row){
                echo '<div class="card border-danger mb-3" style="max-width: 18rem;">';
                echo '<div class="card-header bg-danger text-white">'.$key.'</div>';
                echo '<div class="card-body text-danger">';
                d($row);
                //echo '<h5 class="card-title">'.$row.'</h5>';
                echo '</div></div>';
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>