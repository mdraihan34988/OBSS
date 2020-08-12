<?php
include "includes/dbconnect.php";
if(isset($_POST['startingVal'])){
	$stv = $_POST['startingVal'];
	$commentsQuery = "SELECT name,username,dob,gender,bloodgroup,profession,city,gmail,mobile from members limit $stv, 3";
	$result = mysqli_query($conn, $commentsQuery);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Information</title>
</head>
<body>
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
</tr>
<?php

if($result->num_rows>0)
{
 while($row=$result->fetch_assoc())
 {
   echo "<tr><td>".$row["name"]."</td><td>".$row["username"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["bloodgroup"]."</td><td>".$row["profession"]."</td><td>".$row["city"]."</td><td>".$row["gmail"]."</td><td>".$row["mobile"]."</td><tr>";

 }

}
?>
    </table>

    
</body>
</html>



























