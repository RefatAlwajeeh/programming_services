<!DOCTYPE html>
<html lang="en" >


<head>

    <meta charset="UTF-8">
    <title>Login, Register form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../../public/css/login_style.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>



</head>

<body>
<!-- partial:index.partial.html -->
<div class="login-box">
    <div class="lb-header">
        <a href="#" class="active" id="login-box-link">Login</a>
        <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login">
        <a href="#">
            <i class="fa fa-facebook fa-lg"></i>
            Login in with facebook
        </a>
        <a href="#">
            <i class="fa fa-google-plus fa-lg"></i>
            log in with Google
        </a>
    </div>

    <!--log in form-->

    <form class="email-login" method="post" action="../../controller/userController.php" >
        <div class="u-form-group">
            <input type="email" name="u_email" placeholder="Email"/>
        </div>
        <div class="u-form-group">
            <input type="password" name="u_pass" placeholder="Password"/>
        </div>
        <div class="u-form-group">

            <button type="submit" name="s_btn" class="btn btn-primary">Log in</button>
        </div>

        <div class="u-form-group">
            <a href="#" class="forgot-password">Forgot password?</a>
        </div>
    </form>

    <!-- /log in form-->


    <!-- Sign up form-->

    <form class="email-signup" method="post" enctype="multipart/form-data" action="../../controller/userController.php">

        <div class="u-form-group">
            <input type="text" name="Fname" placeholder="First Name"/>
        </div>

        <div class="u-form-group">
            <input type="text" name="Lname" placeholder="Last Name"/>
        </div>

        <div class="u-form-group">
            <input type="number" name="age" placeholder="Age"/>
        </div>

        <div class="u-form-group">
            <input type="email" name="email" placeholder="Email"/>
        </div>
        <div class="u-form-group">
            <input type="password" name="password" placeholder="Password"/>
        </div>
        <div class="u-form-group">
            <input type="password" placeholder="Confirm Password"/>
        </div>

        <div class="u-form-group">
            <label for="gender" class="col-sm-2 col-sm-offset-2 control-label">Gender:</label>
            <div class="col-sm-12">
                <select class="form-control inputstl" id="gender" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

        </div>

        <div class="u-form-group">
            <label for="selphoto" class="col-sm-8 control-label">Select a Photo of Article :</label>
            <div class="col-sm-12">
                <input type="file" class="btn btn-lg btn-block btn-primary" id="img_prof" name="image_prfile" >
            </div>

        </div>



        <div class="u-form-group">

            <button type="submit" name="add" class="btn btn-lg btn-block btn-primary">Sign Up</button>
        </div>
    </form>

    <!-- /Sign up form-->

</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../../../public/css/login_script.js"></script>

</body>


</html>
