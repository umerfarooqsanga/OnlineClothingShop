
    
    <?php
    $fileId = $_GET['download'];
    $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
    mysqli_select_db($link, "Enter your project name here");
    
    $query = "SELECT * FROM record.files left join record.types on files.extension = types.extension where fileId='$fileId'";
    $run = mysqli_query($link, "$query" );
        
    $i=1;

while ($row = mysqli_fetch_array( $run))
{
    
  
    
 
    $id = $row['fileId'];
    $Name = $row['fileName'];
    $date = $row['dateTime'];
    $size = $row['fileSize'];
    $extension = $row['extension'];
    $type = $row['type'];
    $icon = $row['icon'];
    
    if($icon == ''){
        $icon = "unknown";
    }
    $icon .= ".ico";
   // $link =  getcwd();
    $link = "files/";
    $link .= $Name;
    $link .= ".";
    $link .= $extension;
    echo $link;
      
header("location: $link");

             
    } 
?>