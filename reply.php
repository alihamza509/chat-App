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
		<li><a href="members.php">Total USERS</a></li>
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
<div class="mainarea">
	<div id="leftside">
		<?php
		leftside();
		?>
</div>
<div id="rigtside">
	<?php
	if(isset($_GET['mgid'])){
		$gg=$_GET['mgid'];
	}
	?>
	<center><h2>user information</h2></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><form method="post" action="" enctype="multipart/form-data">
    <input type="text" name="field" style="font-size:35px;" required>
    <input type="submit" name="enter" value="REPLY" style="font-size:25px;" >



	</form></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php
	if(isset($_POST['enter'])){
		$indert=$_POST['field'];
		$query="update message set reply='$indert' where msg_id='$gg' ";
		$runquery=mysqli_query($con,$query);
		if($runquery){
			echo "<script>alert('REPLY SEND')</script>";
  echo "<script>window.open('main.php','_self')</script>";
		}
	}
	?>
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
