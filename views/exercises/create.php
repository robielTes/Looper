<?php
$title = 'Create Exercise';
$color = 'orange';
?>


<?php ob_start() ?>
    <p>Create an exercise here</p>
<?php $content = ob_get_clean(); ?>

<?php require('templates/template.php'); ?>