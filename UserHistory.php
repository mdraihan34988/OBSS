<?php

include "includes/dbconnect.php";

session_start();
$user="";
if(isset($_SESSION['username']))
{
  $user=$_SESSION['username'];
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    
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
    <title>History</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="jquery.js"></script>
    <script>
    $(document).ready(function(){

      $('#request').click(function(){

        $('#info').load('req.php',{user:document.getElementById('username').value});

      });

        $('#donate').click(function(){
          $('#info').load('don.php',{user:document.getElementById('username').value});


        });



          $('#balance').click(function(){
            $('#info').load('bal.php',{user:document.getElementById('username').value});

          });






    });
    
    
    
    </script>



</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>     
    <div class="center1" >
    <div class="absolute"style="top:77px; right: 980px"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
    <div class="absolute"style="top:82px; right: 900px"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>   
    <div class="absolute"style="top:85px; right: 270px"><a href="UserView.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="UserView.php"> <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:red;right: 320px;top:170px;width:460px;font-size:30px;font-family:Algerian" ><b>USER HISTORY</b>  </div>
     <div class="absolute" style="right: 860px;top:220px;"><button type="button" id="request" name="bldreq" style="font-family:Cooper Black;font-size:14.25pt; color:maroon;background-color: rgb(224,255,255); height:45px;width:200px;border:none">Request History</button></div>
     <div class="absolute" style="right: 640px;top:220px;"><button type="button" id="donate" name="dobhis" style="font-family:Cooper Black;font-size:14.25pt; color:maroon;background-color: rgb(224,255,255); height:45px;width:170px;border:none">Donate History</button></div>
     <div class="absolute" style="right: 450px;top:220px;"><button type="button" id="balance" name="amp" style="font-family:Cooper Black;font-size:14.25pt; color:maroon;background-color: rgb(224,255,255); height:45px;width:170px;border:none">Amount Paid </button></div>
     <input type="text" id="username" value="<?php echo $user; ?>" hidden>
     <div class="absolute" id="info" style="right: 900px;top:280px;">
     



     </div>
    </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
