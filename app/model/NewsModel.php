
<?php

//        require_once ("db_connect.php");


class model {

    private $site_db;

    const add_news = "insert into news values(null,?,?,null,?,?,?,?)";
    const get_all_news = "select * from news where Is_Active=1 LIMIT :offset, :limit";
    const get_one_news = "select *,news.image as news_image , news.user_id as c_user_id , news.date as news_date from news left join person on person.ID=news.user_id where news_id=?";
    const insertComment = "insert into comment values(null,?,?,?,?,?)";
    const get_comments = "select *,comment.date as c_date , comment.user_id as c_user_id from comment left join person on person.ID=comment.user_id where main_cat='news' and news_or_app_id=?";
    const total_rows = "SELECT COUNT(*) as total_rows FROM news where Is_Active=1";
    
    
    
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