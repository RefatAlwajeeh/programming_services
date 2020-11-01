
<?php

//        require_once ("db_connect.php");


class model {

    private $site_db;

  
    const add_user_person = "insert into person values(null,?,?,?,?,?,?,?,?,?,?,?)";
    const edit_profile = "update person set Fname=?,Lname=?,image=?,age=?,email=?,password=?,skills=? where ID=?";
    const Login_User = "select * from person where ((email=?)  and password=?)";
    const get_user_info = "select * from person where ID=?";
    




    //               ### fav const ###
    const get_fav_news = "select * from favorate left join news on news.news_id=favorate.typeID where userID=? and type='news'";
    const get_fav_apps = "select * from favorate left join apps on apps.ID=favorate.typeID where userID=? and type='apps'";

    //           ### End fav const ###

    public function __construct() {
//                $this->site_db = new SiteDB();
    }

}

?>