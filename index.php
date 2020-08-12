<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($_POST["bloodrequest"])
    {
        header("Location:Blood_Request.php");
    }
    elseif($_POST["login"])
    {
        header("Location:Userlogin.php");
    }
    elseif($_POST["home"])
    {
        header("Location:index.php");
    }
    elseif($_POST["bloodbank"])
    {
        header("Location:AdminLogin.php");
    }
    elseif($_POST["search"])
    {
        header("Location:Search_doner.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Homepage</title>
			<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="center" ></div>
    <div class="center1" >
        <div class="absolute" style="right: 480px;"><input type="submit" value="Blood Request" name="bloodrequest" style="font-family:Cooper Black;font-size:14.25pt; color:maroon;background-color: rgb(224,255,255); height:45px;cursor: pointer;width:225px;border:none"></div>
        <div class="absolute1"style="right: 590px;"><input type="submit" value="Log In" name="login" style="font-family:Cooper Black;font-size:14.25pt;color:maroon;background-color: rgb(224,255,255); height:45px;width:120px;cursor: pointer;border:none"></div>
        <div class="absolute2"><input type="submit" value="Blood Bank" name="bloodbank" style="font-family:Cooper Black;font-size:14.25pt;color:maroon;background-color: rgb(224,255,255); height:45px;width:130px;cursor: pointer;border:none"></div>
        <div class="absolute3" style="right: 885px;"><input type="submit" value="Search Doner" name="search" style="font-family:Cooper Black;font-size:14.25pt;color:maroon;background-color: rgb(224,255,255); height:45px;width:150px;cursor: pointer;border:none"></div>
        <div class="absolute4"><input type="submit" value="Home" name="home" style="font-family:Cooper Black;font-size:14.25pt;color:maroon;background-color: rgb(224,255,255); height:45px;width:120px;cursor: pointer;border:none"></div>
        <div class="absolute5"><img src="image/lifesaver.png" alt="life saver" width="70px" height="60px"></div>
        <div class="absolute6"><img src="image/lifesaver1.png" alt="life saver" width="200px" height="50px"></div>
    </div>

    <div class="center2" >
    <div class="absolute7"><img src="image/Blood.png" alt="Blood" width="70px" height="60px"></div>
    <div class="absolute8"><img src="image/welcome.jpg" alt="Blood" width="250px" height="40px"></div>
    <div class="absolute9">Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great-on any given day. Globally around 85 million units of red blood cells are transfused in a given year. Donate blood despite  the increase in the numbers of donors, blood remains in short supply during emergency, mainly attributed to the lack of  information and accessibility .We positively believe that this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients. </div>
    </div>
    <div class="center3" >
    
    <div class="absolute10"><img src="image/blood1.jpg" alt="Blood" width="270px" height="170px"></div>
    <div class="absolute11"><img src="image/blood2.jpg" alt="Blood" width="270px" height="170px"></div>
    <div class="absolute12"><img src="image/blood3.jpg" alt="Blood" width="275px" height="170px"></div>  
    </div>
</form>
</body>
</html>
