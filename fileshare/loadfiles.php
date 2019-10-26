     <div>
    
         <?php 
    //if(isset($_GET['view'])){ ?>
    <table width="900" align="center" border="3">
    <td align="center" colspan="9" bgcolor="orange">
    <h1>All Uploaded Files</h1>    
        </td>
        
    <tr>
        <th>File No.</th>
        <th>Icon</th>
        <th>File Name</th>
        <th>File Size</th>
        <th>Uoload Date</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Details</th>
        <th>Download</th>
    </tr>
        
        <?php
    $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
    $query = "SELECT * FROM record.files left join record.types on files.extension = types.extension";
    $run = mysqli_query($link, "$query" );
        
    $i=1;
while ($row = mysqli_fetch_array( $run))
{
    $id = $row['fileId'];
    $Name = $row['fileName'];
    $date = $row['dateTime'];
    $size = $row['fileSize'];
    
    $icon = $row['icon'];
    echo $icon;
    // 
    
    if($icon == ''){
        $icon = "unknown";
    }
    $icon .= ".ico";
?>
        
    <tr>
        <td><?php echo $i++ ?></td>
        <td ><center><img src="icons/<?php echo $icon; ?>" width="35" height="40"></center></td>
        
        <td><?php echo $Name; ?></td>
        <td><?php echo $size; ?></td>
        <td><?php echo $date; ?></td>
        
        <td><a href="edit.php?edit=<?php echo $id; ?> ">Modify</a></td>
        <td><a href="deletefile.php?delete=<?php echo $id; ?>">Delete</a>
        <td><a href="viewfile.php?view=<?php echo $id; ?>">View Details</a>
        <td><a href="downloadfile.php?download=<?php echo $id; ?>">Download</a>
        </td>
    </tr>
  <?php } ?>      
    </table>

    
</body>
    </html>
        
     </div> 