<br><br><br><br><br><br><center><form method="post" action="" enctype="multipart/form-data">
    <input type="text" name="field" style="font-size:25px;">
    <input type="submit" name="enter" value="Add title" style="font-size:25px;" >



	</form></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php
	if(isset($_POST['enter'])){
		$indert=$_POST['field'];
		$query="insert into title(title_name)values('$indert')";
		$runquery=mysqli_query($con,$query);
		if($runquery){
			echo "<script>alert('TITLE inserted')</script>";
  echo "<script>window.open('index.php','_self')</script>";
		}
	}
	?>