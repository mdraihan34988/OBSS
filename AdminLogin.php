<?php 
session_start();
$user=$pass="";
$usererr=$passerr="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  // if(isset($_POST["Login"]))
      if(empty($_POST["uname"]))
      {
        $usererr="Required User Name!";
      }
      elseif(empty($_POST["password"])&&!empty($_POST["uname"]))
      {
        $passerr="Required Password!";
      }
      else
      {
        $user=$_POST["uname"];
        $pass=$_POST["password"];
        if($user=="SRK")
        {
          if($pass=="aiub")
          {
            $_SESSION['uname']=$user;
            header("Location:AdminView.php");
          }
          else{
            $passerr="Invalid password!";
          }

        }
        else{
          $usererr="Invalid User Name!";
          $user="";
        }
      }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="index.php"> <img src="image/home.PNG" alt="Home" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="index.php"> <img  src="image/back.PNG" alt="Back" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:maroon;right: 350px;top:180px;width:460px;font-size:45px;font-family:Monotype Corsiva" ><b>Welcome To Admin Panel </b>  </div>
    <div class="absolute"style="right: 500px;top:255px"><img src="image/avatar-icon.png" alt="avatar" width="70px" height="60px"></div>
    <div class="absolute"style="top:260px; right: 1000px"><img src="image/tala.png" alt="life saver" width="300px" height="250px"></div>  
     <div class="absolute2" style="top:300px;font-size:20px;right:500px"><pre>    <b><font color="blue">User Name:</font></b> <input type="text" name="uname" value="<?php echo $user; ?>" placeholder="Enter User Name"style="height:25px"> <span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $usererr;?></span></pre></div>
     <div class="absolute2" style="top:350px;font-size:20px;right:500px"><pre>    <b><font color="blue">Password:</font></b>  <input type="password" name="password" value="" placeholder="Enter Password"style="height:25px"> <span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $passerr;?></span></pre></div>
    <div class="absolute2" style="top:420px; right: 345px"><pre>   <input type="submit" name="login" value="Log In" style="background-color: rgb(30,144,255);cursor: pointer;color:maroon;width:150px;height:47px;font-size:22px" ></pre></div>
  </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
