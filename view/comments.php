<?php
class ViewComments {
    public static function CommentsForm{
        echo '
        <form action="insertcomment">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        Teie kommentaar: <input type="text" name="comment">
        <input type="submit" value="Saada">
        </form>
        ';
    }
}