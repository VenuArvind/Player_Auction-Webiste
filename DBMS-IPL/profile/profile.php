<!DOCTYPE html>
<?php
$host = "localhost";
$user = "postgres";
$pass = "Arvind2002";
$db = "IPL";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
if(!isset($_SESSION['password'])){
   header("location:../signup/log.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="A Venu Arvind(2020115101)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL-Auction</title>
    <link href="../css/profile.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header class="navigation" id="myHeader">
        <ul class="container">
            <li class="nav1" id="one"><img src="../images/ipl.jpg" alt="Ipl" width="100" height="100"></li>
            <li class="nav1" id="two"><a class="Title" href="../index.php" target="_self">IPL Auction</a></li>
            <li class="navele1"><a class="hlinks" href="../index.php" target="_self">Home</a></li>
            <li class="navele1"><a class="hlinks" href="../about/about.php" target="_self">About Us</a></li>
            <li class="navele1"><a class="hlinks" href="../profile/profile.php" target="_self">Profile</a></li>
            <li class="navele1"><a class="hlinks" href="../auction/auction.php" target="_self">Auction</a></li>
            <li class="navele1"><a class="hlinks" href="../logout.php" target="_self">Logout</a></li>
        </ul>
    </header>
    <main>
    <h1 class="aheading"><em>Profile Page</em></h1>
    <?php
      echo "<div class='profile'>";
    $q= <<< EOF
    SELECT * FROM signup;
    EOF;    
    $check=pg_query($con,$q);
    while($row=pg_fetch_row($check))
    {
    if($_SESSION['teamname']==$row[1])
      {
          echo "<p><h2>Owner Name:</h2>$row[0]<br><br><h2>Team name:</h2>$row[1]</p><br>";
          echo "<h2>Change password:</h2><br>";     
     }
    }
  
    echo "<form method='post'>";
    echo "<input type='input' name='old' placeholder='Old password'>";
    echo "<br><br>";
    echo "<input type='input' name='new' placeholder='New password'>";
    echo "<br><br>";
    echo "<input type='submit' name='changepass' value='Confirm'> ";
    echo "</form>";
    $q1= <<< EOF
    SELECT * FROM signup;
    EOF; 
    $check=pg_query($con,$q1);
    while($roww=pg_fetch_row($check))
    {
        if(isset($_POST['changepass']))
        {
            $old=$_POST['old'];
            $new=$_POST['new'];
            $change=$_POST['changepass'];
            if($old==$roww[2])
            {
                $q2= <<< EOF
                UPDATE signup SET "Password"='$new' where "Password"='$old';   
                EOF;
                $check1=pg_query($con,$q2);
                echo "<script> alert('Password changed');</script>";
            }

        }
    }
    echo "</div>";
    echo "<br><br>";    
    echo "<h2 class='active'><em>Active bids</em></h2>";
    echo "<br><br>";
    $q1= <<< EOF
    SELECT * FROM auction;
    EOF;    
    $check1=pg_query($con,$q1);
    while($row=pg_fetch_row($check1))
    {
    if($_SESSION['teamname']==$row[5])
      {
        echo "<br><br>";
        echo "<nav class='aform'>";
        echo "<div class='aformcontainer'>";
        echo "<img class='img' src='../images/$row[3]' height='300' width='300'>";
        echo "</div>";
        echo "<div class='aformcontainer'>";
        echo "<p class='apl'><h3>Player Name:</h3> $row[1]<br><br><h3>Role:</h3> $row[4]<br><br>";
        echo "<h3>Bidding price:</h3> $row[2]<br><br>";
        echo "</div></nav><br><br>";
     }
    }

    ?>
    </main>
    <footer class="ending">
        <nav class="end">
            <div class="container1">
                <h3>Contact</h3>
                <br>
                <p class="a4">
                    Head Office:<br>
                    Locality: Adyar<br>
                    City: Chennai<br>
                    State:Tamil nadu<br> 
                    </p>
                    Phone <a class="phone" href="tel:919494605679">:919494605679</a><br>
                    Landline <a class="phone" href="tel:04434543454">:04434543454</a><br> 
                    <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31099.627260881265!2d80.24177580895177!3d13.006773278122665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267ed15c41681%3A0x6569ce967a249e83!2sAdyar%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1625062768299!5m2!1sen!2sin" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="container1">
               <h3>Menu</h3>
               <br>
               <ul class="links">
                   <li class="a2"><a class="flinks" href="../index.php" target="_self">Home</a></li>
                   <li class="a2"><a class="flinks" href="../about/about.php" target="_self">About Us</a></li>
                   <li class="a2"><a class="flinks" href="../auction/auction.php" target="_self">Auction</a></li>
                      
               </ul>
               <br><br><br><br><br><br><br><br>
           <p class="copyright">
                   <br><br><br><br><br><a class="gotop" href="#top">Go back to the Top</a>
                   <br><br><br>
                   <i>©Copyright 2011-2025.<br>All rights reserved.Powered by <em>Present solution.</em></i>
               </p>
            </div>   
            <div class="container1">
                <h3>Newsletter</h3>
                <br>
                <form name="emailv" method="POST">
                <input type="email" name="emailv1" placeholder="   Your email address" size="20">
                <input type="submit" name="Validate" value="Sign Up" onclick="ValidateEmail(document.emailv.emailv1)"/>
                </form>
                <br><br><br>
                <ul class="logos">
                    <li class="a1"><a href="https://www.facebook.com/" target="_blank"><img class="logo1" src="../images/fblogo1.jpg" width="25" height="23" alt="fb"></a></li>
                    <li class="a1"><a href="https://www.instagram.com/" target="_blank"><img class="logo1"src="../images/inslogo.png" width="25" height="23" alt="ig"></a></li>
                    <li class="a1"><a href="https://twitter.com/?lang=en" target="_blank"><img class="logo1" src="../images/twitterlogo1.png" width="25" height="23" alt="tw"></a></li>
                    <li class="a1"><a href="https://www.youtube.com/" target="_blank"><img class="logo1" src="../images/ytlogo.png" width="25" height="23" alt="yt"></a></li>
                </ul>
            </div> 
        </nav>
    </footer>
</body>
</html>