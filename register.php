<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<style>
    table{
        color:red;
        background-color:black;
        font-size:20px;
    }
    body{
        background-color:red;
    }
</style>
<body>
<div>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <table width="1200" height="600" align="center">
            <tr>
                <td align="center"><h2>REGISTER HERE</h2></td>
            </tr>
            <tr>
                <td align="center"><b>NAME: </b><input type="text" name="c_name" reqiured></td>
            </tr>
            <tr>
                <td align="center"><b>Email: </b><input type="email" name="c_mail" reqiured></td>
            </tr>
            <tr>
                <td align="center"><b>Password: </b><input type="password" name="c_pass" reqiured></td>
            </tr>
            <tr>
                <td align="center" reqiured><b>Select your Country: </b>
                    <select name="c_area">
                        <option>PAKISTAN</option>
                        <option>INDIA</option>
                        <option>UK</option>
                        <option>USA</option>
                        <option>AUTRALIA</option>
                        <option>kenya</option>
                        <option>America</option>
                        <option>china</option>
                        <option>canada</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center" reqiured><b>Select your GENDER: </b>
                    <select name="gender">
                        <option>MALE</option>
                        <option>Female</option>
                        <option>other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center"><b>Date of Birth: </b><input type="date" name="date" reqiured></td>
            </tr>
           
            <tr>
                <td align="center" ><input type="submit" name="register" Value="Register" reqiured></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['register'])){
    $name=mysqli_real_escape_string($con,$_POST['c_name']);
     $mail=mysqli_real_escape_string($con,$_POST['c_mail']);
      $pass=mysqli_real_escape_string($con,$_POST['c_pass']);
       $area=mysqli_real_escape_string($con,$_POST['c_area']);
        $gender=mysqli_real_escape_string($con,$_POST['gender']);
         $date=mysqli_real_escape_string($con,$_POST['date']);
          $status="unverified";
           $post="no";
           $ver_cod=mt_rand();
           if(strlen($pass)<8){
            echo"<script>alert('you are not register because password must be greater than 8 character')</script>";
            exit();
           }
           $query="select*from register where user_email='$mail'";
           $run_query=mysqli_query($con,$query);
           $num=mysqli_num_rows($run_query);
           if($num==1){
            echo"<script>alert('This email is already exists so try another one')</script>";
            exit();
           }
           $insert="insert into register(user_name,user_email,user_pass,user_country,user_gender,user_birth,user_img,user_registration,user_login,status,ver_code,posts)values('$name','$mail','$pass','$area','$gender','$date','50.png',NOW(),NOW(),'$status','$ver_cod','$post')";
           $insertquery=mysqli_query($con,$insert);
           if($insertquery){
            echo "<script>alert('Data send to your email check your email and login')</script>";
            exit();
           }else{
             echo "<script>alert('you are not register try again')</script>";
           }

}
?>