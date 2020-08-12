<?php

include "includes/dbconnect.php";
session_start();
if(isset($_SESSION['uname']))
{
  $sql="SELECT Id,BloodGroup,Quantity from blood_stocks";
  $result=$conn-> query($sql);

}
else
{
  header("Location:Adminlogin.php");
}
$conn->close();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Blood Stock</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="index.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="AdminView.php"> <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:red;right: 320px;top:170px;width:460px;font-size:30px;font-family:Algerian" ><b>BLOOD STOCK</b>  </div>
    
  <br><br><br>
    
    <table  align="center" border="1" cellspacing="6" width="400">
    <tr>
      <th>ID</th>
      <th>Blood Group</th>
      <th>Quantity</th>
    </tr>
    <?php
   
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     {
       echo "<tr><td>".$row["Id"]."</td><td>".$row["BloodGroup"]."</td><td>".$row["Quantity"]."</td><tr>";

     }
    
   }
   else{

    echo "No result found";
   }
   

   ?>
    </table>
    </div>

  
    <div class="center3" >    </div>
</form>
</body>
</html>
