<?php

set_include_path('.;C:\xampp\htdocs\programming_services\app\controller');
require_once ("appsController.php");

$controller = new AppsController();




foreach ($controller->total_rows() as $t) {
        /* How many records you want to show in a single page. */
        $limit = 8;
        /* How may adjacent page links should be shown on each side of the current page link. */
        $adjacents = 2;

        $total_rows = $t->total_rows;

        /* Get the total number of pages. */
        $total_pages = ceil($total_rows / $limit);
    }

    if (isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page - 1);
    } else {
        $page = 1;
        $offset = 0;
    }

//                                #################################
    //Checking if the adjacent plus current page number is less than the total page number.
    //If small then page link start showing from page 1 to upto last page.
    if ($total_pages <= (1 + ($adjacents * 2))) {
        $start = 1;
        $end = $total_pages;
    } else {
        if (($page - $adjacents) > 1) {       //Checking if the current page minus adjacent is greateer than one.
            if (($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
                $start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
                $end = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
            } else {           //If current page plus adjacents is greater than total pages.
                $start = ($total_pages - (1 + ($adjacents * 2)));  //then the page range will start from total pages minus 1+($adjacents*2)
                $end = $total_pages;         //and the end will be the last page number that is total pages number.
            }
        } else {            //If the current page minus adjacent is less than one.
            $start = 1;                                //then start will be start from page number 1
            $end = (1 + ($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
        }
    }
    

?>