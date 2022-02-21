<?php

    ob_start();

?>

<h1> All News </h1>
<br>

<?php

ViewNews::AllNews($arr);
$content = ob_get_clean();
include_once 'view/layout.php';

?> 