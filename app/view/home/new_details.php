<?php
/*
  if(!($_SESSION['type']=="user" || $_SESSION['type']=="Admin")){
  header("Location:login.php");
  }
 */

set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("newsController.php");

$controller = new NewsController();
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
                            <h2>تفاصيل الخبر</h2>
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
                        if (isset($_GET['id'])) {
                            $g_id = $_GET['id'];

                            foreach ($controller->get_one_news([$g_id]) as $r) {
                                $img_src = $r->news_image;
                                ?>



                        <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                                    <div class="blog-thumb mb-30">
                                        <img src=<?php echo 'images/news/' . $img_src ?> alt="" style="width: 100%;max-height: 500px;">
                                    </div>
                                    <div class="blog-content">
                                        <div class="post-meta" id="post-meta">
                                            <a href="#"><?php echo htmlentities($r->news_date); ?></a>
                                           
                                        </div>
                                        <h4 class="post-title"><?php echo $r->title ?></h4>
                                        <!-- Post Meta -->
                                        <div class="post-meta-2">
                                            <form  method="post" action="../../controller/newsController.php">

                                                <input type="hidden" class="btn btn-primary" id=""  value=<?php echo $g_id ?> name="news_id">
                                                <button class="fa fa-star" type="submit"  name="news_fav"></button>


                                            </form>

                                        </div>
                                        <div id="content_p">
                                            <p> <?php echo $r->content ?> </p>
                                        </div>
                                        


                                        <!-- Post Author -->
                                        <div class="post-author d-flex align-items-center"  id="post-author" style="direction: rtl;">
                                          
                                            
                                            <div class="post-author-desc pl-4">
                                                <p style="position: absolute;">الناشر : </p>
                                                <?php 
                                                if ($r->c_user_id == 0){   ?>
                                                     <a href="#" class="author-name">Admain</a>
                                                
                                            <?php    } else {  ?>
                                                                     
                                                                
                                                <a href="profile.php?user_id=<?php echo $r->c_user_id; ?>" class="author-name"><?php echo $r->Fname . " " . $r->Lname; ?></a>
                                            <?php  }
                                                ?>   
                                            </div>
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

                            <ol id="olComments" >
                                <!-- Single Comment Area -->
                                <?php
                                foreach ($controller->get_comments([$g_id]) as $c) {
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

                        <!-- add comment Area -->
                           <?php  
                       if( isset($_SESSION['Is_login']) && $_SESSION['Is_login'] == "true"){   ?>
                        <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                            <!-- Section Title -->
                            <div class="section-heading" id="testComment">
                                <h5> إضافة تعليق</h5>
                            </div>

                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <!--<form  method="post" action="../../controller/newsController.php">-->
                                <div class="row">

                                    <div class="col-12">
                                        <textarea name="C_content" id="C_content" class="form-control" id="message" cols="99" rows="4" placeholder="كتــابة تعليق *" style="height: auto;" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" class="btn btn-primary" id="newsID"  value=<?php echo $g_id ?> name="news_id">
                                        <button class="btn mag-btn mt-30" type="button"  id="_comment" style="float: left"> نشــر </button>
                                    </div>
                                </div>
                                <!--</form>-->
                            </div>
                        </div>
                       <?php   }  ?>

                        <!--end add comment-->
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
            $(document).on('click', '#_comment', function () {
                var C_content = document.getElementById('C_content').value;
                var newsID = document.getElementById('newsID').value;

                $.ajax({

                    url: '../../controller/newsController.php', // url where to submit the request
                    type: "POST", // type of action POST || GET                      
                    data: {C_content: C_content, news_id: newsID, _comment: "true"}, // post data || get data
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