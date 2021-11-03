<body>
<div class="row">
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                Registration error!!!
            </div>
                <?php
                foreach($errors as $key => $error){
                    echo '<div class="card border-danger mb-3" style="max-width: 18rem;">';
                    if(empty($key))$key="Error";
                    echo '<div class="card-header bg-danger text-white">'.$key.'</div>';
                    echo '<div class="card-body text-danger">';
                    echo '<h5 class="card-title">'.$error.'</h5>';
                    echo '</div></div>';
                }


                ?>
            </div>
        </div>

</div>
