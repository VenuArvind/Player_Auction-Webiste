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
    <link href="../css/auction.css" type="text/css" rel="stylesheet">
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
    <br><br>
    <h1 class="aheading"><em>Auction Page</em></h1>
    <br>
    <?php
    $arr=array();
    $q= <<< EOF
    SELECT * FROM unsold;
    EOF;    
    $check=pg_query($con,$q);
    while($row=pg_fetch_row($check))
    {
        $q1= <<< EOF
        SELECT max("Bid") from auction where "Name"='$row[1]';
        EOF;
        $tocheck=0;
        $check11=pg_query($con,$q1);
        while($roww=pg_fetch_row($check11))
        {
            $tocheck=$roww[0];
        }
        if($tocheck==0)
        {
            $tocheck=$row[2];
        }
        $arr[$row[0]]=$tocheck;
        echo "<br><br>";
        echo "<form method='post'>";
        echo "<nav class='aform'>";
        echo "<div class='aformcontainer'>";
        echo "<img class='img' src='../images/$row[3]' height='300' width='300'>";
        echo "</div>";
        echo "<div class='aformcontainer'>";
        $bb="bidprice".$row[0];       
        echo "<p class='apl'><h3>Player Name:</h3> $row[1]<br><br><h3>Role:</h3> $row[4]<br><br><h3>About:</h3> $row[5]<br><br>";
        echo "<h3>Base price:</h3>$row[2]<br><br>";
        echo "<h3>Highest bid price:</h3> $tocheck<br><br><input type='input' name='$bb'>";
        $aa="bidsubmit".$row[0];
        echo "<input type='submit' name='$aa' value='Bid'> ";
        echo "</div></nav><br><br>";
        echo "</form>";
    }

    $q= <<< EOF
    SELECT * FROM unsold;
    EOF;    
    $check=pg_query($con,$q);
    while($row=pg_fetch_row($check))
    {
    $aa="bidsubmit".$row[0];
    $bb="bidprice".$row[0]; 
        if(isset($_POST["$aa"]))
        {
            $team=$_SESSION['teamname'];
            $cc=$_POST["$bb"];
            $var=(int)$cc;
            if($var > $arr[$row[0]])
            {
            echo"<script>alert('The bid has been placed')</script>";
            $radno=rand(1,10000);
            $q1= <<< EOF
            INSERT into auction values('$row[0]','$row[1]','$var','$row[3]','$row[4]','$team','$radno');
            EOF;
            $check=pg_query($con,$q1);
            }
            else
            {
                echo "<script>alert('Please bid higher then base price or the highest bid price')</script>";
            }
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