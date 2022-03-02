<?php
class controllerAdmin{

    public static function formLoginSite() {
        include_once('viewAdmin/formLogin.php');
    }
    //Форма авторизации админа
    public static function loginAction(){
        $logIn=modelAdmin::userAuthentication();
        if(isset($logIn) and $logIn==true){
            include_once('viewAdmin/startAdmin.php');
        }
        else{
            $_SESSION['errorString']='Неправильное имя пользователя или пароль';
            include_once('viewAdmin/formLogin.php');
        }
    }
    //Выход из админ-панели
    public static function logoutAction(){
        modelAdmin::userLogout();
        include_once('viewAdmin/formLogin.php');
    }
    //Страница Error
    public static function error404(){
        include_once('viewAdmin/error404.php');
    }
}//end class
?>