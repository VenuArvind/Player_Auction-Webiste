<?php
$host = "localhost";
$user = "postgres";
$pass = "Arvind2002";
$db = "IPL";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="author" content="A Venu Arvind(2020115101)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL auction-Sign Up</title>
    <link href="../css/sign.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class='bold-line-sign'></div>
<div class='container-sign'>
  <div class='window-sign'>
    <div class='main-sign'></div>
    <div class='content-sign'>
      <div class='welcome-sign'>Welcome to the IPL auction</div>
      <div class='subtitle-sign'>To enter the auction, create an account</div>
      <div class='input-fields-sign'>
        <form class="signform" name="myform" method="post">
        <input type='text' name='signame' placeholder='Owner Name' class='input-line full-width'></input>
        <input type='team' name="signteam" placeholder='Team' class='input-line full-width'></input>
        <input type='password' name="signpass" placeholder='Password' class='input-line full-width'></input>
        <input type='password' name="signpass1" placeholder='Confirm Password' class='input-line full-width'></input>
      </div>
      <div class='spacing-sign'>If you already have an account, please click here to  <span class='highlight-sign'><a class="tologin"href="log.php" targdet="_self">Log in</a></span></div>
      <div><input type="submit" class='ghost-round-sign full-width' value="Create an Account"></div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['signame']) && isset($_POST['signteam']) && isset($_POST['signpass']) && isset($_POST['signpass1']))
{
  $name=$_POST['signame'];
  $team=$_POST['signteam'];
  $pass=$_POST['signpass'];
  $cpass=$_POST['signpass1'];
  if($pass==$cpass)
  {
    $q= <<< EOF
    SELECT * FROM signup;
    EOF;
    $q1= <<< EOF
    INSERT INTO signup VALUES ('$name','$team','$pass');
    EOF;
    $check=pg_query($con,$q);
    $flag=0;
    while($row=pg_fetch_row($check))
    {
      if($row[1]==$team)
      {
        $flag=1;
        break;
      }
    }
    
  if($flag==1)
  {
    echo "<script>alert('Account already exists.Please login');</script>";
    echo "<script>location.replace(log.php)</script>";
  }
  else{
  $ret1=pg_query($con,$q1);
  echo "<script>alert('Account had been successfully created')</script>";
  echo "<script>location.replace(log.php)</script>";
  }
  }
}
pg_close($con);
?>
