<?php
include "includes/dbconnect.php";
$email =$addr=$phone="";
$emailErr =$addrErr =$phnerr=$err="";
session_start();
$user="";
if(isset($_SESSION['username']))
{


   

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $user=$_SESSION['username'];
        if(empty($_POST["mail"])&&empty($_POST["add"])&&empty($_POST["phone"]))
        {
          $err="Note*:No information provide for update!";
        }
        elseif(!empty($_POST["mail"])&&!empty($_POST["add"])&&!empty($_POST["phone"]))
        {
          $email=$_POST["mail"];
          $addr=$_POST["add"];
          $phone=$_POST["phone"];


          $upquery="update members set gmail='$email',address='$addr',mobile='$phone' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }
        elseif(!empty($_POST["mail"])&&!empty($_POST["add"]))
        {
          $email=$_POST["mail"];
          $addr=$_POST["add"];
       


          $upquery="update members set gmail='$email',address='$addr' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }
        elseif(!empty($_POST["add"])&&!empty($_POST["phone"]))
        {
          
          $addr=$_POST["add"];
          $phone=$_POST["phone"];


          $upquery="update members set address='$addr',mobile='$phone' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }
        elseif(!empty($_POST["mail"])&&!empty($_POST["phone"]))
        {
          $email=$_POST["mail"];
       
          $phone=$_POST["phone"];


          $upquery="update members set gmail='$email',mobile='$phone' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";
        }
        elseif(!empty($_POST["mail"]))
        {
          $email=$_POST["mail"];
        


          $upquery="update members set gmail='$email' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }
        elseif(!empty($_POST["add"]))
        {
       
          $addr=$_POST["add"];
         


          $upquery="update members set address='$addr' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }
        elseif(!empty($_POST["phone"]))
        {
          
          $phone=$_POST["phone"];


          $upquery="update members set mobile='$phone' where username='$user'";
            $result= mysqli_query($conn, $upquery);
            echo "<script>window.alert('Information update successfully!')</script>";

        }


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
    <title>Update Information</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="UserView.php"> <img src="image/home.PNG" alt="Home" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="UserView.php"> <img  src="image/back.PNG" alt="Back" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>  
     <div class="absolute1" style="top:170px;right:490px;font-size:27px;color:maroon;"><pre><b>UPDATE INFORMATION</b></pre></div>
    <div class="absolute2" style="top:240px;font-size:20px;right:550px"><pre>    <b><font color="blue">Email:</font></b>         <input type="email" name="mail" value="" placeholder="Enter Email"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span></pre></div>
     <div class="absolute2" style="top:290px;font-size:20px;right:550px"><pre>    <b><font color="blue">Adress:</font></b>        <input type="text" name="add" value="" placeholder="Enter Adress"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span></pre></div>
     <div class="absolute2" style="top:340px;font-size:20px;right:550px"><pre>    <b><font color="blue">Mobile Number:</font></b> <input type="text" name="phn" value="" placeholder="Enter Mobile Number"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span></pre></div>
    <div class="absolute2" style="top:410px; right: 347px"><pre>   <input type="submit" name="" value="Update" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:40px;font-size:22px" ></pre></div>
    
    <div class="absolute2" style="top:385px;font-size:15px;right:550px"><pre>      <font color="red"><?php echo $err; ?></font></pre></div>
    
    <div class="absolute2" style="top:480px; right: 375px;font-size:20px;color:blue"><pre>   <a href="Change_password.php" >Change Password</a></pre></div>
  </div>
    <div class="center3" >    </div>
</form>
</body>
</html>
