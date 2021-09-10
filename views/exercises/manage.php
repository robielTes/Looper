<?php
$title = 'Manage Exercise';
$color = 'green';
?>


<?php ob_start() ?>
    <p>Manage an exercise here</p>
<?php $content = ob_get_clean(); ?>

<?php require('templates/template.php'); ?>