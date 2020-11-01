<?php
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
        <script src="js/jquery/jquery-2.2.4.min.js"></script>

    </head>

    <style>
        #apps{
            margin-bottom: 5%;
            /*height: 500px;*/
            padding: 7px;
            box-shadow: 9px -7px 5px 1px #88888836;
            

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
                        <h5>احدث التطبيقات</h5>
                    </div>

                    <div class="featured-video-posts">
                        <div class="row">

                            <!--start of news-->

                            <?php
                                include_once 'pagination/app_pagination.php';
                                
                                if($controller->total_rows()->fetchColumn() > 0){
//                                    echo $offset."<br>".$limit;
                                   
                            foreach ($controller->get_all_apps(['limit' =>$limit, 'offset' => $offset]) as $r) {
//                            while ($r = $controller->get_all_apps(['limit' =>$limit, 'offset' => $offset])){

                                $img_src = $r->app_image;


                                $App_id = $r->ID;
                                ?>

                                <div class="col-3" id="apps">
                                    <!-- Single Featured Post -->
                                    <div class="single-featured-post col">
                                        <!-- Thumbnail -->
                                        <?php
                                        if ($img_src != 'default.jpg') {
                                            ?>

                                        <div class="post-thumbnail mb-50" style="margin-bottom:1px !important;">
                                                <img src=<?php echo 'images/apps/' . $img_src ?> alt="" width="150" style="height:140px;border-radius: 50%;margin-right: 20%;border: 2px solid #f2f4f5;">
                                                <!--<a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>-->
                                            </div>
                                        <?php }
                                        ?>
                                        <!-- Post Contetnt -->
                                        <div class="post-content">
                                          

                                            <p style="text-align: center;"> <a href='app_details.php?app_id=<?php echo $App_id ?>' class="post-title"><?php echo $r->app_name ?></a> </p>
                                            </div>
                                            
                                        <p style="float: left;"><?php echo 'Version : ' . $r->version ?></p>
                                            <p style="float: right;"><?php echo 'Price :  ' . '$' . $r->price ?></p>

                                       



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