<?php
$title = '404';
$color = 'green';
?>


<?php ob_start() ?>
<?php $content = ob_get_clean(); ?>

<?php require('views/templates/template.php'); ?>