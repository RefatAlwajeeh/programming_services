<?php

session_start();
require_once ("db_connect.php");


set_include_path('.;C:\xampp\htdocs\programming_services\app\model');


require_once ("UserModel.php");

/**
 *
 */
class UserController {

    private $site_db;
    private $category;

    public function __construct() {
        $this->site_db = new SiteDB();
        $this->model = new model();
    }

   

    public function add_user_person($args = array()) {
//        echo "<br>HHHHH:add fun<br>";
        $this->site_db->insertToTabel(model::add_user_person, $args);
//        header("Location:../view/home/log_in.php");
    }
    
    public function edit_profile($args = array()) {
//        echo "<br>HHHHH:add fun<br>";
        $this->site_db->insertToTabel(model::edit_profile, $args);
//        header("Location:../view/home/log_in.php");
    }

    public function login_user($args = array()) {
//        Users

        $allData = $this->site_db->getData(model::Login_User, $args);
        return $allData->fetchAll();
    }
    
   
     public function get_user_info($args = array()) {
//         user information

        $allData = $this->site_db->getData(model::get_user_info, $args);
        return $allData->fetchAll();
    }
    
    
    //   ### favorate functions ###
    
     public function get_fav_news($args = array()) {
//         fav news

        $allData = $this->site_db->getData(model::get_fav_news, $args);
        return $allData->fetchAll();
    }
    
    public function get_fav_apps($args = array()) {
//        fav apps

        $allData = $this->site_db->getData(model::get_fav_apps, $args);
        return $allData->fetchAll();
    }
    
    // ### End favorate functions ###

}

/* end calss */



$controller = new UserController();






/* Log_in function */

if (isset($_POST['login_btn'])) {

    $u_pass = md5($_POST['u_pass']);
    $data1 = [
        $_POST['u_email'],
        $u_pass
    ];
    
    $login_done;
     $arr =$controller->login_user($data1);
     if(sizeof($arr) != 0){
        
    foreach ($controller->login_user($data1) as $row) {

        $_SESSION['U_id'] = $row->ID;
        $_SESSION['U_type'] = $row->person_type;

    }

    $_SESSION['Is_login'] = "true";
   }
    
    $login_done = array("login_msg" =>count($arr));
    echo json_encode($login_done);
   } else {
    
}




if (isset($_POST['create_account'])) {

    header("Location:../view/home/login.php?form_id=2");
}





?>
