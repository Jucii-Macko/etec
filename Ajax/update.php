<?php
include 'connection.php';
date_default_timezone_set('Asia/Phnom_Penh');

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$position = $_POST['position'];
$salary = $_POST['salary'];
$province = $_POST['province'];
$profile = $_POST['profile'];
$update_at = date('y-m-d H:i:s');

$sql = "UPDATE tbemployees SET 
    emp_name='$name',
    sex='$sex',
    position='$position',
    salary='$salary',
    province='$province',
    profile='$profile',
    update_at='$update_at'
    WHERE emp_id='$id'";

if ($connection->query($sql)) {
    echo 'Success';
} else {
    echo 'Error';
}
?>
