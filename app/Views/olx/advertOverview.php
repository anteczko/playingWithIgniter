<?php
echo "<h1>There will be list of all adverts</h1>";
//delete this vardump
//var_dump($adverts);
d($adverts);
if(! empty($adverts)){
    foreach($adverts as $row){
        //d($row);
        echo view('olx/advertView',$row);
    }
}

