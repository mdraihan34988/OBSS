<?php
include "includes/dbconnect.php";
session_start();
$user=$ld="";
if(isset($_SESSION['username']))
{
  $user=$_SESSION['username'];
  $date=date("yy-m-d");
  $button_status="enable";
  $currentdate=$date;
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST['btn']))
    {
      $memQuery = "select name,bloodgroup from members where username='$user'";
        $resultmem = mysqli_query($conn, $memQuery);
        if($row=mysqli_fetch_assoc($resultmem))
        {
          $name=$row['name'];
          $bldgrp=$row['bloodgroup'];
          $datequery="insert into blood_donors (username,name,blood_group,last_donate_date)
                                       values ('$user','$name','$bldgrp','$currentdate');";
          $result= mysqli_query($conn, $datequery);
          $upquery="update blood_stocks set Quantity=Quantity+1 where BloodGroup='$bldgrp'";
          $upresult=mysqli_query($conn, $upquery);
          echo "<script>window.alert('available for blood donation')</script>";
        }
        $button_status="disable";

    }
    if(!empty($_POST['donatedate']))
    {
      $ld=$_POST['donatedate'];
      
    }
    else
    {
      $ld=$date;
    }
    
  }
  else
  {
    
    $currentdate=$diff="";
    $userquery="select * from blood_donors where username='$user'";
    $resultuser=mysqli_query($conn, $userquery);
    if($row=mysqli_fetch_assoc($resultuser))
    {
      $membersQuery = "select max(last_donate_date) as date from blood_donors where username='$user'";
    $resulttime = mysqli_query($conn, $membersQuery);
    if($row=mysqli_fetch_assoc($resulttime))
    {
      $ld=$row['date'];
     

      $diff=date_diff(date_create($currentdate),date_create($row['date']));
      if($diff->format("%a")>=90)
      {
        
        
        

      }
      else
      {
        $left=90-$diff->format("%a");
        echo "<script>window.alert('You can not donate blood before $left days')</script>";
        $button_status="disable";

       
      }



    }
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
    <title>Donate Blood</title>
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
    <div class="absolute"style="color:maroon;right: 280px;top:180px;width:460px;font-size:45px;font-family:Script MT Bold" ><b>Donate Blood</b>  </div>
    <div class="absolute"style="color:maroon;right: 420px;top:290px;width:400px;font-size:30px" ><b><font color="blue">Last Time Blood Donated </font>   </b>   </div>
    <div class="absolute"style="color:maroon;right: 70px;top:285px;width:400px;font-size:30px" > <input type="text" name="donatedate" value="<?php if(!empty($ld))
    echo $ld; ?>"  disabled
    
    
     style="width:200px;">   </div>

    <div class="absolute"style="top:190px; right: 1000px"><img src="image/L11.jpg" alt="life saver" width="300px" height="250px"></div>   
<div class="absolute" style="top:340px; right: 370px"><pre>  <input type="submit" name="btn" id="sbtn"  value="SUBMIT" <?php if($button_status=="disable") {?> hidden <?php }?> style="background-color: rgb(30,144,255);color:maroon;width:210px;height:40px;font-size:24px;font-family:Monotype Corsiva" ></pre></div>

    </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
