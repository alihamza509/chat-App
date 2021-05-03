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
	$ucm=$_SESSION['user_email'];
$cmnt="select*from register where user_email='$ucm'";
$runcmnt=mysqli_query($con,$cmnt);
$fectcmnt=mysqli_fetch_array($runcmnt);
$cmntimg=$fectcmnt['user_img'];
$cmntid=$fectcmnt['user_id'];
?>
	<?php
	if(isset($_GET['uosid'])){
		$uosid=$_GET['uosid'];
	
	$message="select*from register where user_id='$uosid'";
	$run=mysqli_query($con,$message);
	$fech=mysqli_fetch_array($run);
	$names=$fech['user_name'];
	$img=$fech['user_img'];
	$register=$fech['user_login'];
}
	?>
	<h1>SEND A MESSAGE TO <b style="color:red;"><?php echo $names ?></b></h1>
	<form action="send.php?uosid=<?php echo $uosid; ?>" method="post">
	<input type="text"	name="title" placeholder="Enter your message title" style="font-size:25px;" size="70" required>
	<textarea cols="53" row="4" name="content" placeholder="write a message ..." style="font-size:25px;"  required>	</textarea><br>
	<input type="submit" name="enter" value="SEND" style="font-size:25px;">
</form><br>
<img src="images/<?php echo$img ?>"width="70" height="70">
<h3><?php echo$names?> is the member since <?php echo$register?></h3>


	
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['enter'])){


	$mtitle=$_POST['title'];
	$mcontent=$_POST['content'];
	$status="unread";
	$reply="noreply";
	$minsert="insert into message(sender,reciver,msg_sub,msg_topic,reply,status,msg_date)values('$uosid','$cmntid','$mtitle','$mcontent','no_reply','unread',NOW())";
	$runin=mysqli_query($con,$minsert);
	if($runin){
		echo "<h1>HOGYA</h1>";
		
	}else{
		echo "<h1>yaki hai bhai</h1>";
	}

}

?>