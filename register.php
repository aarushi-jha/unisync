<?php 
session_start();
if(isset($_SESSION['id'])){
    header("Location:dashboard.php");
    die();
}
include("./includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Social</title>

    <link rel="stylesheet" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./assets/css/style.css"> 



</head>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <a href="index.html"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">UniSync </span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.html" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>

                <a href="#" style="opacity:0"  class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl"  data-bs-toggle="modal" data-bs-target="#Modallogin">Login</a>
                <a href="#" style="opacity:0"  class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl"  data-bs-toggle="modal" data-bs-target="#Modalregister">Register</a>

            </div>
            
            
        </div>
        
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(./assets/images/login-bg-2.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>                        
                        <form action="./script/register.php" class="database_operation_form">
                            <div class="form-group icon-input mb-3">
                                <input type="radio" checked  id="s"name="type" value="1" class="managetype" /> <label class="managetype" for="s">Student</label>
                                <input type="radio" name="type" value="2" id="o" class="managetype ml-4" style="margin-left:40px" /> <label class="managetype" for="o">Organization</label>       
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input required type="text" name="name" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Name">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input required type="email" name="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" pattern=".+@student\.sfit\.ac\.in" placeholder="Your Email Address">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input required name="password" type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-group icon-input mb-1" style="display:block" id="orgtypecontrol">
                                <select required name="org"  class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" style="padding-top:0px">
                                    <option value="ALL">Class</option>
                                    <?php 
                                        $sql = "SELECT * FROM college_users where type='2'";
                                        if ($res = mysqli_query($link, $sql)) {
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    
                                </select>
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                            </div>
                            <div class="col-sm-12 p-0 text-left mt-4">
                                <div class="form-group mb-1">
                                    <button class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit">Register</button>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="index.php" class="fw-700 ms-1">Login</a></h6>
                            </div>
                        </form>
                         
                       
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="./assets/js/plugin.js"></script>
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/custom.js"></script>
    
</body>
</html>