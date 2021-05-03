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
	<style type="text/css">
		table{
		border-spacing:90px;
		border:2px solid black;
	}
	th{
		font-size:20px;
		color:red;
	}
	tr{
		font-size:18px;
		
	}

	</style>
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
<center><h1>INBOX MESSAGEs DETAILS</h1></center>
<table>
		<b style="font-size:25px;"><tr>
			<th>SEND BY</th>
			<th>MESSAGE TITLE</th>
			<th>MESSAGE CONTENT</th>
			<th>REPLY</th>
			<th>SEND DATE</th>
		</tr>
		
	<?php
	if(isset($_GET['msgid'])){
		$msgid=$_GET['msgid'];
		$read="read";
		$query="update message set status='$read' where sender='$msgid' ";
		$runquery=mysqli_query($con,$query);
	

	}
	$query="select*from message where sender='$msgid' order by 1 desc";
	$running=mysqli_query($con,$query);
	while($fet=mysqli_fetch_array($running)){
		$messid=$fet['msg_id'];
		$rec=$fet['reciver'];
		$messtite=$fet['msg_sub'];
		$messtopic=$fet['msg_topic'];
		$messdate=$fet['msg_date'];
		$user="select*from register where user_id='$rec'";
		$runuser=mysqli_query($con,$user);
		$other=mysqli_fetch_array($runuser);
		
			$names=$other['user_name'];
	?>
	
		<tr>
		<td><a href="userprofile.php?uid=<?php echo $rec ?>" style="font-size:20px;text-decoration:none;"><?php echo $names ?></a></td>	
<td><?php echo $messtite ?></td>
<td><?php echo $messtopic ?></td>
<td><a href="reply.php?mgid=<?php echo $messid?>" style="font-size:20px;text-decoration:none;" >REPLY</a></td>
<td><?php echo $messdate ?></td>


		
<?php } ?>
</tr></b>
	</table>
	
</div>	

</div>	
<div class="fotterside">
		<h2 style="color:#000;padding-top:30px;text-align:center;font-size:25px;">&copy; 2020- By www.welding Developers.com</h2>
	</div>
</div>
</body>
</html>
