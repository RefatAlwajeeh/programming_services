<?php
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

    <style>
        #news{
            margin-bottom: 2%;

            padding: 7px;
            box-shadow: 7px 4px #88888836;

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

        <!-- ##### Hero Area Start ##### -->
        <div class="hero-area owl-carousel" style="direction: ltr !important;">
            <!-- Single Blog Post -->
            <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/10.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Contetnt -->
                           
                        </div>
                    </div>
                </div>
            </div>

        
        </div>
        <!-- ##### Hero Area End ##### -->

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
                        <h5>احدث الأخبار</h5>
                    </div>

                    <div class="featured-video-posts">
                        <div class="row">

                            <!--start of news-->

                            <?php
                            
                              include_once 'pagination/news_pagination.php';
                                
                                if($controller->total_rows()->fetchColumn() > 0){
                            foreach ($controller->get_all_news(['limit' =>$limit, 'offset' => $offset]) as $r) {

                                $img_src = $r->image;


                                $A_id = $r->news_id;
                                ?>

                                <div class="col-6" id="news">
                                    <!-- Single Featured Post -->
                                    <div class="single-featured-post col">
                                        <!-- Thumbnail -->
                                        <?php
                                        if ($img_src != 'default.jpg') {
                                            ?>

                                        <div class="post-thumbnail mb-50" style="">
                                            <img src=<?php echo 'images/news/' . $img_src ?> alt="" style="width: 100%;height: 300px;">
                                                <!--<a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>-->
                                            </div>
                                        <?php }
                                        ?>
                                        <!-- Post Contetnt -->
                                        <hr>
                                        <div class="post-content">
                                            <div class="post-meta" style="direction: ltr;float: left;">
                                                <p> <?php echo $r->date ."  :"?>تأريخ النشر</p>
                                            </div>
                                            <p> <a href='new_details.php?id=<?php echo $A_id ?>' class="post-title"><?php echo $r->title ?></a> </p>
                                        </div>
                                   
                                    </div>


                                </div>

                                <!-- end of news-->

                                <?php
                            }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link'  href='?page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
                
               
				<?php } ?>
                
               
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

</body>

</html>