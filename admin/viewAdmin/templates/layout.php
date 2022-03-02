<html>
    <head>
        <title>Dashboard</title>
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/mystyle.css" red="stylesheet">
        <!-- Font Awesome --> <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <!-- SCRIPT -->
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/js/ajaxupload.3.5.js"></script>
    </head>

<body>
    <div class="container">
    <!--  -->
    <?php if(isset($_SESSION["userId"]) && isset($_SESSION["sessionId"])) 
    {
    ?>
        <div class="header clearfix">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
    <!--  -->
    <?php echo '<ul class="nav nav-pills pull-right">
    <li role="button">'.$_SESSION["name"].
    '<a href="logout" style="display: inline;">Выйти <i class="fa fa-sign-out"></i>
    </a></li></ul>';

    if(isset($_SESSION["status"]) && $_SESSION["status"]=="admin") {
        echo '<h4><a href="../" target=_blank>WEB SITE</a>';
        echo ' &#187 <a href="categoryAdmin">Categories</a>';
        echo ' &#187 <a href="newsAdmin">NewsList</a>';

        echo '</h4>';
       } else {
           echo '<h4>У вас нет прав</h4>';
       }
    ?>
        </div>
        </nav>
        </div>
        <?php
        }
        ?>
        <div id="content" style="padding-top:20px">
    <?php echo $content; ?>
        </div>

    
    <footer class="footer">
        <p>$copy; 2019 Design Admin Dashboard<i class="fa fa-child"></i></p>
    </footer>
    </div> <!-- container -->
</body>
</html>