<?php
include "includes/dbconnect.php";
$bldgrp=$quan="";
$bldgrperr=$quanerr="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(empty($_POST["bloodgrp"]))
{
  $bldgrperr="Select Blood Group";
}
else{
  $bldgrp=$_POST["bloodgrp"];
}
if(empty($_POST["quantity"]))
{
  $quanerr="Provide Quantity";
}
else{
  $quan=$_POST["quantity"];
}
$stockQuery = "select Quantity from blood_stocks where BloodGroup='$bldgrp'";
      $resultstock = mysqli_query($conn, $stockQuery);
      if($row=mysqli_fetch_assoc($resultstock))
      {
        if($row['Quantity']>=$quan)
        {
          $charge=$quan*100;
          $m_status="unregistered";
          $o_status="accepted";
          $user="-------";
          $reqestQuery="INSERT INTO  blood_requests (username,blood_group,quantity,member_status,order_stutus,service_charge) 
          values ('$user','$bldgrp','$quan','$m_status','$o_status','$charge');";

          $res= mysqli_query($conn,$reqestQuery);
         

          $upquery="update blood_stocks set Quantity=Quantity-'$quan' where BloodGroup='$bldgrp'";
          $result= mysqli_query($conn, $upquery);
          echo "<script>window.alert('Blood request accepted!')</script>";

        }
        else{
          $charge=0;
          $user="-------";
          $m_status="unregistered";
          $o_status="denied";
          $requery="INSERT INTO  blood_requests (username,blood_group,quantity,member_status,order_stutus,service_charge)
           values ('$user','$bldgrp','$quan','$m_status','$o_status','$charge');";

          $resultreq=mysqli_query($conn,$requery);

          echo "<script>window.alert('Quantity not available!')</script>";
        }
      }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Blood Request</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="index.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="index.php"> <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:red;right: 270px;top:230px;width:460px;font-size:35px;font-family:Algerian" ><b>BLOOD REQUEST</b>  </div>
    <div class="absolute"style="top:210px; right: 970px"><img src="image/b11.jpg" alt="life saver" width="300px" height="250px"></div>  
     <div class="absolute2" style="top:300px;font-size:20px;right:500px"><pre>    <b><font color="blue">Blood Group:</font></b><select name="bloodgrp" style="hieght:35px;">
                                                <option value="" disabled selected>Select your blood group
                                                <option value="A+" <?php if($bldgrp=="A+"){?> selected<?php } ?>>A+
                                                <option value="A-" <?php if($bldgrp=="A-"){?> selected<?php } ?>>A-
                                                <option value="B+" <?php if($bldgrp=="B+"){?> selected<?php } ?>>B+
                                                <option value="B-" <?php if($bldgrp=="B-"){?> selected<?php } ?>>B-
                                                <option value="AB+" <?php if($bldgrp=="AB+"){?> selected<?php } ?>>AB+
                                                <option value="AB-" <?php if($bldgrp=="AB-"){?> selected<?php } ?>>AB-
                                                <option value="O+" <?php if($bldgrp=="O+"){?> selected<?php } ?>>O+
                                                <option value="O-" <?php if($bldgrp=="O-"){?> selected<?php } ?>>O-
                                            </select><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $bldgrperr;?></span></pre></div>
     <div class="absolute2" style="top:350px;font-size:20px;right:500px"><pre>    <b><font color="blue">Quantity:</font></b>   <input type="number" name="quantity" value="<?php echo $quan;?>" min="1" placeholder="Enter quantity"style="height:15px;width:160px"><span style="height:10px;color:red;font-size:25px;font-family:Monotype Corsiva"><?php echo $quanerr;?></span></pre></div>
    <div class="absolute2" style="top:420px; right: 335px"><pre>   <input type="submit" name="request" value="Request" style="background-color: rgb(30,144,255);color:maroon;width:170px;height:47px;font-size:22px" ></pre></div>
  </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
