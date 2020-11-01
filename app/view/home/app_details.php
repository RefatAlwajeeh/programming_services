<?php
/*
  if(!($_SESSION['type']=="user" || $_SESSION['type']=="Admin")){
  header("Location:login.php");
  }
 */

set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("appsController.php");

$controller = new AppsController();
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

        <style>
            #download a{
                float: left;
                color: green;
                font-size: 40px;
            }

        </style>

    </head>

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
                            <h2>تفاصيل التطبيق</h2>
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
                        if (isset($_GET['app_id'])) {
                            $app_id = $_GET['app_id'];

                            foreach ($controller->get_one_app([$app_id]) as $r) {
                                $img_src = $r->app_image;
                                ?>



                                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                                    <div class="blog-thumb mb-30" style="text-align: center;">
                                        <img src=<?php echo 'images/apps/' . $img_src ?> alt="" style="width: 300px;height: 300px;border-radius: 50%;border: 10px solid #f2f4f5;">
                                    </div>
                                    <div class="blog-content">
                                        
                                        <h4 class="post-title" style="text-align: center;font-size: 30px;"><?php echo $r->app_name ?></h4>
                                        
                                        <!-- Post Meta -->
                                        <div class="" style="width: 30%;height: 50px;text-align: center;margin: 0 auto;margin-top: 27px;">


                                            <!-- Download apk -->
                                            <div class="post-content" id="download" style="float: left;">

                                                <a href="apk/<?php echo $r->app_file; ?>" download="<?php echo $r->app_name; ?>" style="margin-top: -11px;">
                                                    <i class="fa fa-download"></i>
                                                </a>

                                            </div>


                                            <!--end Download apk -->

                                            <div class="post-content" style="float: right;">
                                                <form  method="post" action="../../controller/appsController.php">


                                                    <input type="hidden" class="btn btn-primary"  value=<?php echo $app_id ?> name="apps_id">
                                                    <button class="fa fa-heart" type="submit" name="apps_fav" style="font-size: 30px;"></button>


                                                </form>
                                            </div>
                                        </div>

                                    

                                        




                                        <div id="content_p">
                                            <p> <?php echo $r->description ?> </p>
                                        </div>



                                        <!-- Post Author -->
                                        <div class="post-author d-flex align-items-center"  id="post-author" style="width: 70%;float: right;margin-top: -6px; direction: rtl;">

                                            <div class="post-author-desc pl-4">
                                                <p style="position: absolute;">الناشر : </p>
                                                <?php if ($r->c_user_id == 0) { ?>
                                                    <a href="#" class="author-name">Admain</a>


                                                <?php } else { ?>


                                                    <a href="profile.php?user_id=<?php echo $r->c_user_id; ?>" class="author-name"><?php echo $r->Fname . " " . $r->Lname; ?></a>

                                                <?php }
                                                ?> 
                                                  
                                            </div>


                                        </div>
										
										
                                        <div id="app_date" style="width: 30%;background: #f2f4f5;margin-top: -6px;height: 37px;padding: 8px;float: left;">
                                            <p><?php echo htmlentities($r->app_date); ?></p>
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
                            <div class="section-heading" id="comments_section">
                                <h5> التعليقات </h5>
                                <a href="" id="loadMoreComments">عرض الكل</a>
                                <a href="" id="hide_comments">إخفاء</a>
                            </div>

                            <ol id="olComments">
                                <!-- Single Comment Area -->
                                <?php
                                foreach ($controller->get_comments([$app_id]) as $c) {
                                    ?>

                                    <li class="single_comment_area" id="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <a href="profile.php?user_id=<?php echo $c->c_user_id; ?>"><img src=<?php echo 'images/persons_images/' . $c->image ?> alt="author" style="width: 100%;height: 100%;"></a>
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date"><?php echo $c->c_date ?></a>
                                                <h6><a href="profile.php?user_id=<?php echo $c->c_user_id; ?>"><?php echo $c->Fname . " " . $c->Lname; ?></a></h6>                           
                                                <p id="comment_content"><?php echo $c->content ?></p>

                                                <div class="d-flex align-items-center" style="direction: ltr;">
                                                    <a href="#" class="like">إعجاب</a>
                                                    <a href="#" class="reply">رد</a>
                                                </div>
                                            </div>
                                        </div>

                                        <ol class="children">
                                            <li class="single_comment_area">

                                            </li>
                                        </ol>
                                    </li>

                                <?php }
                                ?>
                                <!--end single commint-->

                            </ol>


                        </div>

                        <?php  
                       if( isset($_SESSION['Is_login']) && $_SESSION['Is_login'] == "true"){   ?>
                        <!-- add comment Area -->
                        <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5> إضافة تعليق</h5>
                            </div>

                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <!--<form  method="post" action="../../controller/appsController.php">-->
                                <div class="row">

                                    <div class="col-12">
                                        <textarea name="C_content" id="C_content" class="form-control" id="message" cols="99" rows="4" placeholder="كتــابة تعليق *" style="height: auto;" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" class="btn btn-primary" id="appID"  value=<?php echo $app_id ?> name="app_id">
                                        <button class="btn mag-btn mt-30" type="button" id="App_comment" style="float: left"> نشــر </button>
                                    </div>
                                </div>
                                <!--</form>-->
                            </div>
                        </div>

                        <!--end add comment-->
                        
                       <?php  }  ?>
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






        <script>

            //         TO Insert comment to DB by send parametars to newsController.php  
            $(document).on('click', '#App_comment', function () {
                var C_content = document.getElementById('C_content').value;
                var appID = document.getElementById('appID').value;

                $.ajax({

                    url: '../../controller/appsController.php', // url where to submit the request
                    type: "POST", // type of action POST || GET                      
                    data: {C_content: C_content, app_id: appID, App_comment: "true"}, // post data || get data
                    success: function () {
                        setInterval(
                                setTimeout(function () {
                                    location.reload();
                                }, 20),
                                50000);
                    },
                    error: function (xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }

                });


            });

        </script>

    </body>

</html>