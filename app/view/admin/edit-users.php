<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        
          //       ######

        function addImage() {

            $tmp1 = explode(".", $_FILES['image_prfile']['name']);
            $path = "../home/images/persons_images/" . time() . "." . end($tmp1);
            $tmp2 = explode(".", $_FILES['image_prfile']['name']);
            $name = time() . "." . end($tmp2);

//        echo 'name:  '.$name."<br>";
//        echo 'path:  '.$path."<br>";

            if (move_uploaded_file($_FILES['image_prfile']['tmp_name'], $path))
                return $name;
            return null;
        }

//    ######
        
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        
        if($row['person_type'] != 'customer'){
        $skills = $_POST['skills'];
        }elseif ($row['person_type'] == 'customer') {
            $skills = "";
        }
        
        $new_img = addImage();
        if($new_img != null){
            $img = $new_img;
            
        } else {
            $img = $_POST['last_image_prfile'];
        }
        
        if($_POST['password'] != "" || $_POST['password'] != null){
            $password = md5($_POST['password']);
            
        } else {
            $password = $_POST['last_password'];
        }
        
        

       

        $status = 1;
        $Uid = intval($_GET['pid']);
        $query = mysqli_query($con, "update person set Fname='$Fname',Lname='$Lname',image='$img',age='$age',email='$email',password='$password',skills='$skills' where ID='$Uid'");
        if ($query) {
            $msg = "Post updated ";
        } else {
            $error = "Something went wrong . Please try again.";
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
            <title>Newsportal | Add Post</title>

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
            <style>
             .p-6   {
                    width: 600px;
                    margin-left: 25%;
                    margin-top: 50px;
                    background: #36404e0d;
                    padding: 20px;
                    border-radius: 10px;
                }
            </style>
            
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
                                        <h4 class="page-title">Edit User </h4>
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"> Users </a>
                                            </li>
                                            <li class="active">
                                                Edit User
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

                                    <?php
                                    $Uid = intval($_GET['pid']);
                                    $query = mysqli_query($con, "select * from person where ID='$Uid' ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <form name="addpost" method="post" enctype="multipart/form-data" >
                                                    <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">First Name</label>
                                                        <input type="text" class="form-control" id="Fname" value="<?php echo htmlentities($row['Fname']); ?>" name="Fname" placeholder="Enter title" required>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Last Name</label>
                                                        <input type="text" class="form-control" id="Lname" value="<?php echo htmlentities($row['Lname']); ?>" name="Lname" placeholder="Enter title" required>
                                                    </div>
                                                    
                                                     <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control" id="password" value="<?php echo htmlentities($row['email']); ?>"  name="email" placeholder="Enter email" required>
                                                    </div>
                                                    
                                                     <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Password</label>
                                                         <input type="hidden" value="<?php echo $row['password']; ?>" name="last_password">
                                                        <input type="text" class="form-control" id="password"  name="password" placeholder="Enter Password">
                                                    </div>
                                                    
                                                    <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Age</label>
                                                        <input type="number" class="form-control" id="age" value="<?php echo htmlentities($row['age']); ?>" name="age" placeholder="Age" required>
                                                    </div>



<?php  if($row['person_type'] != 'customer'){  ?>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>Skills</b></h4>
                                                                
                                                                <textarea name="skills" class="form-control" cols="123"  rows="7" placeholder="Enter Your Skills like that : c# / 30%  , php / 60%" required><?php echo htmlentities($row['skills']); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
<?php } ?>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>User Image</b></h4>
                                                                <img src="../home/images/persons_images/<?php echo htmlentities($row['image']); ?>" width="300" style="margin-left: 23%;"/>
                                                                <br />
                                                                <input type="hidden" value="<?php echo $row['image']; ?>" name="last_image_prfile">
                                                                <input type="file" name="image_prfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
                                                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>


                                                            </div>
                                                        </div>
                                                    </div>

    <?php } ?>

                                                    
                                                <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update</button>
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