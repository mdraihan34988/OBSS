<?php
include "includes/dbconnect.php";

	
	$commentsQuery = "SELECT * from blood_donors ";
	$result = mysqli_query($conn, $commentsQuery);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if($result->num_rows>0)
{ ?>
<table  align="center" border="1" cellspacing="2" width="700">
<tr>
  <th>Full Name</th>
  <th>User Name</th>

  <th>Blood Group</th>
  <th>Donate Date</th>

</tr>
<?php
 while($row=$result->fetch_assoc())
 {
   echo "<tr><td>".$row["name"]."</td><td>".$row["username"]."</td><td>".$row["blood_group"]."</td><td>".$row["last_donate_date"]."</td><tr>";

 }

}
else
{
  echo "No result found";
}
?>


    
</body>
</html>