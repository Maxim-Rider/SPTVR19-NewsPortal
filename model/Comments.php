<?php
class Comments {
    public static function insertComment($c, $id) {
        $query = "INSERT INTO `comments` (`id`, `news_id`, `text`, `date`) VALUES (NULL, '".$id."', '".$c."', CURRENT_TIMESTAMP)";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;
    }
}