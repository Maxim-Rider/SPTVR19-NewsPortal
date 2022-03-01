<?php 

    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];

    if ($path == '' OR $path == 'index' OR $path == 'index.php') {
        $response = Controller::StartSite();
    }

    elseif($path == 'all') {
        $response = Controller::AllNews();
    }

    elseif($path == "category" AND isset($_GET['id'])) {
        $response = Controller::NewsByCatID($_GET['id']);
    }

    elseif($path == "news" AND isset($_GET['id'])) {
        $response = Controller::NewsByID($_GET['id']);
    }

    elseif($path == "insertcomment" and isset($_GET['comment'],$_GET['id'])) {
        $response = Controller::InsertComment($_GET['comment'],_GET['id']);
    }

    else {
        $response = Controller::error404();
    }