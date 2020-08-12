<?php 
include "includes/dbconnect.php";
session_start();
$user=$pass="";
$usererr=$passerr=$uPassInDB="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  // if(isset($_POST["Login"]))
      if(empty($_POST["uname"]))
      {
        $usererr="Required User Name!";
      }
      else
      {
        $user=mysqli_real_escape_string($conn,$_POST["uname"]);
      }
      if(empty($_POST["password"]))
      {
        $passerr="Required Password!";
      }
      else
      {
        
        $pass=mysqli_real_escape_string($conn,$_POST["password"]);
     
      }
      $sqlUserCheck = "SELECT password as pwd FROM members WHERE username = '$user'";
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = mysqli_num_rows($result);

      if($rowCount < 1){
        $usererr = "User does not exist!";
      }
      else{
        while($row = mysqli_fetch_assoc($result)){
          $uPassInDB = $row["pwd"];

          if(password_verify($pass , $uPassInDB)){
            $_SESSION['username'] = $user;
            header("Location:UserView.php");
          }
          else{
                    
                  
                    
            $passerr = "Wrong Password!";
          }
        }
      }
    }
    $conn->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User Login</title>
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
    <div class="absolute"style="right: 500px;top:165px"><img src="image/avatar-icon.png" alt="avatar" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>  
    <div class="absolute"style="top:230px; right: 1000px"><img src="image/tala.png" alt="life saver" width="300px" height="250px"></div>  
    <div class="absolute1" style="top:230px;right:500px;font-size:15px"><pre><b>Sign in with your organizational user name</b></pre></div>
    <div class="absolute2" style="top:270px;font-size:20px;right:500px"><pre>    <b><font color="blue">User Name:<font color="blue"></b> <input type="text" name="uname" value="<?php echo $user; ?>" placeholder="Enter User Name"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $usererr;?></span></pre></div>
     <div class="absolute2" style="top:320px;font-size:20px;right:500px"><pre>    <b><font color="blue">Password:<font color="blue"></b>  <input type="password" name="password" value="" placeholder="Enter Password"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $passerr;?></span></pre></div>
    <div class="absolute2" style="top:380px; right: 345px"><pre>   <input type="submit" name="" value="Log In" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:47px;font-size:22px;cursor: pointer" ></pre></div>
    <div class="absolute2" style="top:450px; right: 405px;font-size:20px;color:blue;"><pre>   <a href="registration.php" >Create a new account</a></pre></div>
    <div class="absolute2" style="top:490px; right: 405px;font-size:20px;color:blue;"><pre>     <a href="Recover_Password.php" >Forgot Passsword?</a></pre></div>

  </div>
    <div class="center3" >    </div>
</form>
</body>
</html>
