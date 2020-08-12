<?php

session_start();
if(isset($_SESSION['uname']))
{

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if($_POST["stock"])
    {
      header("Location:Blood_Stock.php");
    }
    elseif($_POST["info"])
    {
      header("Location:Member_Info.php");
    }
    elseif($_POST["history"])
    {
      header("Location:systemhistory.php");
    }

    

  }
}
  else
  {
    header("Location:Adminlogin.php");
  }







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Admin View</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 210px"><a href="Adminlogout.php"> <img src="image/logout.png" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:maroon;right: 280px;top:180px;width:460px;font-size:45px;font-family:Monotype Corsiva" ><b>Administration</b>  </div>
    <div class="absolute"style="top:260px; right: 1000px"><img src="image/tala.png" alt="life saver" width="300px" height="250px"></div>  
    <div class="absolute2" style="top:250px; right: 400px"><pre>   <input type="submit" name="stock" value="Blood Stock" style="background-color: rgb(30,144,255);cursor: pointer;color:maroon;width:150px;height:60px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>
    <div class="absolute2" style="top:330px; right: 600px;width:100px;height:70px"><pre>   <input type="submit" name="info" value="Information" style="background-color: rgb(30,144,255);cursor: pointer;color:maroon;width:150px;height:60px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>
    <div class="absolute2" style="top:410px; right: 394px"><pre>  <input type="submit" name="history" value="All History" style="background-color: rgb(30,144,255);color:maroon;cursor: pointer;width:150px;height:60px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>

    </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
