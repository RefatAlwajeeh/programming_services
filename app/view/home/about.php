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
        #about_us_p p{

            font-size: 20px;
            font-family: Amine_mod;
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
                            <h2>من نحن</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcrumb Area End ##### -->


        <!-- ##### About Us Area Start ##### -->
        <section class="about-us-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <!-- About Us Content -->
                        <br>
                        <div class="about-us-content bg-white mb-30 p-30 box-shadow" style="direction: rtl;text-align: right;">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>من نحن</h5>
                            </div>
                            <div id="about_us_p" >
                                <p>
                                    منصة وسيطة للخدمات البرمجية اللتي تقوم بجمع المبرمجين من مختلف الجهات مع الشركات او الافراد اللذين يرغبون بالحصول على خدمات برمجية لانجاز اعمالهم بكفائة عالية. كما ان المنصة توفر متجر الكتروني لعرض البرامج الجاهز على مستخدمين الموقع و الإتجار بها. ونقوم ايظاً بنشر اخبار عن كل جديد في مجال التقنية و تكنولوجيا المعلومات لابقاء المستخدمين على لاطلاع بكل مايخص التقنية وتكنولوجيا المعلومات.
                                    للتواصل معنا.


                                </p>

                                <ul>
                                    <li><i class="fa fa-check"></i>Refatalwajeeh2017@gmail.com</li>
                                    <li><i class="fa fa-check"></i> رقم الهاتف :  777964955 </li>
                                   </ul>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ##### About Us Area End ##### -->


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