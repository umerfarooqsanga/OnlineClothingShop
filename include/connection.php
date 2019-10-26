<?php

$conn = mysqli_connect('localhost','root','');
$db = mysqli_select_db($conn,'mydb') or die(mysqli_error($conn));
?>
