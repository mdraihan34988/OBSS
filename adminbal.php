<?php
include "includes/dbconnect.php";

 $bal=0;
	
	$commentsQuery = "SELECT sum(service_charge) as balance from blood_requests";
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
<table  align="center" border="1" cellspacing="2" width="500">
<tr>
<td>
<font style="color:red;font-size:20px;font-family:Algerian" >Blood bank balance is :</font> </td>
<?php
while($row = mysqli_fetch_assoc($result)){
    $bal=$row['balance'];
	?> <td> <font style="color:red;font-size:20px;font-family:Algerian" >  <?php echo  $bal;
}

?>

BDT </font></td></tr></table>

    
</body>
</html>
