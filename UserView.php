<?php 
include "includes/dbconnect.php";
session_start();
$user=$blood="";
if(isset($_SESSION['username']))
{
  $user=$_SESSION['username'];
      if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      
      if($_POST["donate"])
      {
        header("Location:Blood_Donation_checking.php");
      }
      elseif($_POST["request"])
      {
        header("Location:Blood_Request_Member.php");
      }
      elseif($_POST["history"])
      {
        header("Location:UserHistory.php");
      }
      elseif($_POST["infoedit"])
      {
        header("Location:Update_Info.php");
      }
    



    }
    $sqlUserCheck = "SELECT bloodgroup FROM members WHERE username = '$user'";
    $result = mysqli_query($conn, $sqlUserCheck);
    while($row = mysqli_fetch_assoc($result))
    {
      $blood=$row['bloodgroup'];
    }
}
else{

  header("Location:Userlogin.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User View</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
      
    <div class="absolute"style="top:85px; right: 210px"><a href="logout.php"> <img src="image/logout.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:maroon;right: 330px;top:180px;width:460px;font-size:45px;font-family:Monotype Corsiva" ><b>Welcome To Our System</b>  </div>
    <div class="absolute"style="top:220px; right: 950px"><img src="image/montu.png" alt="life saver" width="300px" height="280px"></div>  
    <div class="absolute"style="top:515px; right: 900px"><pre><label style="color:maroon;font-size:22px;font-family:Monotype Corsiva">Blood Group :</label><label style="color:maroon;font-size:22px;font-family:Monotype Corsiva"> <?php echo $blood; ?></label></pre></div>  
    <div class="absolute2" style="top:250px; right: 400px"><pre>   <input type="submit" name="donate" value="Donate Blood" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:47px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>
    <div class="absolute2" style="top:320px; right: 600px;width:100px;height:70px"><pre>   <input type="submit" name="request" value="Blood Request" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:47px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>
    <div class="absolute2" style="top:390px; right: 394px"><pre>  <input type="submit" name="history" value="History" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:47px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>
    <div class="absolute2" style="top:460px; right: 394px"><pre>  <input type="submit" name="infoedit" value="Edit" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:47px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>

    </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
