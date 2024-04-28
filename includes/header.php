<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Social </title>

    <link rel="stylesheet" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/emoji.css">
    <link rel="stylesheet" href="./assets/fontlib/css/font-awesome.css" />
    <link rel="stylesheet" href="./assets/css/lightbox.css">

</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="dashboard.php"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">UniSync </span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.html" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>
        </div>
        <!-- navigation top -->

        <!-- navigation left -->
        <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                        <ul class="mb-1">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="dashboard.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm fa fa-home me-3 text-grey-500"></i><span>Home</span></a></li>
                            <li><a href="myconnection.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm fa fa-users me-3 text-grey-500"></i><span>My Connection</span></a></li>
                            <li><a href="profile.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings me-3 text-grey-500"></i><span>Profile</span></a></li>
                            <li><a href="./script/logout.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-pie-chart me-3 text-grey-500"></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation left -->