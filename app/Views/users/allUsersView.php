<h1>Hello in all users view!!! </h1>

<h3>There I will spit out data of all users</h3>

<?php
    foreach($userData as $user){
        echo '<h1>'.$user['username'].'</h1>';
        foreach($user as $key=>$field){
            echo $key.' | '.$field.'<br>';
        }
    }
?>
