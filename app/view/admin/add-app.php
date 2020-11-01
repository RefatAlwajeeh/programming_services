<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

// For adding post  
    if (isset($_POST['submit'])) {

        
//       ######
    
     function addImage() {



        $path = "../home/images/apps/" . time() . "." . end(explode(".", $_FILES['postimage']['name']));
        $name = time() . "." . end(explode(".", $_FILES['postimage']['name']));


        if (move_uploaded_file($_FILES['postimage']['tmp_name'], $path))
            return $name;
        return null;
    }
    
//    ######
        
    
//        ######
        $app_size = $_FILES['user_apk']['size'];   // bytes divid on 1048  bytes/1048 = MB
        
           function addFile() {
         $app_size = $_FILES['user_apk']['size'];   // bytes divid on 1048  bytes/1048 = MB
        $info = explode('.', $_FILES['user_apk']['name']);    // file extension   
        $extensions = array("apk");            //   $extensions = array("pdf", "png", "apk");
// 10,485,760 bytes = 10 MB
        if (in_array(end($info), $extensions) and $app_size <= 10485760) {

//		 move_uploaded_file($_FILES['user_apk']['tmp_name'],"apk/".time().".".end($info));

            $path = "../home/apk/" . time() . "." . end(explode(".", $_FILES['user_apk']['name']));
            move_uploaded_file($_FILES['user_apk']['tmp_name'], $path);
            $name_to_DB = time() . "." . end(explode(".", $_FILES['user_apk']['name']));

//            echo $name_to_DB;
            return $name_to_DB;
        } else {
//            echo "This type is not allowed";
            return null;
        }
        
    }
    
//        ######
    


        $posttitle = $_POST['posttitle'];
        $postdetails = $_POST['postdescription'];
        $price = $_POST['price'];
        $version = $_POST['version'];



// Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (addFile()== null) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {

        
            $img = addImage();
            $app_file = addFile();
            
           

// Code for move image into directory
//            move_uploaded_file($_FILES['postimage']['tmp_name'], $path);

    
              
            $status = 1;
            $date = date("Y-m-d H:i:s");
           
//insert into news values(null,?,?,null,?,?,?)
            $query = mysqli_query($con, "insert into apps(app_name,date,price,description,version,app_image,app_file,size,user_id,Is_Active) values('$posttitle','$date','$price','$postdetails','$version','$img','$app_file','$app_size','0','$status')");
            if ($query) {
                $msg = "Post successfully added ";
            } else {
                $error = "Something went wrong . Please try again.";
                
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">

            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">
            <!-- App title -->
            <title>Newsportal | Add App</title>

            <!-- Summernote css -->
            <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

            <!-- Select2 -->
            <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

            <!-- Jquery filer css -->
            <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
            <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

            <!-- App css -->
            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
            <script src="assets/js/modernizr.min.js"></script>
            
            <link href="assets/css/component.css" rel="stylesheet" type="text/css" />
            <script>
                function getSubCat(val) {
                    $.ajax({
                        type: "POST",
                        url: "get_subcategory.php",
                        data: 'catid=' + val,
                        success: function (data) {
                            $("#subcategory").html(data);
                        }
                    });
                }
            </script>
        </head>


        <body class="fixed-left">

            <!-- Begin page -->
            <div id="wrapper">

                <!-- Top Bar Start -->
    <?php include('includes/topheader.php'); ?>
                <!-- ========== Left Sidebar Start ========== -->
    <?php include('includes/leftsidebar.php'); ?>
                <!-- Left Sidebar End -->



                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container">


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Add Post</h4>
                                       
                                         <!--<h4 class="page-title">Add Post  <?php // echo '<br>'.$_FILES['user_apk']['tmp_name'].'<br>'.$_FILES['user_apk']['size'].'<br>'.$posttitle.'<br>'.$date.'<br>'.$price.'<br>'.$postdetails.'<br>'.$version.'<br>'.$img.'<br>'.$app_file.'<br>'.$app_size.'<br>'.$status.'<br>'.$_FILES['user_apk']['tmp_name']; ?></h4>-->
                                       
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>
                                            <li>
                                                <a href="#">Apps</a>
                                            </li>
                                            <li class="active">
                                                Add App
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-6">  
                                    <!---Success Message--->  
    <?php if ($msg) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                        </div>
    <?php } ?>

                                    <!---Error Message--->
    <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
    <?php } ?>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form name="addpost" method="post" enctype="multipart/form-data">
                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">App Name</label>
                                                    <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>App Details</b></h4>
                                                            <textarea class="summernote" name="postdescription" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>App price</b></h4>
                                                            <!--<input type="file" class="form-control" id="postimage" name="postimage"  required>-->
                                                              <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="APK price" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>App Version</b></h4>
                                                            <!--<input type="file" class="form-control" id="postimage" name="postimage"  required>-->
                                                             <input type="number" name="version" class="form-control" id="exampleInputEmail1" placeholder="APK version" required>
                                                                 </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>App Image</b></h4>
                                                            <input type="file" class="form-control" id="postimage" name="postimage"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>App File</b></h4>
                                                            <!--<input type="file" class="form-control" id="postimage" name="postimage"  required>-->
                                                             <input type='file' name='user_apk' required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                


                                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                            </form>
                                        </div>
                                    </div> <!-- end p-20 -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->



                        </div> <!-- container -->

                    </div> <!-- content -->

    <?php include('includes/footer.php'); ?>

                </div>


                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->


            </div>
            <!-- END wrapper -->



            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="../plugins/switchery/switchery.min.js"></script>

            <!--Summernote js-->
            <script src="../plugins/summernote/summernote.min.js"></script>
            <!-- Select 2 -->
            <script src="../plugins/select2/js/select2.min.js"></script>
            <!-- Jquery filer js -->
            <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

            <!-- page specific js -->
            <script src="assets/pages/jquery.blog-add.init.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

            <script>

                jQuery(document).ready(function () {

                    $('.summernote').summernote({
                        height: 240, // set editor height
                        minHeight: null, // set minimum height of editor
                        maxHeight: null, // set maximum height of editor
                        focus: false                 // set focus to editable area after initializing summernote
                    });
                    // Select2
                    $(".select2").select2();

                    $(".select2-limiting").select2({
                        maximumSelectionLength: 2
                    });
                });
            </script>
            <script src="../plugins/switchery/switchery.min.js"></script>

            <!--Summernote js-->
            <script src="../plugins/summernote/summernote.min.js"></script>




        </body>
    </html>
<?php } ?>