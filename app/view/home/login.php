
<?php
set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("userController.php");

$controller = new UserController();
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

    <style>
        #type_accounts{
            margin-top: -24px;
            margin-bottom: 11px;
           
        }

         .type_accounts{
            margin-top: -24px;
            margin-bottom: 11px;
            text-align: center;
        }
       .type_accounts a {
         
            width: 48%;
            height: 140px;
            vertical-align: middle;
            line-height: 120px;
        }
        
        #Error_MSG{
                display: none;
                background: red;
            }
            #Error_MSG p{
                color: #fff;
                font-size: 20px;
                margin-left: 30px;
                margin-right: 30px;
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
        <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 style="font-family: Amine_mod;">تسجيل دخول</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Login Area Start ##### -->
        <div class="mag-login-area py-5">
            <div class="container" style="font-family: Amine_mod;">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="login-content bg-white p-30 box-shadow">
                            <!-- Section Title -->
                            <?php
                            if (isset($_GET['form_id'])) {

                                if ($_GET['form_id'] == 1) {
                                    ?>
                                    <div id="login_form">
                          
                                        <div id="Error_MSG">
                                            <p>
                                                تأكــد من صحة البيانات المدخلة !!</p>
                                        </div>
                                        
                                        <div class="section-heading" style="direction: rtl;text-align: right;">
                                            <h5>أهلاً بعودتك !</h5>
                                        </div>

                                        <!--<form  method="post" action="../../controller/userController.php">-->
                                            <div class="form-group">
                                                <input type="email" id="u_email" class="form-control" id="exampleInputEmail1" placeholder="Email or User Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="u_pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                                </div>
                                            </div>
                                        <button type="button" id="log_btn" class="btn mag-btn mt-30">تسجيل</button>
                                            
                                        <!--</form>-->
                                        <div>
                                        <a href="login.php?form_id=2"  id="create_account"  style="color: #1c9f9f;text-decoration-line: revert;float: right;font-size: 20px;">إنشاء حساب</a>
										</div>
                                    </div>


                                    <?php
                                }
                            }

                            if (isset($_GET['form_id']) || isset($_GET['singin_form_id'])) {

                                if (isset($_GET['form_id']) == 2 && $_GET['form_id'] !=1 ) {
                                    ?>
                                    <div class="section-heading" style="direction: rtl;text-align: right;">
                                        <h5>إنشاء حساب</h5>
                                    </div>

                            <div id="type_accounts" class="type_accounts" style="direction: rtl;text-align: right;">

                                        <!--<button type="button" class="btn btn-success" id="Prog_account">-->
                                        <a href="login.php?singin_form_id=9" class="btn btn-success" style="font-size: 25px;font-family: Amine_mod;">حساب مبرمج</a>

                                        <!--Programmer Account-->
                                        </button>

                                        <!--                                        <button type="button" class="btn btn-success" id="Custo_account">
                                                                                Customer Account-->

                                        <a href="login.php?singin_form_id=10" class="btn btn-success" style="font-size: 25px;font-family: Amine_mod;">حساب عميل</a>
                                        </button>

                                    </div>

                                    <!--programmer_form-->

                                    <?php
                                } else {
                                    
                                }
                                if (isset($_GET['singin_form_id'])) {

                                    if ($_GET['singin_form_id'] == 9) {
                                        include 'programmer_singin.php';
                                    }
                                }


//                                     customer_form


                                if (isset($_GET['singin_form_id'])) {

                                    if ($_GET['singin_form_id'] == 10) {
                                        include 'customer_singin.php';
                                    }
                                }
                            }
                            ?>
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
        
      
         <script>

            //         TO Insert comment to DB by send parametars to newsController.php  
            $(document).on('click', '#log_btn', function (e) {
                e.preventDefault();
                var U_Email = document.getElementById('u_email').value;
                var U_Pass = document.getElementById('u_pass').value;
//                var U_Pass = document.getElementById('Error_MSG').value;
                $.ajax({
                    cache: false,
                    url: '../../controller/userController.php', // url where to submit the request
                    type: "POST", // type of action POST || GET                      
                    data: {u_email: U_Email, u_pass: U_Pass, login_btn: "true"}, // post data || get data
                    success: function (msg) {
                        
                        var x = JSON.parse(msg);
                                console.log(x.login_msg);
                                if(x.login_msg == 0){
                                    $('#Error_MSG').css("display","block");
                                }else if (x.login_msg == 1){
                                    $('#Error_MSG').css("display","none");
                                    $(location).attr('href' , 'index.php');
                                    
                                }
                                
                               
                                
//alert("RRRRRRRR");
                    },
                    error: function () {
                       
                    }

                });


            });

        </script>



</html>