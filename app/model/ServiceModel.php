
<?php

//        require_once ("db_connect.php");


class model {

    private $site_db;

    const add_service = "insert into services values(null,?,?,?,?,?,?,?)";
    const get_all_services = "select * from services where Is_Active=1";
    const get_one_service = "select *,person.image as person_image from services left join person on person.ID=services.asker where service_id=?";
    const accepte_service = "insert into accepters_service values(null,?,?)";  
    const get_accepters_service = "select * from accepters_service left join person on person.ID=accepters_service.accepters_id where service_id=?";
    
    
    
    
    
    
    const get_user_info = "select * from person where ID=?";
    //               ### fav const ###
    const add_news_to_CFav = "insert into favorate values(null,?,?,?,?)";
    const get_fav_news = "select * from favorate left join news on news.news_id=favorate.typeID where userID=? and type='news'";
    const get_fav_apps = "select * from favorate left join apps on apps.ID=favorate.typeID where userID=? and type='apps'";

    //           ### End fav const ###
    
    public function __construct() {
//                $this->site_db = new SiteDB();
    }

}

?>