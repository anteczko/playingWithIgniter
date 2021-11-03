<h1>Hello in all users view!!! </h1>

<h3>There I will spit out data of all users</h3>

<?php
    $encrypter = \Config\Services::encrypter();
    foreach($userData as $user){
        echo '<h1>'.$user['username'].'</h1>';
        foreach($user as $key=>$field){
            echo $key.' | '.$field;
            if($key=='password') {
                $encrypted = password_hash($field,PASSWORD_BCRYPT);
                echo ' encrypted pass: '.$encrypted;
            }
            echo '<br>';
        }
    }
?>
