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
	<form action="main.php?formid=<?php echo $id ?>" method="post" id="go">
    <h3>WhAT YOUR query let discuss please</h3>
    <input type="text" name="title" placeholder="write a title here....." size="82" required><br>
   <textarea cols="83" row="4" name="content" placeholder="write a description here..." required>	</textarea><br>
   <select name="topic">
   <option>SELECT TOPICS</option>
   <?php option(); ?>
</select>
<input type="submit" name="enter" value='POST'>
	</form>
	<?php enterpost(); ?>
	<h3>SEE THE LATEST POSTS</h3>
	<?php showpost(); ?>
	
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
