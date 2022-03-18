<?php
class modelAdminCategory{
    //--------List
    public static function getCategoryList() {
        $sql = "SELECT * FROM category ORDER BY category.name ASC";
        $db = new Database();
        //$rows = массив данных
        $rows = $db->getAll($sql);
        //-----------
        return $rows;
    }
}//class
?>