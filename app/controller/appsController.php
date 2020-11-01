<?php

session_start();
require_once ("db_connect.php");


set_include_path('.;C:\xampp\htdocs\programming_services\app\model');


require_once ("AppsModel.php");

/**
 *
 */
class AppsController {

    private $site_db;
    private $category;

    public function __construct() {
        $this->site_db = new SiteDB();
        $this->model = new model();
    }

    public function add_apps($args = array()) {
        echo "add fun";
        $this->site_db->insertToTabel(model::add_apps, $args);
    }

//    public function get_all_apps($args = array()) {
////        news
//
//        $allData = $this->site_db->getData(model::get_all_apps, $args);
//        print_r($args);
//        return $allData->fetchAll();
//    }

    public function get_all_apps($args = array()) {
//        news
       
        $allData = $this->site_db->getData(model::get_all_apps, $args);

        return $allData->fetchAll();
    }

    public function get_one_app($args = array()) {
//        news

        $allData = $this->site_db->getData(model::get_one_app, $args);
        return $allData->fetchAll();
    }

    public function insertComment($args = array()) {
        echo "add fun";
        $this->site_db->insertToTabel(model::insertComment, $args);
    }

    public function get_comments($args = array()) {


        $allData = $this->site_db->getData(model::get_comments, $args);
        return $allData->fetchAll();
    }

    public function total_rows($args = array()) {
//        news

        $allData = $this->site_db->getData(model::total_rows, $args);
        return $allData;
    }

    public function get_user_info($args = array()) {
//         user information

        $allData = $this->site_db->getData(model::get_user_info, $args);
        return $allData->fetchAll();
    }

    //   ### favorate functions ###

    public function add_apps_to_CFav($args = array()) {
//        insert fav apps
        echo "add fun";
        $this->site_db->insertToTabel(model::add_apps_to_CFav, $args);
    }

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

$controller = new AppsController();




/* add APP to DB */

if (isset($_POST['add_app'])) {

    function addImage() {



        $path = "../view/home/images/apps/" . time() . "." . end(explode(".", $_FILES['img']['name']));
        $name = time() . "." . end(explode(".", $_FILES['img']['name']));


        if (move_uploaded_file($_FILES['img']['tmp_name'], $path))
            return $name;
        return "";
    }

    $img = addImage();

    $app_size = $_FILES['user_apk']['size'];   // bytes divid on 1048  bytes/1048 = MB

    function addFile() {
        $app_size = $_FILES['user_apk']['size'];   // bytes divid on 1048  bytes/1048 = MB
        $info = explode('.', $_FILES['user_apk']['name']);    // file extension   
        $extensions = array("apk");            //   $extensions = array("pdf", "png", "apk");
// 10,485,760 bytes = 10 MB
        if (in_array(end($info), $extensions) and $app_size <= 10485760) {

//		 move_uploaded_file($_FILES['user_apk']['tmp_name'],"apk/".time().".".end($info));

            $path = "../view/home/apk/" . time() . "." . end(explode(".", $_FILES['user_apk']['name']));
            move_uploaded_file($_FILES['user_apk']['tmp_name'], $path);
            $name_to_DB = time() . "." . end(explode(".", $_FILES['user_apk']['name']));

//            echo $name_to_DB;
            return $name_to_DB;
        } else {
//            echo "This type is not allowed";
            return null;
        }
    }

    if (addFile() != null) {
        $app_file = addFile();
    }

    $data = [
        $_POST['name'],
        $app_size,
        date("Y-m-d H:i:s"),
        $_POST['price'],
        $_POST['version'],
        $_POST['description'],
        $img,
        $app_file,
        $_SESSION['U_id'],
        0                //status = 0;
    ];

    if (!empty($_POST['name']) && !empty($app_file)) {
        $controller->add_apps($data);
        $_SESSION["msg"] = "0";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {

        $_SESSION["msg"] = "1";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
//    $controller->add_apps($data);
//    echo "<br>done<br>" . $img;
} else {
    
}



/* Add Comments to Apps */
if (isset($_POST['App_comment']) && $_SESSION['Is_login'] == "true") {

    $data = [
        $_POST['C_content'],
        date("Y-m-d H:i:s"),
        $_POST['app_id'],
        'apps',
        $_SESSION['U_id'],
    ];

    $controller->insertComment($data);


    // Redirecting back  
//    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

/* Add apps to customer fav */
if (isset($_POST['apps_fav'])) {

    $data = [
        $_POST['apps_id'],
        'apps',
        date("Y-m-d H:i:s"),
        $_SESSION['U_id'],
    ];

    $controller->add_apps_to_CFav($data);


    // Redirecting back  
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
