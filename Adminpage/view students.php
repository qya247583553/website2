<?php
session_start();
$hostName = "localhost";
$userName = "root";
$password = "";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");

$sql="select * from `allocate system`.studentaccountinformation";
$result=mysqli_query($conn,$sql) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Fonik - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Basic Css files -->
    <link href="http://cdn.bootstrapmb.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="">
                <!--<a href="index.html" class="logo text-center">Fonik</a>-->
                <a href="index.html" class="logo"><img src="assets/images/logo.png" height="20" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>

                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="view%20all%20projects.php" class="waves-effect"><i class="dripicons-copy"></i><span> view all projects </span></a>
                    </li>
                    <li>
                        <a href="ADD%20Students.html" class="waves-effect"><i class="dripicons-user"></i><span> ADD Student</span></a>
                    </li>
                    <li>
                        <a href="ADD%20SUPERVISORS.html" class="waves-effect"><i class="dripicons-user"></i><span> ADD Supervisor</span></a>
                    </li>
                    <li>
                        <a href="ADD%20SUPERVISOR%20PROJECTS.html" class="waves-effect"><i class="dripicons-document-new"></i><span> ADD projects for sup</span></a>
                    </li>
                    <li>
                        <a href="sup.php" class="waves-effect"><i class="dripicons-user"></i><span> View supervisors </span></a>
                    </li>
                    <li>
                        <a href="allocatetest.php" class="waves-effect"><i class="dripicons-to-do"></i><span> Allocate System </span></a>
                    </li>
                    <li>
                        <a href="view%20students.php" class="waves-effect"><i class="dripicons-user"></i><span> view all students </span></a>
                    </li>
                    <li>
                        <a href="../Loginpage/web/index.html" class="waves-effect"><i class="dripicons-exit"></i><span> Exit Sytem</span></a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->


    <!-- Start right Content here -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">
                    <!-- Search input -->
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input" type="search" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>



                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">View  ALL projects Tables</h3>
                        </li>

                    </ul>

                    <div class="clearfix"></div>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ==================
                 PAGE CONTENT START
                 ================== -->

            <div class="page-content-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Your Projects Datatable</h4>
                                    <p class="text-muted m-b-30 font-14">
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>StudentID</th>
                                            <th>StudentEmail</th>
                                            <th>StudentPassword</th>
                                            <th>Fist_Name</th>
                                            <th>Last_Name</th>
                                            <th>Action1</th>
                                            <th>Action2</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr class="tbContext">
                                                <td><?php echo $row["StudentID"]?></td>
                                                <td><?php echo $row["StudentEmail"]?></td>
                                                <td><?php echo $row["StudentPassword"]?></td>
                                                <td><?php echo $row["Fist_Name"]?></td>
                                                <td><?php echo $row["Last_Name"]?></td>
                                                <form action="Modify%20students.php" method="post">
                                                    <td><button  class="btn btn-info" value="<?php echo $row["StudentID"]?>" name="Update" >Update</button></td>
                                                </form>
                                                <form action="deletesupervisorProjects.php" method="post">
                                                    <td><button  name="delete" value="<?php echo $row["StudentID"]?>" class="btn btn-info">Delete</button></td>
                                                </form>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->
            </div> <!-- Page content Wrapper -->
        </div> <!-- content -->



        <footer class="footer">
            © 2018 Fonik - Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://www.php.cn/xiazai/code/">Themesbrand</a>.
        </footer>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="http://cdn.bootstrapmb.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
