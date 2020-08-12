<?php

session_start();


include "includes/dbconnect.php";
$flag=0;


$perPage = 2;
$np=$tC =0;
$a=1;
$startingRow = 0;
$resultmembers="";
  

$bldGrp =$City="";
$bldGrpErr ="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST['bloodgrp'])){
        $bldGrpErr = "*Please select a blood group";
        
      }
      else{
        $bldGrp = $_POST['bloodgrp'];
        $flag=1;
        $_SESSION['bldgrp']=$_POST['bloodgrp'];
      }
      if(empty($_POST['city'])){
       
      }
      else{
        $City = $_POST['city'];
        $_SESSION['city']=$City;
      }
      if(isset($_POST['limit']))
      {
        $perPage=$_POST['limit'];
        $_SESSION['pp']=$_POST['limit'];
      }

      
      if(isset($_POST['city']))
      {
        $membersQuery = "select * from members where bloodgroup='$bldGrp' and city='$City' limit $startingRow, $perPage";
        $resultmembers = mysqli_query($conn, $membersQuery);
      
        $totalmembersQuery = "SELECT COUNT(*) as t_c FROM members where bloodgroup='$bldGrp' and city='$City'";
        $resultTotalmembers = mysqli_query($conn, $totalmembersQuery);
        $rowTotalmembers = mysqli_fetch_assoc($resultTotalmembers);
        $tC = $rowTotalmembers['t_c'];
      
        $np = ceil($tC/$perPage);

      }

     
      else
      {
        $membersQuery = "select * from members where bloodgroup='$bldGrp' limit $startingRow,$perPage";
        $resultmembers = mysqli_query($conn, $membersQuery);
      
        $totalmembersQuery = "SELECT COUNT(*) as t_c FROM members where bloodgroup='$bldGrp'";
        $resultTotalmembers = mysqli_query($conn, $totalmembersQuery);
        $rowTotalmembers = mysqli_fetch_assoc($resultTotalmembers);
        $tC = $rowTotalmembers['t_c'];
      
        $np = ceil($tC/$perPage);

        
      }






}

elseif($_SERVER["REQUEST_METHOD"]=="GET"){
	
	if(isset($_SESSION['pp'])){
	  $perPage = $_SESSION['pp'];
  }
  if(isset($_SESSION['bldgrp'])){
    $bldGrp= $_SESSION['bldgrp'];
    $flag=1;
  }
  if(isset($_SESSION['city'])){
	  $City = $_SESSION['city'];
	}
	
    if(!empty($_GET['x'])){
      $a = $_GET['x'];
    }

    $startingRow = ($a-1)*$perPage;
    if(isset($_SESSION['city']))
      {
        $membersQuery = "select * from members where bloodgroup='$bldGrp' and city='$City' limit $startingRow, $perPage";
        $resultmembers = mysqli_query($conn, $membersQuery);
      
        $totalmembersQuery = "SELECT COUNT(*) as t_c FROM members where bloodgroup='$bldGrp' and city='$City'";
        $resultTotalmembers = mysqli_query($conn, $totalmembersQuery);
        $rowTotalmembers = mysqli_fetch_assoc($resultTotalmembers);
        $tC = $rowTotalmembers['t_c'];
      
        $np = ceil($tC/$perPage);

      }

     
      else
      {
        $membersQuery = "select * from members where bloodgroup='$bldGrp' limit $startingRow,$perPage";
        $resultmembers = mysqli_query($conn, $membersQuery);
      
        $totalmembersQuery = "SELECT COUNT(*) as t_c FROM members where bloodgroup='$bldGrp'";
        $resultTotalmembers = mysqli_query($conn, $totalmembersQuery);
        $rowTotalmembers = mysqli_fetch_assoc($resultTotalmembers);
        $tC = $rowTotalmembers['t_c'];
      
        $np = ceil($tC/$perPage);

        
      }



  }


  $conn->close();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Search Donor</title>
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="distroy.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="distroy.php"> <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:red;right: 320px;top:150px;width:460px;font-size:36px;font-family:Algerian" ><b>SEARCH DONOR</b>  </div>
    <div class="absolute"style="top:195px;cursor:pointer; right: 310px"> <input type="image" id="srbtn" src="image/Search-icon.png" alt="Submit1" style="height:35px;width:35px"> </div>  

    <div class="absolute2" style="top:170px;font-size:25px;right:650px"><pre>    <b><font color="blue">Select Blood Group:</font></b><select name="bloodgrp" id="bldgrp" style="hieght:35px;">
    <option value="" disabled selected>Select your blood group
                                                <option value="A+" <?php if($bldGrp=="A+"){?> selected<?php } ?> >A+
                                                <option value="A-" <?php if($bldGrp=="A-"){?> selected<?php } ?> >A-
                                                <option value="B+" <?php if($bldGrp=="B+"){?> selected<?php } ?> >B+
                                                <option value="B-" <?php if($bldGrp=="B-"){?> selected<?php } ?> >B-
                                                <option value="AB+" <?php if($bldGrp=="AB+"){?> selected<?php } ?> >AB+
                                                <option value="AB-" <?php if($bldGrp=="AB-"){?> selected<?php } ?> >AB-
                                                <option value="O+" <?php if($bldGrp=="O+"){?> selected<?php } ?> >O+
                                                <option value="O-" <?php if($bldGrp=="O-"){?> selected<?php } ?> >O-
                                            </select></pre></div>
     <div class="absolute2" style="top:220px;font-size:25px;right:320px;"> <span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $bldGrpErr;?></span></div>
     <div class="absolute2" style="top:270px;font-size:20px;right:350px;"> <span style="height:10px;color:blue;font-size:20px;font-family:Monotype Corsiva"><?php echo "  Note*:You can search donor location wise.";?></span></div>
     <div class="absolute2" style="top: 220px;right: 650px;font-size:25px;"><pre>    <b><font color="blue">Select location:</font></b>   <select name="city"  style="hieght:35px;width:160px;">
                                                <option value="" disabled selected>Select a location
                                                <option value="Banani" <?php if($City=="Banani"){?> selected<?php } ?>>Banani
                                                <option value="Ghulsan" <?php if($City=="Ghulsan"){?> selected<?php } ?> >Ghulsan
                                                <option value="Basundhara" <?php if($City=="Basundhara"){?> selected<?php } ?>  >Basundhara
                                                <option value="Uttara" <?php if($City=="Uttara"){?> selected<?php } ?>  >Uttara
                                                <option value="Mirpur" <?php if($City=="Mirpur"){?> selected<?php } ?>  >Mirpur
                                                <option value="Badda" <?php if($City=="Badda"){?> selected<?php } ?>  >Badda
                                                <option value="Mohakhali" <?php if($City=="Mohakhali"){?> selected<?php } ?>  >Mohakhali
                                                <option value="Nikunjo" <?php if($City=="Nikunjo"){?> selected<?php } ?>  >Nikunjo
                                                <option value="Dhanmondi" <?php if($City=="Dhanmondi"){?> selected<?php } ?> >Dhanmondi
                                            </select></div>  
     <div class="absolute2" style="top: 275px;right: 650px;font-size:25px;">
     <pre>    <b><font color="blue">Donor per page:</font></b> <select name="limit" id="lim" style="hieght:35px;width:40px;"></pre>
     <option value="2" selected>2
     <option value="3" >3
     <option value="4" >4
   

    </select>
     
    </div>
      <div class="absolute2" id="info" style="top: 335px;right: 750px;font-size:15px;">
      <br>
      <?php
      if($flag==1){?>
      <table border="1" cellspacing="2" width="700">
      <tr>
      <th>Full Name</th>
      <th >Mobile Number</th>
      <th >City</th>
      <th >Gender</th>
      <th >Mail</th>
      <th >Blood group</th>
      
      </tr>
      <?php
      
        while ($row = mysqli_fetch_assoc($resultmembers)) {?>
        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['mobile'];  ?></td>
        <td ><?php echo $row['city']; ?></td>
        <td ><?php echo $row['gender'];  ?></td>
        <td ><?php echo $row['gmail'];  ?></td>
        <td ><?php echo $row['bloodgroup'];  ?></td>
        </tr>
                                                                    
      <?php  }
      
      ?>
      </table>
      <?php  }
      
      ?>
      <br>
        
      

      <?php
      if ($startingRow > 0) { ?>
        <a  href="Search_doner.php?x=<?php echo ($a-1); ?>"> <button  type="button" name="btnPrev" id="prvBtn">Previous</button></a>
	
    <?php
      }

      for ($i=1; $i <= $np; $i++) { ?>
         <a  href="Search_doner.php?x=<?php echo ($i); ?>"> <button id="btn"  type="button" name="btn" ><?php echo $i; ?></button></a>
      <?php

        }

      if (($perPage+$startingRow) <= ($tC-1)) { ?>
        <a  href="Search_doner.php?x=<?php echo ($a+1); ?>"><button   type="button" name="btnNext" id="nxtBtn">Next</button></a>
    <?php

      }

    ?>
    </div>


      </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
