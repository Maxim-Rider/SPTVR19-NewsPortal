<?php
class modelAdmin{
// АВТОРИЗАЦИЯ АДМИНА
    public static function userAuthentication()
    {
        if (isset($_SESSION['sessionId'])){
            $logIn=true;
        }
        else{
            $logIn=false;
            if(isset($_POST['btnLogin']))
            {
                if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] !="" && $_POST['password']!=""){
                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                    $password = filter_input(INPUT_POST, 'password');
                    $sql='SELECT * FROM `users` WHERE `email` ="'.$email.'"';
                    $db = new database();
                    $item = $db->getOne($sql);

                    if($item!=null) {
                        $loginEmail = strtolower($_POST['email']);
                        $password = $_POST['password'];
                        if ($loginEmail == $item['email'] && password_verify($password, $item['password']))
                        {
                            $_SESSION['sessionId']=session_id();
                            $_SESSION['userId']=$item['id'];
                            $_SESSION['name']=$item['username'];
                            $_SESSION['status']=$item['status'];
                            $logIn=true;
                        }
                    }
                }
            }
        }
        return $logIn;
        //https://php.ru/manual/function.password-hash.html
        //https://php.ru/manual/function.password-verify.html
    }
// ВЫХОД ИЗ АДМИНКИ
    public static function userLogout()
    {
        unset($_SESSION['sessionId']);
        unset($_SESSION['userId']);
        unset($_SESSION['name']);
        unset($_SESSION['status']);
        session_destroy();
        return;
    }        
}
?>