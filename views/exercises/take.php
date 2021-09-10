<?php
$title = 'New Exercise';
$color = 'purple';
?>


<?php ob_start() ?>
    <p>Take an exercise here</p>
<?php $content = ob_get_clean(); ?>

<?php require('templates/template.php'); ?>