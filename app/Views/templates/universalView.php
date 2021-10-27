<h1>Hello in Universal view!!! </h1>

<h3>There I will spit out data of all data!!!</h3>

<?php
foreach($rows as $row){
    echo '<h1>+-------------------+</h1>';
    foreach($row as $key=>$field){
        echo $key.' | '.$field.'<br>';
    }
}
?>
