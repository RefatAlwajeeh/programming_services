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

        <link rel="stylesheet" type="text/css" href="css/component.css" />


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



        <!-- ##### Login Area Start ##### -->
        <div class="mag-login-area py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="login-content bg-white p-30 box-shadow">
                            <!-- Section Title -->


                            <div class="section-heading">
                                <h5>Upload App</h5>
                            </div>

                            <form  method="post" enctype="multipart/form-data" action="../../controller/appsController.php">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="APK Name">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="version" class="form-control" id="exampleInputEmail1" placeholder="APK version">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="APK price">
                                </div>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" cols="123"  rows="7" placeholder="APP Description"></textarea>
                                </div>

                                <div class="box">
                                    <input type="file" name="img" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
                                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                                </div>
                                
                                <input type='file' name='user_apk'><br>

                                <button type="submit" name="add_app" class="btn mag-btn mt-30">Upload</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Login Area End ##### -->

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

<?php 


//To display alert message 

if(isset($_SESSION["msg"]) && $_SESSION["msg"] == 1 ){
    
    function_alert("Error !! Can not upload a post");
            
    
}elseif (isset($_SESSION["msg"]) && $_SESSION["msg"] == 0) {
    
    function_alert("Success !! Upload a post");
    
}


function function_alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
            
            unset($_SESSION["msg"]);
        }
?>