<?php
$title = 'Manage Exercise';
$color = 'green';
//TODO put font awesome icons used by the teacher
?>


<?php ob_start() ?>
<div class="flex flex-row">
    <div class="flex-1 px-2">
        <h1 class="text-4xl font-semibold">Building</h1>
        <h5 class="pt-5 border-b-2">Title</h5>
        <div class="flex flex-row">
            <div>
                <p>Lorem, ipsum dolor sit amet </p>
            </div>
            <div class="flex-grow"></div>
            <div class="flex flex-row">
                <img src="views/assets/edit.png" alt="edit">
                <img src="views/assets/trash.png" alt="trash">
                <img src="views/assets/stop.png" alt="stop" >
            </div>
        </div>
    </div>
    <div class="flex-1 px-2">
        <h1 class="text-4xl font-semibold">Answering</h1>
        <h5 class="pt-5 border-b-2">Title</h5>
        <div class="flex flex-row">
            <div>
                <p>Lorem, ipsum dolor sit amet </p>
            </div>
            <div class="flex-grow"></div>
            <div class="flex flex-row">
                <img src="views/assets/edit.png" alt="edit">
                <img src="views/assets/stop.png" alt="stop" >
            </div>
        </div>
    </div>
    <div class="flex-1 px-2">
        <h1 class="text-4xl font-semibold">Closed</h1>
        <h5 class="pt-5 border-b-2">Title</h5>
        <div class="flex flex-row">
            <div>
                <p>Lorem, ipsum dolor sit amet </p>
            </div>
            <div class="flex-grow"></div>
            <div class="flex flex-row">
                <img src="views/assets/edit.png" alt="edit">
                <img src="views/assets/trash.png" alt="trash">
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/templates/template.php'); ?>