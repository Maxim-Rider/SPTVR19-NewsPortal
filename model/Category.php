<?php 

class Category {

    public static function getAllCategory() {
        $query = "SELECT * FROM categories";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

}