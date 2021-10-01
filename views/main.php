
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Looper</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/main.css">
</head>
<body>
<<<<<<< Updated upstream
<div class="header">
    <div class="logo"><img src="views/assets/logo.png"/></div>
    <div class="title"><h1>Exercise<br>Looper</h1></div>
=======
<div class="flex flex-col justify-center bg-purple-500">
    <div class="m-auto py-4">
        <img src="views/assets/logo.png"/>
    </div>
    <div class="py-8">
        <h1 class="text-center text-white text-6xl tracking-widest">Exercise<br>Looper</h1>
    </div>
</div>
<div class="flex justify-center py-8">
    <a href="\take" class="purple text-white font-bold rounded mx-8 py-4 px-32">TAKE AND EXERCISE</a>
    <a href="\create" class="yellow text-white font-bold rounded mx-8 py-4 px-32">CREATE AND EXERCISE</a>
    <a href="\manage" class="green text-white font-bold rounded mx-8 py-4 px-32">MANAGE AND EXERCISE</a>
>>>>>>> Stashed changes
</div>
<form method="get" action="<?= $_SERVER['PHP_SELF']?>">
    <div class="buttons">
        <button class="take"><a href="\take">TAKE AN EXERCISE</a></button>
        <button class="create"><a href="\create">CREATE AN EXERCISE</a></button>
        <button class="manage"><a href="\manage">MANAGE AN EXERCISE</a></button>
    </div>
</form>
<?php


?>
</body>
</html>
