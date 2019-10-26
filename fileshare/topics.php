<head>
    
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="topiccss/freelancer1.css" rel="stylesheet">
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
    <link href="homecss/freelancer1.css" rel="stylesheet">

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

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default" id = "quibble1" >
        <div class="container">
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll" style = "margin-left:-20%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<a class="navbar-brand" href="home.html">QUIBBLE</a>
                <input type = "text" placeholder = "Search Here" name = "fullname_i">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                 
                    <li class="page-scroll">
                        <a href="home.php">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="topics.php">Topics</a>
                    </li>
                    <li class="page-scroll">
                        <a href="logout.php">Logout</a>
                    </li> 
                    <?php
     $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
    $username = $_SESSION['userName'];
    
    $query = "SELECT * FROM quibble.userlogin WHERE username = '$username' ";

$run = mysqli_query($link, "$query" );
    $count = 0;
while ($row = mysqli_fetch_array( $run))
{
    $lastName = $row['lastName'];
	$firstName = $row['firstName'];
    $image = $row['image'];
    $count++;
}
   if($count!=0){
       
       if($image==""){
       
?>     
                         
                                                  
        <li>
              <div>
                        <img style="color:black; border:2px solid green" src="images/loginimage.jpg" class="img-circle" alt="Cinque Terre" width="50" height="50" title="Smile"> 
                    <h6 style="color:white; text-align:center;">    <a href="updateimage.php?edit">Update Image</a></h6>
                    
                  </div>
                   
                    </li>
                    
<?php
                }
      if($image!=""){
        ?>
                   
					<li> <a href="#portfolio"><?php echo $lastName ?></a></li>
                    
                    <li>
              <div>
                        <img style="color:black; border:2px solid lightgreen" src="images/<?php echo $image; ?>" class="img-circle" alt="Cinque Terre" width="50" height="50" title="Smile"> 
                    <h6 style="color:white; text-align:center;"><a href="updateimage.php?edit">Update Image</a></h6>
                    
                  </div>
                    </li>
               <?php } } ?>
                </ul>
        
            </div>              
            </div>
        
            <!-- /.navbar-collapse -->
				
    
        <!-- /.container-fluid -->
    </nav>
    
    
    
    
		<div id="maindiv" class = "col-sm-12">	
            
<!--           post    -->
            
            
            <?php

 $link = mysqli_connect("localhost","root","") or die ("Couldn't not connect");
mysqli_select_db($link, "Enter your project name here");
    
    $query = "SELECT * FROM quibble.topics ORDER BY type";

$run = mysqli_query($link, "$query" );
while ($row = mysqli_fetch_array( $run))
{
    $id = $row['id'];
  //  $title = $row['postTitle'];
    $type = $row['type'];
    $topic = $row['topic'];
    $logo = $row['logo'];
    
?>
             <div class = "col-sm-12">
                 <div class = "col-sm-10" style = "margin-top:10px;border-radius:5px;background-color: white; float:right;height:auto; width: 90%; margin-right:0%;" >
   <h2><a href="pages.php?id=<?php echo $id; ?>"> <?php echo $type; ?></a></h2>
    
<!--    <p align="right">
    &nbsp &nbsp posted by : &nbsp &nbsp <b><?php echo $author?></b>
    </p>
-->
                     <a href="chalenge.php?topic=<?php echo $topic ?>"><img id="startbtn" src="images/<?php echo $logo; ?>" width="100px" height="100px"></a>
    
    
                     <a href="pages.php?id=<?php echo $id; ?>"><p align="justify"><?php echo $topic ?></p></a>
    
    <p align="right"><a href="pages.php?id=<?php echo $id; ?>">View More</a></p>
            </div>
            </div>
    
<?php } ?>
   
</div>

    
    <div id = "start" class = "col-sm-6" style = "text-align:center;">
        
        
        
        <img class="img-responsive" id = "cross2" src = "images/cross.png" style = "width:25px;height:25px;float:right;display: block; margin: 0 auto">
        <h1><?php echo $topic; ?></h1>
              <img class="img-responsive" id = "cross1" src="images/<?php echo $logo; ?>" style = " display: block;
    margin: 0 auto;padding:4%;">
        
       
        
        <button class = "btn" style = "align:center;padding : 2%;border-radius:35px;background-color:black;color:White;"><b>Play</b></button>
        <div style = "text-align:center;">
            <h2> Or Select your Opponent</h2>
            <input type = "text" placeholder="Opponent Name">
        </div>
              <!--<div class = "container">
        <form class = "col-sm-10" style = "width:auto;height:auto;">
        
        <h1 style = "margin-left:18%;">Change Image</h1>
                  <img src = "t1.PNG" class = "img-rounded img-responsive" style="height:30%;width:110%;margin-left:13%;">
        <input type = "file" name  = "image" value = "upload image" style ="margin-left:30%;">
        <button class = "btn btn-lg btn-outline" type = "submit" style ="margin-left:35%;background-color:black;margin-top:35%;">Change Now</button>
</form>
              </div>-->

</div>
            
            
    <!-- Header -->
    <header>
                
    </header>

    <!-- Portfolio Grid Section -->
    
    <!-- About Section -->
    
    <!-- Contact Section -->
    
    <!-- Footer -->
    
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
        
    </header>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    
    

               <script> 
$(document).ready(function(){
    
       
    $("#cross2").click(function(){
       $("#start").slideToggle("slow");
            $("#start").css({"display":"hidden"});

        
                //$("#innerdiv").css({"display":"none"});
      $("nav").css({"opacity":"1"});
        $("#maindiv").css({"opacity":"1"});        
        
     });
    
    $("#startbtn").click(function(){
       $("#start").slideToggle("slow");
            $("#start").css({"display":"visible"});
                //$("#innerdiv").css({"display":"none"});
        
        $("nav").css({"opacity":"0.1"});
        $("#maindiv").css({"opacity":"0.1"});

    });
    

    $("#update").click(function(){
$("nav").css({"opacity":"0.1"});
        $("#maindiv").css({"opacity":"0.1"});
        $("#innerdiv").css({"display":"visible"});
        $("#innerdiv").slideToggle("slow");
        
    });
    });     
    
  </script>
</body>

</html>

