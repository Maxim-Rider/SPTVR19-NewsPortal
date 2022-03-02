<?php
$host = explode('?', $_SERVER['REQUEST_URI']) [0];
$num=substr_count($host,'/');
$path = explode('/', $host) [$num];

if ($path == '' OR $path == 'index.php')
{
    // Главная страница -
    $response = controllerAdmin::formLoginSite();
}
//-------ВХОД-------------------------------------------------------
elseif ($path == 'login')
{
    //Форма входа
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout')
{
    //Выход
    $response = controllerAdmin::logoutAction();
}

else
{
    //Страница не существует
    $response = controllerAdmin::error404();
}