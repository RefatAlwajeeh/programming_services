<?php
/* customer sing_in function */
if (isset($_POST['add_user_cust'])) {

    set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
    require_once ("userController.php");

    $controller = new UserController();

//    $controller->add_user();



    function add_user_cust_img() {
        set_include_path('.;C:\xampp\htdocs\programming_services\app\view\home');

        $tmp1 = explode(".", $_FILES['img']['name']);
        $path = "images/persons_images/" . time() . "." . end($tmp1);
        $tmp2 = explode(".", $_FILES['img']['name']);
        $name = time() . "." . end($tmp2);

//        echo 'name:  '.$name."<br>";
        if (move_uploaded_file($_FILES['img']['tmp_name'], $path))
            return $name;
        return "";
    }

    $img_cust = add_user_cust_img();
//    if ($img == "") {
//        $img = "images/default.jpg";
//    }


    try {


        $status = 1;
        $password = md5($_POST['password_cust']);

        $data = [
            $_POST['Fname_cust'],
            $_POST['Lname_cust'],
            $img_cust,
            $_POST['age_cust'],
            $_POST['gender_cust'],
            $_POST['email_cust'],
            $password,
            date("Y-m-d H:i:s"),
            'customer',
            '',
            $status
        ];

        $controller->add_user_person($data);
        ?>

        <style>

            #popMSG{
                display: block;
                background: #ffffffd4;

            }
        </style>

        <?php
//        echo "success";
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>

<div class="section-heading">
    <h5>إنشاء حساب</h5>
</div>

<div id="type_accounts" style="direction: rtl;text-align: right;">

    <!--<button type="button" class="btn btn-success" id="Prog_account">-->
    <a href="login.php?singin_form_id=9" class="btn btn-success" style="font-family: Amine_mod;">حساب مبرمج</a>

    <!--Programmer Account-->
</button>

<!--                                        <button type="button" class="btn btn-success" id="Custo_account">
                                        Customer Account-->

<a href="login.php?singin_form_id=10" class="btn " style="color: #5cb85c; background-color: #f2f4f5;font-family: Amine_mod;">حساب عميل</a>
</button>

</div>

<!--customer_form-->

<div id="customer_form" style="direction: rtl;">

    <form id="singin_form_cust" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <input type="text" class="form-control" id="" name="Fname_cust" placeholder="الاسم الاول">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="" name="Lname_cust" placeholder="الاسم الثاني">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="" name="age_cust" placeholder="العمر">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="" name="email_cust" placeholder="البريد الإلكتروني">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_cust" placeholder="كلمة المرور">
        </div>

        <div class="form-group">
            <select class="form-control inputstl" id="gender" name="gender_cust">
                <option value="" disabled selected hidden>الجنس</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>


        <div class="box">
            <input type="file" name="img" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>إختر صورة&hellip;</span></label>
        </div>

        <button type="submit" name="add_user_cust" class="btn mag-btn mt-30">إنشاء</button>

    </form>

</div>


<!--model-->

<?php
include 'popMSG.php';
?>
