<html>    
    <head>
        
        <style>
#myProgress {
  position: relative;
  width: 100%;
  height: 30px;
  background-color: #00ff99;
}

#myBar {
  position: absolute;
  width: 1%;
  height: 100%;
  background-color: #4CAF50;
}
    #opProgress {
  position: relative;
  width: 100%;
  height: 30px;
  background-color: cyan;
}

#opBar {
  position: absolute;
  width: 1%;
  height: 100%;
  background-color: darkblue;
}
</style>
        
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="quiz.css" rel="stylesheet">
    </head>
    
    <body style="background-color:black;color:white;" id="body">
      
        
        
        <div id="myProgress">
        <div id="myBar"></div>
        </div>
        
        <div id="opProgress">
        <div id="opBar"></div>
        </div>

<br>
        
        <?php 
        $topic = @$_GET['topic'];
        $image1 = "loginimage.jpg";
        $image2 = "loginimage.jpg";
        $lastName2 = "Waiting";
        $lastName1 = "user";
        ?>
        
        <h1 style="text-align:center";><?php echo $topic ?></h1>
            <div style="float:left">
           <img   src = "images/<?php echo $image1; ?>" class = "img-circle img-responsive" style = "width:100px;height:100px;float:left;">
            <h1 id="points" style="float:left;"> 0 </h1>
            <br><br>
            <h1 style="float:right" id="lastName1"> <?php echo $_SESSION['userName']; ?>  </h1>

            </div>
    
            <div float:right>  
            <h1 id="points2" style="float:right;"> 0 </h1>
               
            <img src = "images/<?php echo $image2; ?>" class = "img-circle img responsive" style = "width:100px;height:100px;float:right;">
            <br> <br><br> <br>
            <br><br>
            <h1 id="time2" style="float:right;"> 0 </h1>
                 <h1 style="float:right" id="user2"><?php echo $lastName2 ?> : </h1>
                </div>
   
         <h1 style="text-align:center" id="time">0</h1>
  
               <div id = "div1" style = "position:relative;">
                   
            <div id = "Q" class = "container" style = "text-align:center;color:black;background-color:white;margin-top:10%;"><h1 id="que">Question</h1></div>
      
            <div class = "container">
            <div style = "padding-left:5%;" class = "col-sm-8">
            <div onclick="next(1)" id = "A1" class = "container A col-sm-5 H" style = "text-align:center;color:black;background-color:white;margin-top:10%;width:30%;float:left"><h1 id="o1"> Option 1 </h1></div>
            <div  onclick="next(2)"  id = "A2" class = "container A col-sm-5 H" style = "text-align:center;color:black;background-color:white;width:30%;float:right;margin-top:10%;"><h1 id="o2"> Option 2</h1></div>
            </div>
            <div   style = "padding-left:5%;" class = "col-sm-8">
            <div onclick="next(3)" id = "A3" class = "container A col-sm-5 H" style = "text-align:center;color:black;background-color:white;margin-top:10%;width:30%;float:left"><h1 id="o3"> Option 3 </h1></div>
            <div onclick="next(4)"  id = "A4" class = "container A col-sm-5 H" style = "text-align:center;color:black;background-color:white;margin-top:10%;width:30%;float:right"><h1 id="o4"> Option 4 </h1></div>
            </div>
        </div>
        </div>
        </div>
        <h1 id="ans">Ans </h1>
        <br>
        <h1 id="temp">0</h1>
<br>
    <h1 id="tempuser2">Waiting....</h1>
     <h1 id="req">req</h1>

<script >
    
    
    
   //document.getElementById("body").addEventListener("load", searchOponent);
    
    var tempid = 0, rId = 0, qId = 0, selected =0;
    var r =0;
    var topic = '<?php echo $topic ?>';
    var points = 0;
    var time = 10;
    var index = 0;
    var questions;
    var ans;
    var t = 11;
    var temp_time;
    var t2;
    var get = 0;
    var qu, op1, op2,op3, op4, result;
    var myVar = setInterval(myTimer, 1000);
    var requestId;
    var a = 0;
    searchOponent();
    getRequestId();
    move1();
    move2();
    var optime = 0;
    
    
    
    function move1() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 100);
  function frame() {
    if (width >= t*10) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}
    
    function move2() {
  var elem2 = document.getElementById("opBar");   
  var width2 = 1;
  var id2 = setInterval(frame, 100);
  function frame() {
    if (width2 >= optime*10) {
      clearInterval(id2);
    } 
      else {
      width2++; 
      elem2.style.width = width2 + '%'; 
    }
  }
}
    
    function getRequestId()
    {
        a = 1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                requestId = xmlhttp.responseText;
                document.getElementById("req").innerHTML = requestId;
            }
        };
        xmlhttp.open("GET", "getoponent.php?topic=" + topic + "&a=" + a, true);
        xmlhttp.send(); 
     }
    
     function searchOponent()
    {
        a = 0;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //document.getElementById("user2").innerHTML = xmlhttp.responseText;
                var oponent = xmlhttp.responseText;
                document.getElementById("user2").innerHTML = oponent;
            }
        };
        xmlhttp.open("GET", "getoponent.php?topic=" + topic + "&a=" + a, true);
        xmlhttp.send(); 
     }
    
function myTimer() {
    
    if(t>0){--t;}
    if(t<10)
        {
            $("#A1").css({"background-color":"white"});
            $("#A2").css({"background-color":"white"});
            $("#A3").css({"background-color":"white"});
            $("#A4").css({"background-color":"white"});
        }
    document.getElementById("time").innerHTML = t;
}
    function opPoints()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("que").innerHTML = xmlhttp.responseText;
                qu = document.getElementById("que").innerHTML;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "nextquestion.php?q=" + index, true);
        xmlhttp.send(); 
    }
    function tempUser()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tempuser2").innerHTML = xmlhttp.responseText;
               
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "temp.php?q=" + index, true);
        xmlhttp.send(); 
    }
    function opSelection()
    {
        
    }
    
    function setData(rrid, qid, ti, poi,select)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("temp").innerHTML = xmlhttp.responseText;
                
                 
            }
        };
        xmlhttp.open("GET", "setcompdata.php?rid=" + rrid+"&qid="+qid+"&u1time="+ti+"&u1points="+poi+"&u1select="+select, true);
        xmlhttp.send(); 
    }
    function updateData(rrid, qid, ti, poi,select)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("temp").innerHTML = xmlhttp.responseText;
                
               
            }
        };
        xmlhttp.open("GET", "updatecompdata.php?rid=" + rrid+"&qid="+qid+"&u2time="+ti+"&u2points="+poi+"&u2select="+select, true);
        xmlhttp.send(); 
    }
    
    function time2(rid, qid)
    {
        tempid = 0;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("time2").innerHTML = xmlhttp.responseText;
               
               
            }
        };
        xmlhttp.open("GET", "getoponentdata.php?tempid=" +tempid+"&rid="+rid+"&qid="+qid, true);
        xmlhttp.send(); 
    }  
    
    function select1(rid, qid)
    {
       tempid = 1;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("points2").innerHTML = xmlhttp.responseText;   
            }
        };
        xmlhttp.open("GET", "getoponentdata.php?tempid=" +tempid+"&rid="+rid+"&qid="+qid, true);
        xmlhttp.send(); 
    }   
    function points2(rid, qid)
    {
       tempid = 2;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("points2").innerHTML = xmlhttp.responseText;
                
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "getoponentdata.php?tempid=" +tempid+"&rid="+rid+"&qid="+qid, true);
        xmlhttp.send(); 
    }
    
    function question()
    {
        r = 0;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("que").innerHTML = xmlhttp.responseText;
                qu = document.getElementById("que").innerHTML;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
    
    function op1()
    {
          r = 1;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("o1").innerHTML = xmlhttp.responseText;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
    
    function op2()
    {
          r = 2;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("o2").innerHTML = xmlhttp.responseText;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
      xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
    
    function op3()
    {
          r = 3;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("o3").innerHTML = xmlhttp.responseText;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
       xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
    function op4()
    {
          r = 4;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("o4").innerHTML =  xmlhttp.responseText;
                 //document.getElementById("A1").innerHTML = xmlhttp.responseText;
            }
        };
         xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
    function ans()
    {
          r = 5;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("ans").innerHTML = xmlhttp.responseText;   
            }
        };
        xmlhttp.open("GET", "nextquestion.php?q=" + index+"&topic="+topic+"&r="+r, true);
        xmlhttp.send(); 
    }
  
function next(option)
{
    searchOponent();
    get = 1;
    

    if(option==1)
    { selected = option;
       if(document.getElementById("o1").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A1").css({"background-color":"green"});
               points = points + t;
          }
       else
          {
            $("#A1").css({"background-color":"red"});
          }
   }
    
    if(option==2)
    { selected = option;
       if(document.getElementById("o2").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A2").css({"background-color":"green"});
           points = points + t;
          }
       else
          {
            $("#A2").css({"background-color":"red"});
          }
   }
   if(option==3)
    { selected = option;
       if(document.getElementById("o3").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A3").css({"background-color":"green"});
           points = points + t;
          }
       else
          {
            $("#A3").css({"background-color":"red"});
          }
   }
    if(option==4)
    { selected = option;
       if(document.getElementById("o4").innerHTML==document.getElementById("ans").innerHTML)
          { 
               points = points + t;
            $("#A4").css({"background-color":"green"});
          }
       else
          {
            $("#A4").css({"background-color":"red"});
          }
   }
    
    if(document.getElementById("o1").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A1").css({"background-color":"green"});
          }
    else if(document.getElementById("o2").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A2").css({"background-color":"green"});
          }
    else if(document.getElementById("o3").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A3").css({"background-color":"green"});
          }
    else if(document.getElementById("o4").innerHTML==document.getElementById("ans").innerHTML)
          { 
            $("#A4").css({"background-color":"green"});
          }
    
      document.getElementById("points").innerHTML = points;
      
    
    
    tempUser();
    
    qId++;
    rId = 0;
    
    
    if(document.getElementById("tempuser2").innerHTML == document.getElementById("user2").innerHTML)
        {
            setData(requestId,qId,t,points,selected);
        }
    else 
        {
            updateData(requestId,qId,t,points,selected);
        }
    
    

}
    

    
</script>
        
         <script> 
$(document).ready(function(){
    $(".A").click(function(){
        
        
var myVa = setInterval(myTime, 1000);
        
function myTime() {
    t2 = t;
    if(t2>-1){--t2;}
    if( get == 1  || (t2<0 && t2>-2)){
   
        $("#A1").delay(1000);
       $("#div1")
           .animate({
            left: '100%'
       }, "slow")
        .delay(100)
        .animate({
            left: '0%'
       }, "slow");
        
    question();
    op1();
    op2();
    op3();
    op4();
    ans();
    move1();
    move2();
    get = 0;
    
 if(document.getElementById("tempuser2").innerHTML != document.getElementById("user2").innerHTML){   
    time2(rId,qId);
    points2(rId, qId);
 }
    index++;
    t=11;
}
}
    });
    
    
    
    });  
    
    
             
  </script>
        
        
    </body>
</html>
