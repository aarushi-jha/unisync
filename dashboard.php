<?php 
include('./includes/header.php'); 
include("./includes/connection.php");
?>
<style>
    .right-comment,.lb-close{
        display:none !important;
    }
</style>
        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->
                    <div class="row feed-body">
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
            
                            <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                <form action="./script/img_text.php" id="imgform" class="database_operation_form">
                                    <div class="card-body p-0 mt-3 position-relative">
                                        <label>Select Image</label>
                                        <input type="file" name="image" class="upload_post form-control" class="form-control" accept="image/png, image/gif, image/jpeg"  />
                                    </div>
                                </form>
                                <div class="text-center">
                                OR
                                </div>
                                <form action="./script/post_text.php" class="database_operation_form">
                                    <div class="card-body p-0 mt-3 position-relative">
                                        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="./assets/images/user-8.png" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                        <textarea required="required" style=" font-size: 14px !important; border: 2px solid;color:black !important" name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
                                    </div>
                                    <div class="card-body d-flex p-0 mt-0">
                                        <button class="btn btn-info btn-block" >Post</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <?php 
                                $sql = "SELECT college_post.*,college_users.name as username FROM college_post INNER JOIN college_users on college_post.user_id = college_users.id order by college_post.id desc";
                                if ($res = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <div class="card-body p-0 d-flex mt-4">
                                    <figure class="avatar me-3"><img src="./assets/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row['username'] ?>  <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo date('d M,Y',strtotime($row['created_at'])) ?></span></h4>
                                </div>
                                <?php if($row['text_post']!='') { ?>
                                <div class="card-body p-0 me-lg-5">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100"><?php echo $row['text_post'] ?></p>
                                </div>
                                <?php } else { ?>
                                <div class="card-body d-block p-0">
                                    <div class="row ps-2 pe-2">
                                        <div class="col-xs-4 col-sm-4 p-1"><a href="./image/<?php echo $row['img_post']; ?>" data-lightbox="roadtrip"><img src="./image/<?php echo $row['img_post']; ?>" class="rounded-3 w-100" alt="image"></a></div>
                                    </div>
                                </div>
                                            <?php
                                        }
                                ?>
                                <div class="iconsection" style="cursor:pointer">
                                <?php 
                                        $post = "SELECT * FROM college_like where post_id='".$row['id']."'";
                                        $respost = mysqli_query($link, $post);

                                        $sql22 = "SELECT * FROM college_like where post_id='".$row['id']."' AND user_id = '".$_SESSION['id']."'";
                                        if ($res22 = mysqli_query($link, $sql22)) {
                                            if (mysqli_num_rows($res22) > 0) {
                                                    ?>
                                                    <i class="fa fa-thumbs-up LinkPOst" data-id="<?php echo $row['id'] ?>"  aria-hidden="true"></i> <?php echo mysqli_num_rows($respost); ?>
                                                    <?php
                                            } else {
                                                ?>
                                                    <i class="fa fa-thumbs-o-up LinkPOst" data-id="<?php echo $row['id'] ?>" aria-hidden="true"></i> <?php echo mysqli_num_rows($respost); ?>
                                                <?php 
                                            }
                                        }
                                    ?>
                                    
                                </div>
                                <?php 
                                        }
                                    }
                                }
                            ?>
                                



                            </div>



                        </div>               
                        <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Members</h4>
                                    <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary"></a>
                                </div>
                                <?php 
                                        $sql = "SELECT * FROM college_users where type='1' limit 5";
                                        if ($res = mysqli_query($link, $sql)) {
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $sql1 = "SELECT * FROM college_connection where user_id2='".$row['id']."' AND user_id1='".$_SESSION['id']."'";
                                                    if ($res1 = mysqli_query($link, $sql1)) {
                                                    if (mysqli_num_rows($res1) ==0 && $row['id']!=$_SESSION['id']) {
                                                        ?>
                                                        <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                                            <figure class="avatar me-3"><img src="./assets/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row['name'] ?> <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Student</span></h4>
                                                        </div>
                                                        <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                                            <a href="#" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl send_request"  data-id="<?php echo $row['id'] ?>">Connect</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                            </div>

                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-0 ">
                                <div class="card-body d-flex align-items-center p-4 mb-0">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Connection Request</h4>
                                    <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary"></a>
                                </div>
                                <?php 
                                        $sql2 = "SELECT college_connection.*,college_users.name FROM college_connection JOIN college_users on college_connection.user_id1=college_users.id  where college_connection.status='0' AND college_connection.user_id2='".$_SESSION['id']."'";
                                        if ($res2 = mysqli_query($link, $sql2)) {
                                            if (mysqli_num_rows($res2) > 0) {
                                                while ($row2 = mysqli_fetch_array($res2)) {
                                                        ?>
                                                        <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                                            <figure class="avatar me-3"><img src="./assets/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row2['name'] ?> <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Student</span></h4>
                                                        </div>
                                                        <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                                            <a href="#" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl approve_request"  data-id="<?php echo $row2['id'] ?>">Approve</a>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                            </div>
                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Notice Board</h4>
                            <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary"></a>
                                <?php
                                // Query the database to retrieve the notice board messages
                                $sql = "SELECT * FROM notice_board ORDER BY timestamp DESC";
                                $res = mysqli_query($link, $sql);

                                // Loop through the results and display each message
                                while ($row = mysqli_fetch_array($res)) {
                                echo '<li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">';
                                echo '<p class="fw-700 mb-0 mt-0 text-grey-600">' . htmlspecialchars($row['message']) . '</p>';
                                echo '</li>';
                                }
                                ?>
                            </ul>
                            
                            <!-- Add a form to allow the certain login user to add new messages -->
                            <form action="./script/notices.php" method="post" class="database_operation_form">
                                <div class="card-body p-0 mt-3 position-relative">
                                <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="./assets/images/user-8.png" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                <textarea required="required" style=" font-size: 14px !important; border: 2px solid;color:black !important" name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="Add a new message..."></textarea>
                                </div>
                                <div class="card-body d-flex p-0 mt-0">
                                <button class="btn btn-info btn-block" >Add Message</button>
                                </div>
                            </form>
                            
                            </div>


                        </div>

                    </div>
                </div>
                
            </div>            
        </div>
        <!-- main content -->

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="./assets/images/user-12.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">AR</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De fabous</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">AB</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">SD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>
<?php include('./includes/footer.php'); ?>
        <!-- right chat -->