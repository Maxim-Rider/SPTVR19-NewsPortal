<?php
class controllerAdminNews{
    //listNews
    public static function NewsList(){
        $arr=modelAdminNews::getNewsList();
        include_once 'viewAdmin/newsList.php';
    }
}//class
?>