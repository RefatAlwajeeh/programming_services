<?php
/*
  if(!($_SESSION['type']=="user" || $_SESSION['type']=="Admin")){
  header("Location:login.php");
  }
 */

set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("serviceController.php");

$controller = new ServiceController();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Mag - Video &amp; Magazine HTML Template</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>

    <style>
        .single_comment_area{
            margin-bottom: 35px !important;
            border-bottom: 2px solid #a4bac5;
            border-right: 2px solid #a4bac5;
            border-radius: 1px 20px 20px 10px;
            
            /*width: 40%;*/
            /*float: left;*/
            /*margin-left: 35px;*/
        }

        .comment-meta{
            margin-bottom: 0px !important;
        }
       
    </style>

    <body>
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>

        <!-- ##### Header Area Start ##### -->

        <?php
        include('header.php');
        ?>

        <!-- ##### Header Area End ##### -->

        <!-- ##### Breadcrumb Area Start ##### -->
        <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/10.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2>تفاصيل الخدمة</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="mag-breadcrumb py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Post Details Area Start ##### -->
        <section class="post-details-area">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Post Details Content Area -->
                    <div class="col-12 col-xl-8">
                        <?php
                        if (isset($_GET['service_id'])) {
                            $service_id = $_GET['service_id'];

                            foreach ($controller->get_one_service([$service_id]) as $r) {
//						$img_src =$r->news_image;
                                ?>



                                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                                    <div class="blog-thumb mb-30">
                                        <!--<img src=<?php // echo 'images/news/'.$img_src     ?> alt="">-->
                                    </div>
                                    <div class="blog-content">
                                      
                                       
                                        
                                        <!-- Post Meta -->
                                        <div class="post-meta-2">
                                            <h4 class="post-title" style="float: right;color: #28a745;"><?php echo $r->service_title ?></h4>
                                             
                                            <form  method="post" action="../../controller/serviceController.php">

                                                <input type="hidden" class="btn btn-primary" id="" name="service_id" value=<?php echo $service_id ?> >
                                                <?php  if(isset($_SESSION['U_type']) && $_SESSION['U_type'] == 'programmer') {   ?>
                                                <button type="submit"   name="accept_service">قبول</button>
                                                
                                                <?php  } else {   ?>
                                                                         <br>           
                                                                                <?php }  ?>

                                                
                                            </form>

                                        </div>

                                        <div style="border-top: 2px solid #f2f4f5;border-bottom: 2px solid #f2f4f5;border-radius: 15px 15px 15px 15px;margin-bottom: 15px;padding: 15px;">
                                            <p> <?php echo $r->description ?> </p>
                                        </div>
                                        


                                     

                                          <!-- Post Author -->
                                        <div class="post-author d-flex align-items-center"  id="post-author" style="width: 70%;float: right;margin-top: -6px; direction: rtl;">

                                            <div class="post-author-desc pl-4">
                                                <p style="position: absolute;">الناشر : </p>
                                                <?php if ($r->asker == 0) { ?>
                                                    <a href="#" class="author-name">Admain</a>


                                                <?php } else { ?>


                                                    <a href="profile.php?user_id=<?php echo $r->asker; ?>" class="author-name"><?php echo $r->Fname . " " . $r->Lname; ?></a>

                                                <?php }
                                                ?> 
                                                  
                                            </div>


                                        </div>
										
										 <div id="app_date" style="width: 30%;background: #f2f4f5;margin-top: -6px;height: 37px;padding: 8px;float: left;">
                                            <p><?php echo htmlentities($r->date); ?></p>
                                        </div>
                                          
                                    </div>
                                </div>


                                <?php
                            }
                        }
                        ?>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                            <!-- Section Title -->
                            <div class="section-heading" style="text-align: right;">
                                <h5>الموافقين</h5>
                            </div>

                            <ol>

                                <!-- Single Comment Area -->
                                <?php
                                foreach ($controller->get_accepters_service([$service_id]) as $c) {
                                    ?>

                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src=<?php echo 'images/persons_images/' . $c->image ?> alt="author" style="width: 100%;height: 100%;">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <!--<a href="#" class="comment-date"><?php // echo $c->c_date     ?></a>-->
                                                <h6><a href="profile.php?user_id=<?php echo $c->accepters_id; ?>"><?php echo $c->Fname . " " . $c->Lname; ?></a></h6>
                                                <p><?php echo "Major :  " . $c->person_type ?></p>
                                              

                                            </div>
                                        </div>


                                    </li>

                                <?php }
                                ?>
                                <!--end single commint-->

                            </ol> 


                        </div>


                    </div>



                    <!-- Sidebar Widget -->
                    <?php
                    include('right_sidebar.php');
                    ?>
                </div>
            </div>
        </section>
        <!-- ##### Post Details Area End ##### -->

        <!-- ##### Footer Area Start ##### -->
        <?php
        include('footer.php');
        ?>
        <!-- ##### Footer Area End ##### -->

        <!-- ##### All Javascript Script ##### -->

        <!-- jQuery-2.2.4 js -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
    </body>

</html>