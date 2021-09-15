<?php
$color = 'purple';
$title = '';
?>


<?php ob_start() ?>
    <div>

    </div>
<?php $content = ob_get_clean(); ?>

<?php require('views/templates/template.php'); ?>