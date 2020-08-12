<?php
include "includes/dbconnect.php";
$pwd  =$usname =$repwd =$phone="";

 $pwdErr =$unameerr = $rpderr=$phnerr=$err="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

  
  if(empty($_POST['uname'])){
    $unameerr="Provide User Name";
  }
  else{
    $usname = $_POST['uname'];
  }

  if(empty($_POST['phone'])){
    $phnerr= "Provide mobile number";
  }
  else{
    $phone = $_POST['phone'];
  }

if(empty($_POST['pwd'])){
      $pwdErr = "Password cannot be empty!";
    }
    else{
      $pwd = $_POST['pwd'];
    }

    if(empty($_POST['rpwd'])){
      $err = "Password cannot be empty!";
    }
    
    else{
      $repwd = $_POST['rpwd'];
      if($pwd!=$repwd)
      {
        $err="Password does not match";
      }
    }

    $membersQuery = "select mobile as phone from members where username='$usname'";
    $resultmembers = mysqli_query($conn, $membersQuery);
    if($row=mysqli_fetch_assoc($resultmembers))
    {
      if($phone==$row['phone'])
      {
        $phash=password_hash($pwd, PASSWORD_DEFAULT);
        $upquery="update members set password='$phash' where username='$usname'";
        $result= mysqli_query($conn, $upquery);
        echo "<script>window.alert('Password set successfully!')</script>";
        $pwd  =$usname =$repwd =$phone="";

 $pwdErr =$unameerr = $rpderr=$phnerr=$err="";


      }
      else
      {
        echo "<script>window.alert('Mobile number does not match!')</script>";
      }

    }
    else{
      echo "<script>window.alert('Username does not exist!')</script>" ;
    }
  }



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Recover Password</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
    function pass_check()
    {
      var passwide=document.getElementById('passcheck').value;

      
      if(passwide.length>=6)
      {
        document.getElementById('pwd_font').style.display="none";
        document.getElementById('conbtn').style.display="block";
      }
      else{
        document.getElementById('pwd_font').style.display="block";
        document.getElementById('conbtn').style.display="none";
       
        
      }
      if(document.getElementById('passcheck').value==document.getElementById('rpasscheck').value)
      {
        document.getElementById('rpwd_font').style.display="none";
        document.getElementById('conbtn').style.display="block";
      }
      else
      {
        document.getElementById('conbtn').style.display="none";
        document.getElementById('rpwd_font').style.display="block";
      }

    }
    
    </script>


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="index.php"> <img src="image/home.PNG" alt="Home" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="UserLogin.php"> <img  src="image/back.PNG" alt="Back" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
     <div class="absolute1" style="top:170px;right:490px;font-size:27px;color:maroon;"><pre><b>RECOVER PASSWORD</b></pre></div>
     <div class="absolute2" style="top:240px;font-size:20px;right:600px"><pre>    <b><font color="blue">User Name:</font></b>        <input type="text" name="uname" value="<?php echo $usname; ?>" placeholder="Enter user name"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $unameerr;?></span></pre></div>
    <div class="absolute2" style="top:280px;font-size:20px;right:600px"><pre>    <b><font color="blue">Password:</font></b>         <input type="password" id="passcheck" onkeyup="pass_check()" name="pwd" value="" placeholder="Enter password"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $pwdErr;?><label id="pwd_font">*Minimum length 6! </label></span></pre></div>
     <div class="absolute2" style="top:330px;font-size:20px;right:600px"><pre>    <b><font color="blue">Re-Type Password:</font></b> <input type="password" id="rpasscheck" onkeyup="pass_check()" name="rpwd" value="" placeholder="re-type password"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $err;?><label id="rpwd_font">*password does not match!</label></span></pre></div>
     <div class="absolute2" style="top:380px;font-size:20px;right:600px"><pre>    <b><font color="blue">Mobile Number:</font></b>    <input type="text" name="phone" value="" placeholder="Enter mobile number"style="height:25px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"></span><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $phnerr;?></span></pre></div>
     <div class="absolute2" style="top:420px;font-size:15px;right:600px"><pre>   <font color="blue">Note*:Enter mobile number used during registration.</font></pre></div>
    <div class="absolute2" style="top:450px; right: 360px"><pre>   <input type="submit" name="" id="conbtn" value="Confirm" style="background-color: rgb(30,144,255);color:maroon;width:150px;height:40px;font-size:22px" ></pre></div>
    </div>
    <div class="center3" >    </div>
</form>
</body>
</html>
