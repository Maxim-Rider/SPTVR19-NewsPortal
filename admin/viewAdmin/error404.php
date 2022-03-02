<?php ob_start() ?>
<h2>404 ошибка</h2>
<article>
    <h3>404 ошибка - что это такое</h3>
    <p>По запрашиваемому URL страница не найдена</p>
</article>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";