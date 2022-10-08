<!DOCTYPE html>
<?php
$host = "localhost";
$user = "postgres";
$pass = "Arvind2002";
$db = "IPL";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
if(!isset($_SESSION['password'])){
   header("location:signup/log.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="A Venu Arvind(2020115101)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL-Auction</title>
    <link href="../css/about.css" type="text/css" rel="stylesheet">
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
    <div class="indexpage">
    <img class="indexp" src="../images/mainpage.jpg" width="900" height="500" alt="ip">
    <br><br><br>
    <p>
    <em><b>IPL</b></em> Media Advisory<br><br>12 players register for IPL 2022 Player Auction<br><br>The IPL Player Registration closed on January 20th 2022.<br><br> Total of 400 players (300 Indian and 100 overseas players) have signed up to be part of the IPL 2022.<br><br>The two-day Mega Auction will see 10 Teams bidding for some of the finest talents in world cricket.<br><br>The players list incorporates 350 capped, 12 uncapped and 38 Associate players.<br><br><em>The detailed list is as below:</em><br><br>    
- Capped Indian (280 players)<br><br>
- Capped International (70 players)<br><br>
- Associate (38 players)<br><br>
- Uncapped Indians who were a part of previous IPL seasons (5 players)<br><br>
- Uncapped International who were a part of previous IPL seasons (4 players)<br><br>
- Uncapped Indians (2 players)<br><br>
- Uncapped Internationals (1 player)<br><br>
<br><br>
</p>
    </div>
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
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31099.627260881265!2d80.24177580895177!3d13.006773278122665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267ed15c41681%3A0x6569ce967a249e83!2sAdyar%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1625062768299!5m2!1sen!2sin"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                    <input type="submit" name="Validate" value="Sign Up"
                        onclick="ValidateEmail(document.emailv.emailv1)" />
                </form>
                <br><br><br>
                <ul class="logos">
                    <li class="a1"><a href="https://www.facebook.com/" target="_blank"><img class="logo1"
                                src="../images/fblogo1.jpg" width="25" height="23" alt="fb"></a></li>
                    <li class="a1"><a href="https://www.instagram.com/" target="_blank"><img class="logo1"
                                src="../images/inslogo.png" width="25" height="23" alt="ig"></a></li>
                    <li class="a1"><a href="https://twitter.com/?lang=en" target="_blank"><img class="logo1"
                                src="../images/twitterlogo1.png" width="25" height="23" alt="tw"></a></li>
                    <li class="a1"><a href="https://www.youtube.com/" target="_blank"><img class="logo1"
                                src="../images/ytlogo.png" width="25" height="23" alt="yt"></a></li>
                </ul>
            </div>
        </nav>
    </footer>
</body>

</html>