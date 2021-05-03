<?php
session_start();
if(!isset($_SESSION['admin_mail'])){
    header('location:adminlogin.php');
}
?>
<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CHAT  Admin AREA</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">ADMIN PANNEL OF CHAT BOX</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a href="index.php?add">ADD TITLE</a>
                            
                            <a href="logout.php" style="text-decoration:none; font-color:white">LOGOUT</a>
                         
                            
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                        $q="select*from posts";
    $qq=mysqli_query($con,$q);
    $count=mysqli_num_rows($qq);
                        ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">TOTAL POSTS <b>(<?php echo$count?>)</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?user">View posts Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $n="select*from register";
  $qn=mysqli_query($con,$n);
$cunt=mysqli_num_rows($qn);

  ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">TOTAL USERS <b>(<?php echo$cunt ?>)</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?posts">View user Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $t="select*from title";
  $tt=mysqli_query($con,$t);
  $du=mysqli_num_rows($tt);

                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">TITELS <b>(<?php echo$du ?>)</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?tite">view ALL TITELS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $c="select*from cmnts";
    $cc=mysqli_query($con,$c);
    $ccc=mysqli_num_rows($cc);
    ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">CMNTS <b>(<?php echo$ccc ?>)</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?cmnt">VIEW CMNTS DETAIL</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
                                <?php
    if(isset($_GET['user'])){
        include("user.php");
    }
    if(isset($_GET['p_delete'])){
    $id=$_GET['p_delete'];
    $query="delete from posts where post_id='$id'";
    $run=mysqli_query($con,$query);
    if($run){
        echo "<script>alert('post is deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }
}
if(isset($_GET['posts'])){
        include("posts.php");
    }
    if(isset($_GET['m_delete'])){
    $id=$_GET['m_delete'];
    $query="delete from register where user_id='$id'";
    $run=mysqli_query($con,$query);
    if($run){
        echo "<script>alert('user is deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }
}
if(isset($_GET['tite'])){
        include("titels.php");
    }
    if(isset($_GET['t_delete'])){
    $id=$_GET['t_delete'];
    $query="delete from title where title_id='$id'";
    $run=mysqli_query($con,$query);
    if($run){
        echo "<script>alert('TITLE is deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
if(isset($_GET['cmnt'])){
        include("cmnt.php");
    }
    if(isset($_GET['c_delete'])){
    $id=$_GET['c_delete'];
    $query="delete from cmnts where cmnt_id='$id'";
    $run=mysqli_query($con,$query);
    if($run){
        echo "<script>alert('cmnt is deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
if(isset($_GET['add'])){
        include("add.php");
    }

    ?>
                            </div>
                            
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
