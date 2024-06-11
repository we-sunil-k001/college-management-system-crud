<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['admin']) ||(trim ($_SESSION['admin']) == '')){
    header('location:login.php');
}

$admin_id = $_SESSION['admin'];

include_once('includes/function.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM `admin` WHERE `id` = '$admin_id'";
$row = $user->details($sql);

//echo $row['name'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - College Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        #sidebar-logout{
            position: fixed;
            bottom: 10px;
        }
    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!--<img src="assets/img/logo.png" alt="">-->
            <span class="d-none d-lg-block">Webreinvent</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--    <div class="search-bar">-->
    <!--      <form class="search-form d-flex align-items-center" method="POST" action="#">-->
    <!--        <input type="text" name="query" placeholder="Search" title="Enter search keyword">-->
    <!--        <button type="submit" title="Search"><i class="bi bi-search"></i></button>-->
    <!--      </form>-->
    <!--    </div>-->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->



            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?=$row['name'];?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="includes/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>LogOut</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php?dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!--      <li class="nav-item">-->
        <!--        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">-->
        <!--          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>-->
        <!--        </a>-->
        <!--        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
        <!--          <li>-->
        <!--            <a href="components-alerts.html">-->
        <!--              <i class="bi bi-circle"></i><span>Alerts</span>-->
        <!--            </a>-->
        <!--          </li>-->
        <!--          <li>-->
        <!--            <a href="components-accordion.html">-->
        <!--              <i class="bi bi-circle"></i><span>Accordion</span>-->
        <!--            </a>-->
        <!--          </li>-->
        <!--          <li>-->
        <!--            <a href="components-badges.html">-->
        <!--              <i class="bi bi-circle"></i><span>Badges</span>-->
        <!--            </a>-->
        <!--          </li>-->
        <!---->
        <!--        </ul>-->
        <!--      </li>-->
        <!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?colleges">
                <i class="bi bi-building"></i>
                <span>Manage Colleges</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?lecturers">
                <i class="bi bi-person-fill"></i>
                <span>Manage Lecturers</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>

    <ul class="sidebar-nav " id="sidebar-logout">
        <li class="nav-item">
            <a class="nav-link collapsed" href="includes/logout.php">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->



<?php

if(isset($_GET['dashboard']))
{
    include('includes/dashboard.php');
}


////////////////////////////////////////////////////////////////////////////////////////////
/* College */

if(isset($_GET['colleges']))
{
    include('includes/manage-colleges.php');
}



////////////////////////////////////////////////////////////////////////////////////////////
/* lecturer */

elseif(isset($_GET['lecturers']))
{
    include('includes/manage-lecturers.php');
}


else
{
    include('includes/dashboard.php');
}

?>


<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Developed by <a href="#">Sunil Kumar</a>
    </div>
</footer><!-- End Footer -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>