<html>
<head> 
    <title>File Sharing</title>
</head>

<body>
    <div>
    <h1>Upload a file</h1>
            <form method = "POST" action = "uploadfile.php"  enctype="multipart/form-data">            
                 <input type="text" name="content"  placeholder="Enter File Name">
                 <br>
                 <input type="checkbox" name="rename" value="rename">Keep Origional Name<br>
                 <br >
                 <input type="file" name="image" value="pick a file" style="margin-top:3%;">
                 <br>
                 <input type="submit" name="Submit" value="Upload" class="btn btn-danger" style="margin-top:  3%;" >
            </form>
     </div>
    
<div><?php include("loadfiles.php"); ?></div>
    
    

</body>
</html>

