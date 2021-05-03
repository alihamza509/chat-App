<?php
session_start();
include("db/db.php");

?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="wrapper">

    <form name="login-form" class="login-form" action="" method="post">
    
        <div class="header">
        <h1>ADMIN PANNEL</h1>
        <span>Only admin can enter by email and password adding.</span>
        </div>
    
        <div class="content">
        <input name="username" type="email" class="input username" placeholder="Email" required/>
        <div class="user-icon"></div>
        <input name="password" type="password" class="input password" placeholder="Password" required />
        <div class="pass-icon"></div>       
        </div>

        <div class="footer">
        <input type="submit" name="enter" value="ADMIN LOGIN" class="button" />
        </div>
    
    </form>

</div>
<div class="gradient"></div>

</body>
</html>
<?php
if(isset($_POST['enter'])){
    $mail=mysqli_real_escape_string($con,$_POST['username']);
    $pass=mysqli_real_escape_string($con,$_POST['password']);
    $query="select*from admin where admin_mail='$mail' and admin_pass='$pass'";
    $runq=mysqli_query($con,$query);
    $num=mysqli_num_rows($runq);
    if($num==1){
        $_SESSION['admin_mail']=$mail;
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }else{
        echo "<script>alert('there is some error try again')</script>";
        exit();
    }
}
?>