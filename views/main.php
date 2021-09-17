
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Looper</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/main.css">
</head>
<body>
<div class="header">
    <div class="logo"><img src="views/assets/logo.png"/></div>
    <div class="title"><h1>Exercise<br>Looper</h1></div>
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
