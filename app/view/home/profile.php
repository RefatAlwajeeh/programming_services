
<?php
set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("userController.php");

$controller = new UserController();

if (isset($_SESSION['U_id'])) {

    if (isset($_POST['edit'])) {

//       ######

function addImage() {

$tmp1 = explode(".", $_FILES['image_prfile']['name']);
$path = "images/persons_images/" . time() . "." . end($tmp1);
$tmp2 = explode(".", $_FILES['image_prfile']['name']);
$name = time() . "." . end($tmp2);

//        echo 'name:  '.$name."<br>";
//        echo 'path:  '.$path."<br>";

if (move_uploaded_file($_FILES['image_prfile']['tmp_name'], $path))
return $name;
return null;
}

//    ######



if ($_SESSION['U_type'] != 'customer') {
$skills = $_POST['skills'];
} elseif ($_SESSION['U_type'] == 'customer') {
$skills = "";
}

$new_img = addImage();
if ($new_img != null) {
$img = $new_img;
} else {
$img = $_POST['last_image_prfile'];
}

if ($_POST['password'] != "" || $_POST['password'] != null) {
$password = md5($_POST['password']);
} else {
$password = $_POST['last_password'];
}





$status = 1;
$Uid = $_SESSION['U_id'];

$data = [
$Fname = $_POST['Fname'],
 $Lname = $_POST['Lname'],
 $img,
 $age = $_POST['age'],
 $email = $_POST['email'],
 $password,
 $skills,
    $Uid
];

$controller->edit_profile($data);

}
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
          <title>Programming Services</title>

            <!-- Favicon -->
            <link rel="icon" href="img/core-img/favicon.ico">

            <!-- Stylesheet -->
     

<!--            <link rel="stylesheet" type="text/css" href="css/component.css" />-->


<link href="style.css" rel="stylesheet">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <!--<link href="css/aos.css" rel="stylesheet">-->
            <link href="css/main.css" rel="stylesheet">
            


        </head>

        <style>

            .modal-title{

                text-decoration-line: underline!important;
                color: #1f3288;;
                text-shadow: 3px 1px 5px #55dda1;
                border-radius: 20%;

            }

            .modal-content{
                /*background-color: #f8cfde  !important;*/
            }

            #myModal{
                width: 30%;
                margin: 0 auto;
                /*height: 500px;*/
                top: 80px;
                direction: rtl;
                text-align: right;

            }
            #myModa2{
                 direction: rtl;
                text-align: right;
            }

            .catagory-widgets{
                direction: rtl;
                text-align: right;
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





    <?php
    foreach ($controller->get_user_info([$_GET['user_id']]) as $r) {
        
    }
    ?>

            <div class="page-content" style=" margin-bottom: 10px;">
                <div>
                    <div class="profile-page">
                        <div class="wrapper">
                            <div class="page-header page-header-small" filter-color="green" style="margin-top: 0px;">
                                <div class="page-header-image" data-parallax="true" style="background-image: url('images/cc-bg-1.jpg');"></div>
                                <div class="container">
                                    <div class="content-center">
                                        <div class="cc-profile-image"><a href="#">
    <?php
    if ($r->image != "" || $r->image != null) {
        ?>
                                                    <img src="<?php echo 'images/persons_images/' . $r->image ?>" alt="Image"/></a>
                                                <?php } else { ?>
                                                <img src="images/persons_images/Defult.jpg" alt="Image"/></a>
                                            <?php } ?>
                                        </div>
                                        <div class="h2 title"><?php echo $r->Fname . " " . $r->Lname; ?></div>
                                        <p class="category text-white" style="margin-top: 12px;"><?php echo $r->person_type ?></p>
                                        <a class="btn btn-primary smooth-scroll mr-2" href="#about" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">حول</a>
    <?php
    if ($r->person_type == 'programmer') {
        ?>
                                            <a class="btn btn-primary smooth-scroll mr-2" href="#skill" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">المهارات</a>

    <?php }
    ?>

                                        <?php
                                        if ($r->person_type == 'programmer' && $_SESSION['U_id'] == $_GET['user_id']) {
                                            ?>

                                            <a class="btn btn-primary smooth-scroll mr-2" href="add_news.php" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">نشر خبر</a>
                                            <a class="btn btn-primary smooth-scroll mr-2" href="upload_app.php" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">رفع تطبيق</a>


        <?php
    }

    if ($r->person_type == 'customer' && $_SESSION['U_id'] == $_GET['user_id']) {
        ?>
                                            <a class="btn btn-primary smooth-scroll mr-2" id="add_service" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">طلب خدمة</a>


    <?php } if (($r->person_type == 'customer' || $r->person_type == 'programmer' ) && $_SESSION['U_id'] == $_GET['user_id']) { ?>

                                            <a class="btn btn-primary smooth-scroll mr-2" id="edit_profile" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" style="background-color: #28a745; border-color: #67db81;">Edit</a>

    <?php } ?>
                                    </div>
                                </div>
                                <div class="section">
                                    <div class="container">
                                        <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section" id="about">
                        <div class="container" style="max-width: 550px !important;">
                            <div class="h4 text-center mb-4 title">حول</div>
                            <div class="card" data-aos="fade-up" data-aos-offset="10">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12">

                                        <div class="cc-profile-image col-sm-4" style="float: left;margin-left: -37px;margin-top: -15px;height: 265px;">
    <?php
    if ($r->image != "" || $r->image != null) {
        ?>
                                                <img src="<?php echo 'images/persons_images/' . $r->image ?>" alt="Image" style="width: 100%;height: 281px;border-radius: 14%;"/>
                                            <?php } else { ?>
                                                <img src="images/persons_images/Defult.jpg" alt="Image" style="width: 100%;height: 281px;border-radius: 14%;"/>
                                            <?php } ?>
                                        </div>


                                        <div class="card-body">

                                            <div class="h4 mt-0 title" style="text-align: center;">Basic Information</div>


                                            <div class="row">
                                                <div class="col-sm-4"><strong class="text-uppercase">Age :</strong></div>
                                                <div class="col-sm-8"><?php echo $r->age ?></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-4"><strong class="text-uppercase">Email :</strong></div>
                                                <div class="col-sm-8"><?php echo $r->email ?></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-4"><strong class="text-uppercase">Phone :</strong></div>
                                                <div class="col-sm-8">+1718-111-0011</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-4"><strong class="text-uppercase">Major :</strong></div>
                                                <div class="col-sm-8"><?php echo $r->person_type ?></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <?php
    if ($r->person_type == 'programmer' && ($r->skills != "" || $r->skills != null)) {
//    echo  "skills : ".$r->skills;
        ?>
                        <div class="section" id="skill">
                            <div class="container">
                                <div class="h4 text-center mb-4 title">المهارات</div>
                                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                    <div class="card-body">
                                        <div class="row">
        <?php
        foreach ($controller->get_user_info([$_GET['user_id']]) as $r) {


            $skills_array = explode(',', $r->skills);

            foreach ($skills_array as $d) {

                $estimate_array = explode('/', $d);

                $ex_d = explode('/', trim($d));
                $skill_name = $ex_d[0];

//                                              echo "array count :".count($ex_d)."<br>";
//                                            $estimate =20;

                if (count($ex_d) == 1) {
                    $progras = "";
                } else {
                    $estimate = $ex_d[1];
                    $progras = $estimate;
                }

//                                            echo "d :".$d."<br>";
//                                            echo "skill_name :".$skill_name."<br>";
//                                             echo "estimate :".$estimate."<br>";
//                                            echo $d . "<br>";
//                                        
                ?>

                                                    <div class="col-md-6">
                                                        <div class="progress-container progress-primary"><span class="progress-badge"><?php echo $skill_name; ?></span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width:' . $progras; ?>"></div>
                                                                <span class="progress-value"><?php echo $progras; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                <?php
            }
        }
        ?>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

    <?php } ?>




                </div>
            </div>


            <!-- Add services model-->

            <div class="modal" id="myModal" style="margin-bottom: 20px;">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                         <div class="modal-header">
                            <div style="width: 70%;float: right;">
                            <h4 class="modal-title">إضافة خدمة</h4>
                            </div>
                            <div style="width: 25%;float: left;">
                            <button type="button" class="close" data-dismiss="modal" id="hide_modal" style="position: unset;float: left;margin-left: -23px;">&times;</button>
                            </div>
                            </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form  method="post" enctype="multipart/form-data" action="../../controller/serviceController.php">
                                <div class="form-group">
								
                                    <input type="text" name="service_title" class="form-control" id="exampleInputEmail1" placeholder="اسم الخدمة">
                                </div>

                                <div class="form-group">
                                    <input type="number" name="service_price" class="form-control" id="exampleInputEmail1" placeholder="السعر">
                                </div>

                                <div class="form-group">
                                    <textarea name="service_description" class="form-control" cols="123"  rows="7" placeholder="التفاصيل ..." style="border: 2px solid #ced4da82;"></textarea>
                                </div>

                                <div class="form-group"  >
                                    <textarea name="requirement" class="form-control" cols="123"  rows="7" placeholder="المتطلبات ..." style="border: 2px solid #ced4da82;"></textarea>
                                </div>



                                <button type="submit" name="add_service" class="btn mag-btn mt-30" style="float:left;">إضافة</button>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Add service model-->



            <!-- Edit profile model-->

            <div class="modal" id="myModa2" style="margin-bottom: 20px;background: #cccccc94;height: 1500px;">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <div style="width: 70%;float: right;">
                            <h4 class="modal-title">Edit Profile</h4>
                            </div>
                            <div style="width: 25%;float: left;">
                            <button type="button" class="close" data-dismiss="modal" id="hide_modal2" style="position: unset;float: left;margin-left: -23px;">&times;</button>
                            </div>
                            </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form  method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>First Name :</label>
                                    <input type="text" name="Fname" value="<?php echo $r->Fname; ?>" class="form-control" id="exampleInputEmail1" placeholder="first name">
                                </div>

                                <div class="form-group">
                                    <label>Last Name :</label>
                                    <input type="text" name="Lname" value="<?php echo $r->Lname; ?>" class="form-control" id="exampleInputEmail1" placeholder="last name">
                                </div>

                                <div class="form-group">
                                    <label>Email :</label>
                                    <input type="email" name="email" value="<?php echo $r->email; ?>" class="form-control" id="exampleInputEmail1" placeholder="email">
                                </div>

                                <div class="form-group">
                                    <label>Age :</label>
                                    <input type="number" name="age" value="<?php echo $r->age; ?>" class="form-control" id="exampleInputEmail1" placeholder="age">
                                </div>

                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="hidden" value="<?php echo $r->password; ?>" name="last_password">
                                    <input type="text" class="form-control" id="password"  name="password" placeholder="Enter Password">   
                                </div>

<?php  if($r->person_type != 'customer'){  ?>
                                                     <div class="form-group">
                                                        
                                                               <label>Skills :</label>
                                                                
                                                               <textarea name="skills" class="form-control"  placeholder="Enter Your Skills like that : c# / 30%  , php / 60%" style="border: 2px solid #ced4da;border-radius: 5px;" required><?php echo htmlentities($r->skills); ?></textarea>
                                                          
                                                    </div>
<?php } ?>
<label>change photo :</label>
                                <div class="form-group">
                                    

                                    <input type="hidden" value="<?php echo $r->image; ?>" name="last_image_prfile">
                                    <input type="file" name="image_prfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
                                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>

                                </div>


                                <button type="submit" name="edit" class="btn mag-btn mt-30" style="float:left;">Edit</button>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                        </div>

                    </div>
                </div>
            </div>
            <!--  Edit profile model-->







            <!-- ##### Footer Area Start ##### -->

    <?php
    include('footer.php');
    ?>
            <!-- ##### Footer Area End ##### -->

            <!-- ##### All Javascript Script ##### -->
            <script src="js/core/jquery.3.2.1.min.js"></script>
            <script src="js/core/popper.min.js"></script>
            <script src="js/core/bootstrap.min.js"></script>
            <script src="js/now-ui-kit.js?v=1.1.0"></script>
            <script src="js/aos.js"></script>
            <script src="scripts/main.js"></script>

            <!-- Active js -->
            <script src="js/active.js"></script>

            <!-- jQuery-2.2.4 js -->
            <script src="js/jquery/jquery-2.2.4.min.js"></script>

            <script>

                $(document).ready(function () {
    //                $("#myModal").hide();



                    $("#add_service").click(function () {
                        $("#myModal").show();
                    });

                    $("#edit_profile").click(function () {
                        $("#myModa2").show();
                    });


                });

                $("#hide_modal").click(function () {
                    $("#myModal").hide();

                });

                $("#hide_modal2").click(function () {
                    $("#myModa2").hide();

                });
            </script>

        </body>


    </html>
    <?php
} else {
    header("location:login.php?form_id=1");
}
?>