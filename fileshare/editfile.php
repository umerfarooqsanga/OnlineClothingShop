



<?php

if(isset($_POST['Submit']))
{
     //$title = $_POST['title'];
     $date = date('d/m/y');
    
     $content = $_POST['content'];
     //$imageName = $_POST['image']['name'];
     $fileName = $_FILES['image']['name'];
     $fileType = $_FILES['image']['type'];
     $fileSize = $_FILES['image']['size'];
     $fileTmp = $_FILES['image']['tmp_name'];
    
     $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    
   // str_replace($extension, "", $fileName);
    
     if(!isset($_POST['rename'])){
        $fileName = $content;
    }
    else{
     $period_position = strrpos($fileName, ".");
     $fileName = substr($fileName, 0, $period_position);
    }

    move_uploaded_file($fileTmp,"files/$fileName.$extension");
    
    $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
    mysqli_select_db($link, "Enter your project name here");
    
   $updateQuery = "UPDATE record.files SET fileName ='$fileName', fileSize = '$fileSize', dateTime='$dat', extension='$extesion', postContant='$postContent' WHERE postId='$updateId'";
    
    if(mysqli_query($link, "$updatQuery" ))
    {
       
    }
    
    mysqli_close($link);
 header("location: index.php");
}


?>