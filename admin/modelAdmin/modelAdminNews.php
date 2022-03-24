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

    //---------------Add
    public static function getNewsAdd(){
        $test=false;
        if(isset($_POST['save'])){
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])){

                $title=$_POST['title'];
                $text=$_POST['text'];
                $idCategory=$_POST['idCategory'];

                //--------images type blob
                $image=addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                //--------------------
                $sql="INSERT INTO `news` (`id`, `title`, `text`, `picture`, `category_id`,
                `user_id`) VALUES (NULL, '$title', '$text', '$image', '$idCategory', '1')";
                        $db = new Database();
                        $item = $db->executeRun($sql);
                    if($item==true){
                        $test=true;
                    }
            }
        }
        return $test;
    }
}//class
?>