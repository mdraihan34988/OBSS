<?php

include "includes/dbconnect.php";

$fName = $pwd = $email = $dob  = $gender = $bldGrp = $addr=$usname =$repwd =$prof =$city=$phone=$phash="";

  $fNameErr = $pwdErr = $emailErr = $dobErr  = $genderErr=$unameerr = $rpderr=$bldGrpErr = $addrErr =$proferr =$cityErr=$phnerr=$err="";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['fullname'])){
      $fNameErr = "Name cannot be empty!";
    }
    else{
      $fName = mysqli_real_escape_string($conn,$_POST['fullname']);
    }

    if(empty($_POST['pwd'])){
      $pwdErr = "Password cannot be empty!";
    }
    else{
      $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    }

    if(empty($_POST['rpwd'])){
      $err = "Password cannot be empty!";
    }
    
    else{
      $repwd = mysqli_real_escape_string($conn,$_POST['rpwd']);
      if($pwd!=$repwd)
      {
        $err="Password does not match";
      }
      else{
        $phash=password_hash($pwd, PASSWORD_DEFAULT);
      }
    }


    if(empty($_POST['mail'])){
      $emailErr = "Email cannot be empty!";
    }
    else{
      $email = mysqli_real_escape_string($conn,$_POST['mail']);
    }

    if(empty($_POST['dob'])){
     $dobErr="Provide Date of Birth";
    }
    else{
      $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    }

    if(empty($_POST['uname'])){
      $unameerr="Provide User Name";
    }
    else{
      $usname = mysqli_real_escape_string($conn,$_POST['uname']);
    }

    if(empty($_POST['address'])){
      $addrErr="Provide address";
    }
    else{
      $addr = mysqli_real_escape_string($conn,$_POST['address']);
    }

    if(empty($_POST['gender'])){
      $genderErr = "Select a gender";
    }
    else{
      $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    }

    if(empty($_POST['bloodgrp'])){
      $bldGrpErr = "Please select blood group";
    }
    else{
      $bldGrp = mysqli_real_escape_string($conn,$_POST['bloodgrp']);
    }
    if(empty($_POST['city'])){
      $cityErr = "Provide city";
    }
    else{
      $city = mysqli_real_escape_string($conn,$_POST['city']);
    }
    if(empty($_POST['phone'])){
      $phnerr= "Provide mobile number";
    }
    else{
      $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    }
    if(empty($_POST['profession'])){
      $proferr= "Provide profession";
    }
    else{
      $prof = mysqli_real_escape_string($conn,$_POST['profession']);
    }
    $sqlUserCheck = "SELECT username FROM members WHERE username = '$usname'";
    $result = mysqli_query($conn, $sqlUserCheck);
    $uNameInDB="";

    while($row = mysqli_fetch_assoc($result)){
      $uNameInDB = $row['username'];
    }

    if($uNameInDB == $usname){
      $unameerr = "UserName already exists!";
    }
    else{//password_hash($CuPass, PASSWORD_DEFAULT)
      $sql = "INSERT INTO members (name,username,password,dob,gender,profession,bloodgroup,gmail,city,address,mobile)
              VALUES ('$fName','$usname','$phash','$dob','$gender','$prof','$bldGrp','$email','$city','$addr','$phone');";

      mysqli_query($conn, $sql);
      echo "<script> window.alert('Succesfully Registered!') </script>";
     $fName = $pwd = $email = $dob  = $gender = $bldGrp = $addr=$usname =$repwd =$prof =$city=$phone=$phash="";

  $fNameErr = $pwdErr = $emailErr = $dobErr  = $genderErr=$unameerr = $rpderr=$bldGrpErr = $addrErr =$proferr =$cityErr=$phnerr=$err="";
    }


    


  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="Registration.css">
    <script>
    function pass_check()
    {
      var passwide=document.getElementById('passcheck').value;

      
      if(passwide.length>=6)
      {
        document.getElementById('pwd_font').style.display="none";
        document.getElementById('regbtn').style.display="block";
      }
      else{
        document.getElementById('pwd_font').style.display="block";
        document.getElementById('regbtn').style.display="none";
       
        
      }
      if(document.getElementById('passcheck').value==document.getElementById('rpasscheck').value)
      {
        document.getElementById('rpwd_font').style.display="none";
        document.getElementById('regbtn').style.display="block";
      }
      else
      {
        document.getElementById('regbtn').style.display="none";
        document.getElementById('rpwd_font').style.display="block";
      }

    }
    
    </script>
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="center" ></div>
  <div class="center1" >
  
        <div class="absolute5"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
        <div class="absolute6"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>
        <div class="absolute"style="top:85px; right: 340px"><a href="index.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"> </a></div>  
        <div class="absolute"style="top:85px; right: 275px"><a href="Userlogin.php"> <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  

  </div>
  <div class="center2" ></div>
  <div class="absolute8" style="top: 160px;right: 550px;"><b><font style="font-family:Algerian;font-size:15.75pt; color:red; align=center; ">REGISTRATION FORM</font></b></div>
  <div class="absolute8" style="top: 200px;right: 550px;"><input type="text" name="fullname" value="<?php echo $fName; ?>" placeholder="Enter your full name" style="width:200px;" required>  </div>
  <div class="absolute8" style="top: 230px;right: 550px;"><input type="text" name="uname" value="<?php echo $usname; ?>" placeholder="Enter your user name" style="width:200px;" required>  </div>
  <div class="absolute8" style="top: 260px;right: 550px;"><input type="password" id="passcheck" name="pwd" value="" placeholder="Enter your password" onkeyup="pass_check()" style="width:200px;" required> </div>
  <div class="absolute8" style="top: 290px;right: 550px;"><input type="password" name="rpwd" id="rpasscheck" value="" placeholder="Re-enter your password" onkeyup="pass_check()" style="width:200px;"  required> </div>
  <div class="absolute8" style="top: 320px;right: 550px;"><input type="date" name="dob" value="<?php echo $dob; ?>"  style="width:200px;" required>   </div>
  <div class="absolute8" style="top: 350px;right: 550px;"><input type="radio" name="gender" value="Male" <?php if($gender=="Male"){?> checked <?php } ?> required> <font style="font-family:Lucida Console;font-size:10.75pt; color:black;  ">Male</font> <input type="radio" name="gender" value="Female"  <?php if($gender=="Female"){?> checked<?php } ?>> <font style="font-family:Lucida Console;font-size:10.75pt; color:black;  ">Female</font><input type="radio" name="gender" value="Other"  <?php if($gender=="Other"){?> checked<?php } ?> > <font style="font-family:Lucida Console;font-size:10.75pt; color:black;  ">Other  </font></div>
  <div class="absolute8" style="top: 380px;right: 550px;"><input type="text" name="profession" value="<?php echo $prof; ?>" placeholder="Enter your profession" style="width:200px;" required>   </div>
  <div class="absolute8" style="top: 410px;right: 550px;"><select name="bloodgrp" style="width:205px;" required>
                                                <option value="" disabled selected>Select your blood group
                                                <option value="A+" <?php if($bldGrp=="A+"){?> selected<?php } ?> >A+
                                                <option value="A-" <?php if($bldGrp=="A-"){?> selected<?php } ?> >A-
                                                <option value="B+" <?php if($bldGrp=="B+"){?> selected<?php } ?> >B+
                                                <option value="B-" <?php if($bldGrp=="B-"){?> selected<?php } ?> >B-
                                                <option value="AB+" <?php if($bldGrp=="AB+"){?> selected<?php } ?> >AB+
                                                <option value="AB-" <?php if($bldGrp=="AB-"){?> selected<?php } ?> >AB-
                                                <option value="O+" <?php if($bldGrp=="O+"){?> selected<?php } ?> >O+
                                                <option value="O-" <?php if($bldGrp=="O-"){?> selected<?php } ?> >O-
                                            </select></div>
    <div class="absolute8" style="top: 440px;right: 550px;"><input type="email" name="mail" value="<?php echo $email; ?>"  placeholder="Enter your gmail" style="width:200px;" required> </div>
    <div class="absolute8" style="top: 470px;right: 550px;"><select name="city" style="width:205px;" required>
                                                <option value="" disabled selected>Enter your city
                                                <option value="Banani" <?php if($city=="Banani"){?> selected<?php } ?>>Banani
                                                <option value="Ghulsan" <?php if($city=="Ghulsan"){?> selected<?php } ?> >Ghulsan
                                                <option value="Basundhara" <?php if($city=="Basundhara"){?> selected<?php } ?>  >Basundhara
                                                <option value="Uttara" <?php if($city=="Uttara"){?> selected<?php } ?>  >Uttara
                                                <option value="Mirpur" <?php if($city=="Mirpur"){?> selected<?php } ?>  >Mirpur
                                                <option value="Badda" <?php if($city=="Badda"){?> selected<?php } ?>  >Badda
                                                <option value="Mohakhali" <?php if($city=="Mohakhali"){?> selected<?php } ?>  >Mohakhali
                                                <option value="Nikunjo" <?php if($city=="Nikunjo"){?> selected<?php } ?>  >Nikunjo
                                                <option value="Dhanmondi" <?php if($city=="Dhanmondi"){?> selected<?php } ?> >Dhanmondi
                                            </select></div>                                           
    <div class="absolute8" style="top: 500px;right: 550px;"><input type="text" name="address" value="<?php echo $addr; ?>"  placeholder="Enter your address" style="width:200px;" required> </div>
    <div class="absolute8" style="top: 530px;right: 550px;"><input type="tel" name="phone" value="<?php echo $phone; ?>"  placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{5}[0-9]{3}" style="width:200px;" required> </div>                                          
                                                                                          
  <div class="absolute8" style="top: 200px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $fNameErr;?></span></div>
  <div class="absolute8" style="top: 230px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $unameerr;?></span> </div>
  <div class="absolute8" style="top: 260px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $pwdErr;?></span> <span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva" ><?php if($pwdErr==""){ ?><label id="pwd_font">*Minimum length 6! </label><?php } ?></span>  </div>
  <div class="absolute8" style="top: 290px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $err;?></span>  <span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva" ><label id="rpwd_font">*password does not match!</label></span></div>
  <div class="absolute8" style="top: 320px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $dobErr;?></span> </div>
  <div class="absolute8" style="top: 350px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $genderErr;?></span></div>
  <div class="absolute8" style="top: 380px;right: 340px;"> <span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $proferr;?></span></div>
  <div class="absolute8" style="top: 410px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $bldGrpErr;?></span></div>
  <div class="absolute8" style="top: 440px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $emailErr;?></span></div>
  <div class="absolute8" style="top: 470px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $cityErr;?></span> </div>
  <div class="absolute8" style="top: 500px;right: 340px;"><span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $addrErr;?></span></div>
  <div class="absolute8" style="top: 530px;right: 340px;"> <span style="height:10px;color:red;font-size:20px;font-family:Monotype Corsiva"><?php echo $phnerr;?></span></div>



    
    
    <div class="absolute8" style="top: 560px;right: 550px;"><input type="submit" id="regbtn" name="resister" value="Resister"   style="font-family:Cooper Black;font-size:11.25pt;color:maroon;background-color: rgb(30,144,255);height:30px;width:205px"> </div>                                          
    
    
    
    <div class="absolute8" style="top: 200px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Full Name:</font></label></div>
    <div class="absolute8" style="top: 230px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">User Name:</font></label></div>
    <div class="absolute8" style="top: 260px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Password:</font></label></div>
    <div class="absolute8" style="top: 290px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Re-enter Password:</font></label></div>
    <div class="absolute8" style="top: 320px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Date of Birth:</font></label></div>
    <div class="absolute8" style="top: 350px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Gender</font></label></div>
    <div class="absolute8" style="top: 380px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Profession:</font></label></div>
    <div class="absolute8" style="top: 410px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Blood Group:</font></label></div>
    <div class="absolute8" style="top: 440px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px"> Gmail:</font></label></div>
    <div class="absolute8" style="top: 470px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">City:</font></label></div>
    <div class="absolute8" style="top: 500px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Address:</font></label></div>
    <div class="absolute8" style="top: 530px;right: 680px;"><label for=""><font style="font-family:Book Antiqua;font-size:11.25pt;color: rgb(30,144,255);height:30px;width:205px">Mobile:</font></label></div>
    <div class="absolute8" style="top: 590px;right: 520px;"><label for=""><font style="font-family:Book Antiqua;font-size:9pt;color: rgb(255,0,0)">Note*:All fields are required!</font></label></div>
    



   

  
  <div class="center3" ></div>

  
  
  
  
  </form>
    
</body>
</html>