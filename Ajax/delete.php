<?php
    include 'connection.php';
    global $connection;
    $id = $_POST['id'];
    $delete = "DELETE FROM `tbemployees` WHERE `emp_id`='$id'";
    $results = $connection->query($delete);
    if($results){
        echo 'Success';
    }
?>