<?php
class modelAdminNews{
    public static function getNewsList(){
        $query="SELECT news.*, category.name, users.username from news,
        category, users WHERE news.category_id=category.id AND
        news.user_id=users.id ORDER BY `news`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}//class
?>