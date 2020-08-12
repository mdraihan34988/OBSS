<?php
include "includes/dbconnect.php";
session_start();


if(isset($_SESSION['uname']))
{
  $perPage = 3;
  $commentsQuery = "SELECT * from members limit $perPage";
  $resultComments = mysqli_query($conn, $commentsQuery);

  $totalCommentsQuery = "SELECT COUNT(*) as t_c FROM members";
  $resultTotalComments = mysqli_query($conn, $totalCommentsQuery);
  $rowTotalComments = mysqli_fetch_assoc($resultTotalComments);
  $tC = $rowTotalComments['t_c'];
  
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
    <title>Member Information</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="jquery.js"></script>
    <script>

      $(document).ready(function(){
      
      var j = 0;
      var i=document.getElementById('total').value;
     

      $('#prevBtn').click(function(){
        j = j - 3;
        if(j<0)
        {
          j=0;

        }
        else
        {
          $('#info').load('next_member_info.php',{startingVal: j});
        }
      
      });

      $('#nextBtn').click(function(){     
        j = j + 3;
        if(j>=i)
        {
          j=j-3;
        }
        else
        {
          $('#info').load('next_member_info.php',{startingVal: j});
        }
      
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
    <div class="absolute"style="top:85px; right: 270px"><a href="AdminView.php"> <img src="image/home.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
    <div class="absolute"style="top:85px; right: 210px"><a href="AdminView.php">  <img src="image/back.PNG" alt="Submit1" style="height:50px;width:50px"></a> </div>  
  </div>

    <div class="center2" >  
    <div class="absolute"style="color:red;right: 370px;top:170px;width:460px;font-size:30px;font-family:Algerian" ><b>MEMBER INFORMATION</b>  </div>
   <input type="text" id="total" value="<?php echo $tC; ?>" hidden>
  
  <div class="absolute" id="info" style="right: 900px;top:220px;font-size:12px;font-family:Calibari" >
  

    
    <?php
   
   if($resultComments->num_rows>0)
   { ?>
    <table  align="center" border="1" cellspacing="2" width="700">
    <tr>
      <th>Full Name</th>
      <th>User Name</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Blood Group</th>
      <th>Profession</th>
      <th>City</th>
      <th>Gmail</th>
      <th>Mobile</th>
    </tr> <?php
     while($row = mysqli_fetch_assoc($resultComments))
     {
       echo "<tr><td>".$row["name"]."</td><td>".$row["username"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["bloodgroup"]."</td><td>".$row["profession"]."</td><td>".$row["city"]."</td><td>".$row["gmail"]."</td><td>".$row["mobile"]."</td><tr>";

     }
    
   }
   else{

    echo "No result found";
   }
  

   ?>
    </table>
    </div>
    <div class="absolute"  style="right: 600px;top:500px;" >
    <button class="btnpg" type="button" name="btnPrev" id="prevBtn">Previous</button><button class="btnpg" type="button" name="btnNext" id="nextBtn">Next</button>
	  </diV>
    </div>
  
    <div class="center3" >    </div>
</form>
</body>
</html>
