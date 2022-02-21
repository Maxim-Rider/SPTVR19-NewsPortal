<?php
    ob_start();
?>

<h1> Error 404 </h1>

<?php 
    $content = ob_get_clean();
    include_one 'view/layout.php';
?> 