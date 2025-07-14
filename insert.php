<?php
    include 'connection.php';
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $province = $_POST['province'];
    $profile = $_POST['profile'];
    global $connection;
    $insert = "INSERT INTO `tbemployees` (`emp_name`, `sex`, `position`, `salary`, `province`, `profile`) 
    VALUES ('$name', '$sex', '$position', '$salary', '$province', '$profile')";
$connection->query($insert);
?>