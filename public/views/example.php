<?php
ob_start()
?>
    <div class="flex justify-center py-8">
        <a href="/take" class="purple text-white font-bold rounded mx-8 py-4 px-32">
            TAKE AN EXERCISE
        </a>
        <a href="/create" class="yellow text-white font-bold rounded mx-8 py-4 px-32">
            CREATE AN EXERCISE
        </a>
        <a href="/manage" class="green text-white font-bold rounded mx-8 py-4 px-32">
            MANAGE AN EXERCISE
        </a>
    </div>
<?php
$content = ob_get_clean();
$title = "Exercice Looper";
$color = "purple";
require('public/views/layouts/template.php');