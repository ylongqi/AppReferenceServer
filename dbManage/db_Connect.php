<?php
function db_Connect(){
    
    $db = new mysqli('localhost', 'webadmin', 'fjournaling', 'fjournaling');

    if (!$db) {
        throw new Exception('Database Connect Failed!');
    } else {
        return $db;
    }
}
?>
