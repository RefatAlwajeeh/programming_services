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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../../../public/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../../../public/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../../../public/css/style.css"/>
<link type="text/css" rel="stylesheet" href="../../../public/css/mystyle.css"/>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>







		<!-- section -->
<!--		<div class="section">-->
			<!-- container -->
			<div class="container" >

                <!-- Page Header -->
                <?php
                include('header.php');
                ?>

                <!-- /Page Header -->


                <!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">

						<div class="section-row sticky-container">
							<?php


if (isset($_GET['id'])) {
$g_id=$_GET['id'];



    foreach ( $controller->get_one_news([$g_id]) as $r){
						$img_src =$r->image;
        ?>


		<div class='main-post'>
		<h3><?php echo $r->title ?></h3>
		<figure class='figure-img'>
		
		<img class='img-responsive' src=<?php echo '../../../public/images/news/'.$img_src ?> alt='' style='height: 327px;'>
	  <figcaption><?php echo $r->title ?></figcaption>

        <div class="card-footer text-muted">
            Posted on <?php echo htmlentities($r->date);?>

        </div>
        <div class="card-footer text-muted">

            Posted By: <?php echo htmlentities($r->user_id);?>

        </div>

		</figure>
		<p id="post_content"><?php echo $r->content ?></p>
		</div>

                        <?php
					}
}

							 ?>



						</div>





						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>Comments</h2>
							</div>

							<div class="post-comments">

										<!-- comment -->
										<?php


                                        foreach ( $controller->get_comments([$g_id]) as $c){
                                            ?>

								<div class='media'>
										<div class='media-left'>
											<img class='media-object' src='./img/avatar.png' alt=''>
											</div>
										<div class='media-body'>
											<div class='media-heading'>
												<h4><?php echo $c->user_name ?></h4>
												<span class='time'><?php echo $c->date ?></span>

										 </div>
											<p><?php echo $c->content ?></p>
										</div>
									</div>
										  <!--/comment-->



<?php							}
								?>
								<!-- /comment -->



							</div>
						</div>
						<!-- /comments -->
						
						

<!-- add comment -->
						<form method="post" enctype="multipart/form-data" id="comment_form" action="../../controller/newsController.php">

							<div class="form-group" id="add_comment">
								<label>Add Comment:</label><br>
								<textarea name="C_content" cols="99"  rows="4"></textarea>
							</div>


							<input type="hidden" class="btn btn-primary" id="btn_comment"  value=<?php echo $g_id?> name="news_id">
							<input type="submit" class="btn btn-primary" id="btn_comment"  value="Comment" name="_comment">


						</form>

						<!-- /add comment -->


					<!-- /Post content -->



					<?php

				

					?>


				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<footer id="footer">

		</footer>
		<!-- /Footer -->

			</div>

		<!-- jQuery Plugins -->
		<script src="../../../public/js/jquery.min.js"></script>
		<script src="../../../public/js/bootstrap.min.js"></script>
		<script src="../../../public/js/main.js"></script>

	</body>
</html>
