<?php
$title = 'New Exercise';
$color = 'yellow';

ob_start()
?>
<div>
    <p class="text-5xl pb-8">New Exercise</p>
    <label class="text-gray-700 text-xl">Title</label>
<<<<<<< Updated upstream
    <form method="post">
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="exercise_title"><br><br>
        <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="submit" value="Create Field">
=======
    <?php
        if (!empty($_GET['title'])) {
            Exercise::create(['title'=>$_POST["title"],'states_id'=>'2']);
        }
    ?>
    <form>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="title" name="title"><br><br>
        <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Create Field">
>>>>>>> Stashed changes
    </form>
</div>
<?php
$content = ob_get_clean();
require('views/templates/template.php');