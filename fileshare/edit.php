<?php
?>
<html>
<head> 
    <title>File Sharing</title>
</head>

<body>
    <div>
    <h1>Edit Uploaded file</h1>
    <form method = "POST" name ="Submit" action="editfile.php>"  enctype="multipart/form-data"> 
                
      <? php
      $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
      mysqli_select_db($link, "Enter your project name here");
    
      $editId = @$_GET['edit'];

      $query = "SELECT * FROM record.files left join record.types on files.extension = types.extension WHERE fileId='$editId'";
      $run = mysqli_query($link, "$query" );

      while ($row = mysqli_fetch_array( $run))
      {
       $id = $row['fileId'];
       $name = $row['fileName'];
       $icon = $row['icon'];
       ?>
                 <input type="text" name="content" value="<?php echo $name; ?>"  placeholder="Enter File Name">
                 <br>
                 <input type="checkbox" name="rename" value="rename">Keep Origional Name<br>
                 <br >
                 <input type="file" name="image" src="../icons/<?php echo $icon; ?>" value="pick a file" style="margin-top:3%;">
                 <br>
                 <input type="submit" name="Submit" value="Update" class="btn btn-danger" style="margin-top:  3%;" >
    </form>
     </div>
   <? php } ?>
<div><?php include("loadfiles.php"); ?></div>


</body>
</html>


