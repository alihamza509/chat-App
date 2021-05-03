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
	<h2>POST RELATED TOPIC</h2>

	<?php
	if(isset($_GET['titleid'])){
		$ids=$_GET["titleid"];
	}

	 $postq="select*from posts where topic_id='$ids'";
	$runpost=mysqli_query($con,$postq);
	while($fetchpost=mysqli_fetch_array($runpost)){
	$usid=$fetchpost['user_id'];
     $potitle=$fetchpost['post_title'];
     $pocontent=$fetchpost['post_content'];
     $podate=$fetchpost['post_date'];
     $registerdnew="select*from register where user_id='$usid' and posts='yes'";
     $runregisterd=mysqli_query($con,$registerdnew);
     $reg=mysqli_fetch_array($runregisterd);
     	$poimg=$reg['user_img'];
     	$poname=$reg['user_name'];
     	echo"<div id='posts'>
<p><img src='images/$poimg' width='50' height='50'></p>
<h3><a href='userprofile.php?uid=$usid'>$poname</a></h3>
<h3>$potitle</h3>
<p>$podate</p>
<p>$pocontent</p>

</div>
"; }?>
	
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
