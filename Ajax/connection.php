<?php
    try{
        $connection=new mysqli('localhost', 'root','','db_php_ajax');
    }catch(Exception $e){
        echo 'Connection fail: '.$e;
    }
?>