<?php

session_start();
require_once ("db_connect.php");


set_include_path('.;C:\xampp\htdocs\programming_services\app\model');


require_once ("ServiceModel.php");

/**
 *
 */
class ServiceController {

    private $site_db;
    private $category;

    public function __construct() {
        $this->site_db = new SiteDB();
        $this->model = new model();
    }

    public function add_Service($args = array()) {
       
        $this->site_db->insertToTabel(model::add_service, $args);
    }
    
    
    public function get_all_services($args = array()) {
//        all services

        $allData = $this->site_db->getData(model::get_all_services, $args);
        return $allData->fetchAll();
    }
    
     public function get_one_service($args = array()) {
//        one service

        $allData = $this->site_db->getData(model::get_one_service, $args);
        return $allData->fetchAll();
    }
    
    
      public function accepte_service($args = array()) {
       
        $this->site_db->insertToTabel(model::accepte_service, $args);
    }
    
    
    public function get_accepters_service($args = array()) {
//         user information how accept service

        $allData = $this->site_db->getData(model::get_accepters_service, $args);
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
    
    
   
}

/* end calss */



$controller = new ServiceController();







/* add Services to DB */

if (isset($_POST['add_service'])) {
    
     $data = [
        $_POST['service_title'],
         $_POST['service_description'],
         $_POST['service_price'],   
         date("Y-m-d H:i:s"),
         $_SESSION['U_id'],
         $_POST['requirement'],
         0               // state
         
       
        
        
    ];

    $controller->add_service($data);
     // Redirecting back  
    header("Location: " . $_SERVER["HTTP_REFERER"]);
     
    
} else {
    
}


/* Accept Service */
if (isset($_POST['accept_service'])) {

    $data = [
        $_SESSION['U_id'],
         $_POST['service_id']
    ];

    $controller->accepte_service($data);
    echo  "<br> User Id : ".$_SESSION['U_id']."<br>" ;
     echo "<br> service id : ".$_POST['service_id']."<br>" ;


    // Redirecting back  
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}




?>
