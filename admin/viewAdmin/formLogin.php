<?php 
if (isset($_SESSION['userId'])) {
    header('Location: login');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard</title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/login.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form class="form-signin" action="login" method="POST">
                <h3 class="form-signin-heading">Введите ваши данные</h3>
                <input type="text" name="email" class="form-control"
                placeholder="Email">
                <input type="password" name="password" class="form-control"
                placeholder="Пароль">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin">Войти</button>
                <p style="padding-top:10px;">
                    <?php
                    if (isset($_SESSION['errorString'])) {
                        echo $_SESSION['errorString'];
                        unset($_SESSION['errorString']);
                    }
                    ?>
                    </p>
                    <p style="padding-top:10px"><a href="../">WebSite</a></p>
            </form>
        </div> 
    </body>
</html>