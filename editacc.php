<?php
session_start();
if(!isset($_SESSION['user_email'])){
	header('location:index.php');
}
include("db/db.php");
include("functions/short.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat system</title>
	<link rel="stylesheet" type="text/css" href="stylish.css">
</head>
<body>
<div Class="main">
<div class="logo">
	<img src="images/logo.jpg">

</div>
<div class="navigation">
	<ul id="links">
		<li><a href="main.php">HOME</a></li>
		<li><a href="#">Total USERS</a></li>
		<?php
		$type="select*from title";
		$run=mysqli_query($con,$type);
		while($row=mysqli_fetch_array($run)){
			$id=$row['title_id'];
			$name=$row['title_name'];
			echo "<li><a href='titlename.php?titleid=$id'>$name</a></li>";

		}
		?>	
	</ul>
<form action="search.php" method="post" id="formid">
          <input type="text" name="search" value="search a course">
          <input type="submit" name="submit" value="search">
		</form>
	
</div>
<div class="mainarea" style="float:left;">
	<div id="leftside">
		<?php
		leftside();
		?>
</div>
<div id="rigtside">
	<?php
	$mail=$_SESSION['user_email'];
		$qq="select*from register where user_email='$mail'";
		$runqq=mysqli_query($con,$qq);
		$fetch=mysqli_fetch_array($runqq);
		$id=$fetch['user_id'];
		$pass=$fetch['user_pass'];
		$name=$fetch['user_name'];
		$country=$fetch['user_country'];
		$img=$fetch['user_img'];
		$gender=$fetch['user_gender'];
		?>
<form action="" method="post" enctype="multipart/form-data" id="go">
<table>
<tr>
	<center><td><h2>EDIT YOUR ACCOUNT</h2></td></center>
</tr>
<tr>
	<td align="right"><b>NAME:</b></td>
	<td><input type="text" name="uname" value="<?php echo $name ?>" required></td>

</tr><br>
<tr>
	<td align="right"><b>EMAIL:</b></td>
	<td><input type="email" name="mail" value="<?php echo $mail ?>"required></td><br>

</tr>	
<tr>
	<td align="right"><b>PASSWORD:</b></td>
	<td><input type="password" name="pass" value="<?php echo $pass ?> " required></td>

</tr>
<tr>
	<td align="right"><b>GENDER:</b></td>
	<td><select name="gender" disabled>
		<option><?php echo $gender ?></option>
	</select></td>

</tr>	
<tr>
	<td align="right"><b>country:</b></td>
	<td><select name="country" disabled>
		<option><?php echo $country ?></option>
	</select></td>

</tr>	
<tr>
	<td align="right"><b>CHANGE PROFILE IMAGE:</b></td>
	<td><input type="file" name="img" ></td>

</tr> 	
<center><tr>
	<td align="right"><input type="submit" name="submit" value="UPDATE YOUR PROFILE"></td>

</tr> </center>	  	
</table>
	</form>
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['uname'];
	$mail=$_POST['mail'];
	$pass=$_POST['pass'];
	$imge=$_FILES['img']['name'];
	$temp=$_FILES['img']['tmp_name'];
	if(strlen($pass)<8){
            echo"<script>alert('you are not register because password must be greater than 8 character')</script>";
            exit();
           }else{
	move_uploaded_file($temp,"images/$imge");
	$query="update register set user_name='$name',user_email='$mail',user_pass='$pass',user_img='$imge' where user_id='$id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo "<script>alert('your profile is updated')</script>";
		echo "<script>window.open('main.php','_self')</script>";
	}}

}
?>