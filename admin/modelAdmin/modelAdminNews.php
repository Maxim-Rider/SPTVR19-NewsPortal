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

    //----------------news detail id
    public static function getNewsDetail($id){
        $query="SELECT news.*, category.name, users.username from news,
        category, users WHERE news.category_id=category.id AND
        news.user_id=users.id and news.user_id=users.id and news.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    //----------------news edit
    public static function getNewsEdit($id){
        $test=false;
        if(isset($_POST['save'])){
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])){
                $title=$_POST['title'];
                $text=$_POST['text'];
                $idCategory=$_POST['idCategory'];
            //--------images type blob
            $image=$_FILES['picture']['name'];
            if($image!=""){
                $image=addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                //-----------images type text
              /*  $uploaddir='../images/';
                $uploadfile=$uploaddir . basename($_FILES['picture']['name']);
                copy($_FILES['picture']['tmp_name'], $uploadfile); */
            }
            if($image==""){
                $sql="UPDATE `news` SET `title` = '$title', `text` = '$text',
                `category_id` = '$idCategory' WHERE `news`.`id`=".$id;
            }
            else{
                $sql="UPDATE `news` SET `title` = '$title', `text` = '$text', `picture` = '$image',
                `category_id` = '$idCategory' WHERE `news`.`id`=".$id; 
            }
            $db=new Database();
            $item=$db->executeRun($sql);
            if($item==true){
                $text=true;
            }
            }
        }
        return $test;
    }
    //--------------news delete
    public static function getNewsDelete($id){
        $test=false;
        if(isset($_POST['save'])){
            $sql="DELETE FROM `news` WHERE `news`.`id`=".$id;
            $db= new Database();
            $item=$db->executeRun($sql);
            if($item==true){
                $test=true;
            }
        }
        return $test;
    }

}//class
?>