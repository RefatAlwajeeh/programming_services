<?php
//                        $p = $_SERVER['PHP_SELF'];
//                      
//                        $las = explode('/' , $p );
//                      
//                       print_r($las);
//                       $curPath = "/".$las[1].'/'.$las[2].'/'.$las[3].'/'.$las[4].'/';
//                       echo "<br> last : ".$curPath ;
//                      
?>



<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/core/jquery.3.2.1.min.js"></script>



        <!--<link rel="stylesheet" href="style.css">-->
        <!------ Include the above in your HEAD tag ---------->

        <style>

            #fav{
                width: 420px;

            }

            #fav_container{
                width: 500px;
                position: fixed;
                right: -14px;
                top: 71px;
            }

            .close_fav{
                float: left;
                color: red;
                font-size: 29px;
            }

            #fav_news_content .col-xs-8{
                text-align: center;
            }

        </style>
    </head>
    <body>
        <header class="header-area">

            <!-- Navbar Area -->
            <div class="mag-main-menu" id="sticker">
                <div class="classy-nav-container breakpoint-off">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="magNav">

                        <!-- Nav brand -->

                        <a href="index.html" class="nav-brand" style="font-family: Amine_mod;">منصة وسيطة للخدمات البرمجية </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Nav Content -->
                        <div class="nav-content d-flex align-items-center">
                            <div class="classy-menu">

                                <!-- Close Button -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li class="active"><a href="index.php">الصفحة الرئيسية</a></li>
                                        <li><a href="#">الصفحات</a>
                                            <ul class="dropdown">
                                                <li><a href="index.php">الصفحة الرئيسية</a></li>
                                                <li><a href="show_news.php">صفحة الأخبار</a></li>
                                                <li><a href="show_apps.php">صفحة التطبيقات</a></li>
                                                <li><a href="show_services.php">صفحة الخدمات</a></li>
                                                <li><a href="about.php">حولنا</a></li>
                                                <li><a href="contact.html">تواصل معنا</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="about.php">حولنا</a></li>
                                        <li><a href="contact.html">تواصل معنا</a></li>

                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>

                            <div class="top-meta-data d-flex align-items-center">
                                <!-- Top Search Area -->
                                <div class="top-search-area">
                                    <form action="#" method="post">
                                        <input type="search" name="top-search" id="topSearch" placeholder="إبحث...">
                                        <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>

                                <?php if (isset($_SESSION['Is_login']) && $_SESSION['Is_login'] == "true") { ?>
                                    <a class="login-btn" href="log_out.php">تسجيل خروج</a>

                                <?php } else { ?>
                                    <!-- Login -->
                                    <a href="login.php?form_id=1" class="login-btn"><i class="fa fa-user" aria-hidden="true"><p>تسجيل دخول</p></i></a>

                                <?php } ?>

                                <!-- create Account -->

  <!--<a href="login.php?form_id=2" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">إنشاء حساب</span></a>-->

                                <!-- User Account -->

                                <?php
                                if (isset($_SESSION['U_id'])) {
                                    foreach ($controller->get_user_info([$_SESSION['U_id']]) as $r) {
                                        ?>

                                        <a href="profile.php?user_id=<?php echo $_SESSION['U_id']; ?>">
                                            <?php
                                            if ($r->image != "" || $r->image != null) {
                                                ?>
                                                <img src="<?php echo 'images/persons_images/' . $r->image ?>" alt="Image" style="border-radius: 50%;width: 60px;height: 60px; border: 2px solid #0185fd;"/>
                                            <?php } else { ?>
                                                <img src="images/persons_images/Defult.jpg" alt="Image" style="border-radius: 50%;width: 60px;height: 60px; border: 2px solid #0185fd;"/>

                                            <?php } ?>
                                        </a>


                                        <?php
                                    }
                                }
                                ?>
                               <!--<a href="programer_profile.php" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">My Profile</span></a>-->


                                <!--Favorite-->
                                <span></span> <span class="video-text">


                                    <button type="button" class="btn btn-success" id="show_fav_types" style="height:70px; margin-top: 0px;">
                                        قائمة المفضلة
                                    </button>  


                                </span>


                                <!--End Favorite-->


                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!--Fav Body-->

            <div id="fav_modal">
                <div class="container" id="fav_container">
                    <div class="row">
                        <div class="col-xs-8" style="width: 100%;">
                            <div class="panel panel-info">
                                <div class="panel-heading" style="height: 40px;padding: 5px;">
                                    <div class="panel-title">
                                        <div class="row">
                                            <div class="col-xs-2" style="float: left;width: 10%;>
                                                 <button type="button" class="close close_fav"  id="hide">
                                                 <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="col-xs-10" style="float: right;width: 80%;">
                                                <h4 style="text-align: right; font-weight: bold;">قائمة المفضلة</h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--fav types-->

                                <div id="fav_types">
                                    <div class="panel-body">

                                        <div class="row">

                                            <div class="col-xs-12">

                                                <?php ?>
                                                <form id="fav_types_form" method="post" style="text-align: center;">
                                                    <!--<input type="submit" class="btn btn-primary" id="show_news_fav" value="news_fav" name="fav_type_name">-->
                                                    <!--<input type="text" name="subject" id="subject" value="Car Loan"-->
                                                    <button type="button" class="btn btn-success" id="show_news_fav"  value="news" style="width: 350px;">
                                                        الأخبارالمفضلة
                                                    </button> 
                                                    <br><br>
                                                    <button type="button" class="btn btn-success" id="show_apps_fav"  value="apps" style="width: 350px;">
                                                        التطبيقات المفضلة
                                                    </button> 



                                                </form>
                                            </div>

                                        </div>
                                        <hr>




                                    </div>
                                </div>

                                <!--End fav types -->


                                <!--fav news content-->
                                <div id="fav_news_content" style="display: block;text-align: right;">
                                    <div class="panel-body">
                                        <?php
                                        if (isset($_SESSION['U_id'])) {
                                            foreach ($controller->get_fav_news([$_SESSION['U_id']]) as $r) {
                                                $img_src = $r->image;

                                                $A_id = $r->news_id;
                                                ?>
                                                <div class="row">

                                                    <div class="col-xs-4"><img class="img-responsive" src="<?php echo 'images/news/' . $img_src; ?>" style="width: 200px;height: 100px;">

                                                    </div>
                                                    <div class="col-xs-8" style="width: 50%;">

                                                        <h4 class="product-name"><strong><a href='new_details.php?id=<?php echo $A_id ?>'><?php echo $r->title ?></a></strong></h4>

                                                    </div>

                                                </div>
                                                <hr>

                                                <?php
                                            }
                                        }
                                        ?>


                                    </div>
                                </div>

                                <!--End fav apps content-->

                                <!--fav app content-->
                                <div id="fav_apps_content" style="display: block;text-align: right;">
                                    <div class="panel-body">
                                        <?php
                                        if (isset($_SESSION['U_id'])) {
                                            foreach ($controller->get_fav_apps([$_SESSION['U_id']]) as $r) {
                                                $img_src = $r->app_image;

                                                $A_id = $r->ID;
                                                ?>
                                                <div class="row">

                                                    <div class="col-xs-4"><img class="img-responsive" src="<?php echo 'images/apps/' . $img_src ?>" style="width: 200px; height: 100px;">
                                                    </div>
                                                    <div class="col-xs-8" style="width: 50%;">

                                                        <h4 class="product-name"><strong><a href='app_details.php?app_id=<?php echo $A_id ?>'><?php echo $r->app_name ?></a></strong></h4>

                                                    </div>

                                                </div>
                                                <hr>

        <?php
    }
}
?>


                                    </div>
                                </div>

                                <!--End fav apps content-->


                                <div class="panel-footer">
                                    <div class="row text-center">

                                        <div class="col-xs-3">
                                            <button id="hide1" type="button" class="btn btn-success btn-block">
                                                غلق
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--End Fav Body-->



        </header>




        <!-- jQuery-2.2.4 js -->
        <!--<script src="js/jquery/jquery-2.2.4.min.js"></script>-->
        <script src="my_script.js"></script>

        <script>




        </script>

    </body>
</html>