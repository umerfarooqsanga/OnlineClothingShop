
    
        <?php
    $fileId = $_GET['view'];
    $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
    $query = "SELECT * FROM record.files left join record.types on files.extension = types.extension where fileId='$fileId'";
    $run = mysqli_query($link, "$query" );
        
    $i=1;
while ($row = mysqli_fetch_array( $run))
{
    $id = $fileId;
    $Name = $row['fileName'];
    $date = $row['dateTime'];
    $size = $row['fileSize'];

    $type = $row['type'];
    $icon = $row['icon'];
    
    if($icon == ''){
        $icon = "unknown";
    }
    $icon .= ".ico";
?>
        
    <tr>
        
    <p ><center><img src="icons/<?php echo $icon; ?>" width="35" align="left" height="40"></center></p>
        
     <h2><?php echo $Name; ?></h2><br>
        <p>Type : <?php echo $type ?></p><br>
        <p>File No : <?php echo $i++ ?></p><br>
        <p>File Size : <?php echo $size; ?></p><br>
        <p>Last Modified : <?php echo $date; ?></p><br>
        
        <p><a href="edit.php?edit=<?php echo $id; ?> ">Modify</a></p><br>
        <p><a href="deletefile.php?delete=<?php echo $id; ?>">Delete</a></p><br>
        <p><a href="downloadfile.php?download=<?php echo $id; ?>">Download</a><br>
        </p>
    </tr>
  <?php } ?>      
    
<div><?php include("loadfiles.php"); ?></div>