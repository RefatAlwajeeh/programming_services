<?php
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
        #news{
            margin-bottom: 2%;

            padding: 7px;
            box-shadow: 7px 4px #88888836;

        }

        /*services styl*/
        .service_item{
            margin: 15px;
            border-bottom: 10px solid #d4dcdf;
            border-radius: 15px;
        }

        .service_category
        {
            display: inline-block;
            height: 29px;
            padding-left: 13px;
            padding-right: 13px;
            background: #61e49b !important;
        }

        .service_category a
        {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.35em;
            color: #FFFFFF;
            line-height: 29px;
            margin-right: -0.35em;
        }

        .service_world a{
            font-family: 'HelveticaNeueLTPro', sans-serif;
            font-size: 15px;
            font-weight: normal;
            color:#000000;

        }


        .service_info {
            margin-top: 25px;
            border-bottom: 2px solid #6796a8;
            padding-bottom: 14px;
        }

        service_author_image {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            overflow: hidden;
        }

        .service_author_name {
            margin-left: 14px;
            margin-top: 1px;
            margin-right: 10px;
        }

        .service_author_name a,
        .service_date a
        {
            font-family: 'Open Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            color: #838383;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }

        .service_date {
            margin-top: 1px;
            margin-right: 40px;
        }

        .service_comments a {
            position: relative;
            font-family: 'Open Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            color: 
                #a1a1a1;
            text-transform: uppercase;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }

        .service_text {
            margin-top: 29px;
        }

        .service_text p
        {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            line-height: 2.14;
            font-weight: 400;
            color: #878787;
            -webkit-font-smoothing: antialiased;
            -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }

        .service_image {
            width: 100%;
        }

        .service_image img {
            max-width: 100%;
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
                            <h2>صفحةالخدمات</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcrumb Area End ##### -->

       

        <!-- ##### Mag Posts Area Sttart ##### -->
        <section class="mag-posts-area d-flex flex-wrap justify-content-center">

            <!-- >>>>>>>>>>>>>>>>>>>>
             Post Left Sidebar Area
            <<<<<<<<<<<<<<<<<<<<< -->


            <!-- >>>>>>>>>>>>>>>>>>>>
                 Main Posts Area
            <<<<<<<<<<<<<<<<<<<<< -->
            <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow" style="direction: rtl !important;text-align: right;">


                <!-- Feature Video Posts Area -->
                <div class="feature-video-posts mb-30" >
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>صفحة الخدمات</h5>
                    </div>

                    <div class="featured-video-posts">
                        <div class="row">

                            <!--start of news-->

                            <?php
                            foreach ($controller->get_all_services() as $r) {

//                                $img_src = $r->image;
//
//
                                $Service_id = $r->service_id;
                                ?>

                                <!-- Services -->
                                <div class="service_item service_h_large" style="width: 100%;">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="service_image"><img src="images/project-4.jpg" alt="https://unsplash.com/@cdr6934"></div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="service_content">
                                                <div class="service_category service_world"><a href='service_details.php?service_id=<?php echo $Service_id ?>'><?php echo $r->service_title; ?></a></div>


                                                <div class="service_info d-flex flex-row align-items-center justify-content-start">
                                                    <div class="service_author d-flex flex-row align-items-center justify-content-start">
                                                       <!--   <div><div class="service_author_image"><img src="images/author_1.jpg" alt=""></div></div>
                                                      <div class="service_author_name"><a href="#"><?php // echo $r->asker; ?></a></div> -->
                                                    </div>
                                                
                                                    <div class="service_comments mr-auto"><a href="#"><?php echo $r->date; ?></a></div>
                                                </div>
                                                <div class="service_text">
                                                    <p><?php echo $r->description; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	
                                </div>


                                <!-- end of news-->

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>





        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <?php
        include('right_sidebar.php');
        ?>
    </section>
    <!-- ##### Mag Posts Area End ##### -->

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