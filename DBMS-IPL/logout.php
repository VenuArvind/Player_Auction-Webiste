<?php
$host = "localhost";
$user = "postgres";
$pass = "Arvind2002";
$db = "IPL";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
session_destroy();
echo "<script>window.location.replace('signup/log.php')</script>";
exit();
?>