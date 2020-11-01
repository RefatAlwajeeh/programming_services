<?php

session_start();
require_once ("db_connect.php");


set_include_path('.;C:\xampp\htdocs\programming_services\app\model');


require_once ("NewsModel.php");

/**
 *
 */
class NewsController {

    private $site_db;
    private $category;

    public function __construct() {
        $this->site_db = new SiteDB();
        $this->model = new model();
    }

    public function add_news($args = array()) {
        echo "add fun";
        $this->site_db->insertToTabel(model::add_news, $args);
    }

    public function get_all_news($args = array()) {
//        news

        $allData = $this->site_db->getData(model::get_all_news, $args);
        return $allData->fetchAll();
    }

    public function get_one_news($args = array()) {
//        news

        $allData = $this->site_db->getData(model::get_one_news, $args);
        return $allData->fetchAll();
    }
    
     public function total_rows($args = array()) {
//        news

        $allData = $this->site_db->getData(model::total_rows, $args);
        return $allData;
    }
    
    

    public function insertComment($args = array()) {

        $this->site_db->insertToTabel(model::insertComment, $args);
    }

    public function get_comments($args = array()) {
//        news

        $allData = $this->site_db->getData(model::get_comments, $args);
        return $allData->fetchAll();
    }

    public function get_user_info($args = array()) {
//         user information

        $allData = $this->site_db->getData(model::get_user_info, $args);
        return $allData->fetchAll();
    }

//   ### favorate functions ###

    public function add_news_to_CFav($args = array()) {
        echo "add fun";
        $this->site_db->insertToTabel(model::add_news_to_CFav, $args);
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
    
    
    
    public function GTC($args) {

//        return $allData->fetchAll();
        return $args;
    }
    public function ME(){
            return "MESSI";
        }
}

/* end calss */

$controller = new NewsController();




/* add News to DB */

if (isset($_POST['add_news'])) {

    function addFile() {



        $path = "../view/home/images/news/" . time() . "." . end(explode(".", $_FILES['img']['name']));
        $name = time() . "." . end(explode(".", $_FILES['img']['name']));


        move_uploaded_file($_FILES['img']['tmp_name'], $path);

        return $name;
    }

    $img = addFile();


    $data = [
        $_POST['title'],
        $_POST['content'],
        $img,
        date("Y-m-d H:i:s"),
        $_SESSION['U_id'],
        0                //status = 0;
    ];

    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $controller->add_news($data);
        $_SESSION["msg"] = "0";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {

        $_SESSION["msg"] = "1";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
} else {
    
}




/* Add Comments to News */
if (isset($_POST['_comment']) && $_SESSION['Is_login'] == "true") {

    $data = [
        $_POST['C_content'],
        date("Y-m-d H:i:s"),
        $_POST['news_id'],
        'news',
        $_SESSION['U_id'],
    ];

    $controller->insertComment($data);
    
   
//     echo json_encode($T);

}


/* Add News to customer fav */
if (isset($_POST['news_fav'])) {

    $data = [
        $_POST['news_id'],
        'news',
        date("Y-m-d H:i:s"),
        $_SESSION['U_id'],
    ];

    $controller->add_news_to_CFav($data);


    // Redirecting back  
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
