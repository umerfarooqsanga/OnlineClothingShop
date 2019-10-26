<?php
  $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
$deleteId = $_GET['delete'];

    $deleteQuery = "DELETE FROM record.files WHERE fileId='$deleteId'";
if(mysqli_query($link, "$deleteQuery" )){
  header("location: index.php");
}
 

?>