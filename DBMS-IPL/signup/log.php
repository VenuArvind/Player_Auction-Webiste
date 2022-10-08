<?php
$host = "localhost";
$user = "postgres";
$pass = "Arvind2002";
$db = "IPL";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="author" content="A Venu Arvind(2020115101)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL Auction-Login</title>
    <link href="../css/log.css" type="text/css" rel="stylesheet">

</head>
<body>
<div class='bold-line-login'></div>
<div class='containerlogin'>
  <div class='window-login'>
    <div class='main-login'></div>
    <div class='content-login'>
      <div class='welcome-login'>Welcome to IPL Auction</div>
      <div class='subtitle-login'>To participate in the auction you need to login.If you do not have an account, please sign up.</div>
      <div class='input-fields-login'>
        <form class="loginform" method="post">
        <input type='Team' name="loginteam" placeholder='Team' class='input-line full-width'></input>
        <input type='password' name="loginpass" placeholder='Password' class='input-line full-width'></input>
      </div>
      <div class='spacing-login'>If you do not have an account, please click here to  <span class='highlight-login'><a class="tosign"href="sign.php" targdet="_self">Sign Up</a></span></div>
      <div><input type="submit" value="Login" class='ghost-round-login full-width'></div>
    
    </form>
    </div>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['loginteam']) && isset($_POST['loginpass']))
{
  $teamlogin=$_POST['loginteam'];
  $passlogin=$_POST['loginpass'];
  $q= <<< EOF
  SELECT * FROM signup;
  EOF;
  $check=pg_query($con,$q);
  $flag=0;
    while($row=pg_fetch_row($check))
    {
      if($row[1]==$teamlogin && $row[2]==$passlogin)
      {
        $flag=1;
        break;
      }
    }
    if($flag==1)
    {
      session_start();
      $_SESSION['teamname']=$_POST['loginteam'];
      $_SESSION['password']=$_POST['loginpass'];
      header("location:../index.php");
    }
    else
    {
      echo "<script>alert('Invalid credentials!!!')</script>";
      echo "<script>location.replace(log.php)</script>";
    }
}  
?>