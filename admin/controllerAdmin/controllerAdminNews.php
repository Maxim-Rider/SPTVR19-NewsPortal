<?php
class controllerAdminNews{
    //listNews
    public static function NewsList(){
        $arr=modelAdminNews::getNewsList();
        include_once 'viewAdmin/newsList.php';
    }
    //----------------add
    public static function newsAddForm(){
        $arr = modelAdminCategory::getCategoryList();
        include_once('viewAdmin/newsAddForm.php');
    }
    public static function newsAddResult(){
        $test = modelAdminNews::getNewsAdd();
        include_once('viewAdmin/newsAddForm.php');
    }
    public static function newsEditForm($id){
        $arr = modelAdminCategory::getCategoryList();
        $detail=modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsEditForm.php');
    }
    public static function newsEditResult($id){
        $test=modelAdminNews::getNewsEdit($id);
        include_once('viewAdmin/newsEditForm.php');
    }
    //----------delete
    public static function newsDeleteForm($id){
        $arr = modelAdminCategory::getCategoryList();
        $detail=modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }
    public static function newsDeleteResult($id){
        $test=modelAdminNews::getNewsDelete($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }

}//class
?>