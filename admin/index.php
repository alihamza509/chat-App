<?php
session_start();
if(!isset($_SESSION['admin_mail'])){
    header('location:dist/adminlogin.php');
}?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="refresh" content="0;url=dist/index.html">
    <title>SB Admin</title>
    <script language="javascript">
        window.location.href = "dist/index.php"
    </script>
</head>

<body>
    Go to <a href="dist/index.php">/dist/index.php</a>
</body>

</html>
