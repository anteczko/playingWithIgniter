<?php
$session = \Config\Services::session();
if($session->get('nick') != null){
    echo "Logged as user:".$session->get('nick').'<p>Want to logut? <a href="/olx/users/logout">Logout</a>.</p>';
}else{
    echo '<p>Want to login? <a href="/olx/users">Login here</a>.</p>';
}