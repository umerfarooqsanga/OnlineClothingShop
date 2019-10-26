<!DOCTYPE html>
<html lang="en">

<head>
    
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QUIBBLE - An Online Trivia Game</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<form method="POST" action="userlogin.php" enctype="multipart/form-data">
       <h1>Upload File</h1>
        <input type = "text" placeholder = "First Name" name = "firstName" required >
        <input type = "text" placeholder = "Last Name" name = "lastName" required >
        <input type = "text" placeholder = "Email" name = "email" required >
        <input type = "text" placeholder = "User Name" name = "username" required >
 
    <input type = "Password" placeholder = "Enter Password" name = "password" required >
    
    
     <button type="submit" name="submit" class="sign" style ="background-color: #4CAF50;">Upload Faile</button>
    
    </form>
   
</body>
    <?php
#include("includes/connect.php");
if(isset($_POST['submit']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $username = $_POST['username'];
     $date = date('d/m/y');
     
     //$adminName   = get_current_user();
    
    if($firstName =='' or $lastName=='' or $email=='' or $password=='' or $email==''or $username=='')
    {
        echo "<script>alert('Any field is empty')</script>";
        exit();
    }
    
    $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
    $query = "INSERT INTO quibble.userlogin(username, password, email, firstName, lastName) VALUES ('$username','$password','$email','$firstName','$lastName') ";
    
    if(mysqli_query($link, "$query" ))
    {
       echo "<center><h1>You have Signed Up</h1></center>";
   
    }
    
    mysqli_close($link);
   
#mysqli_close($link);
}
else{
    echo "an error occured for this query";
}
?>
</html>


