<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/template.css">
    <link rel="stylesheet" href="views/css/tailwind.css">
</head>
<body>
<<<<<<< Updated upstream
<a href="\"><div class="px-12 sm:px-24 md:px-40 header <?= $color ?>">
    <img src="views/assets/logo.png"/>
    <p class="title"><?= $title ?></p>
</div>
</a>
<div class="px-12 sm:px-24 md:px-40">
    <?= $content ?>
</div>
=======
<div class="flex px-12 sm:px-24 md:px-40 <?= $color ?>">
    <div>
        <a href="\">
            <img class="w-14" src="views/assets/logo.png"/>
        </a>
    </div>
    <div class="py-4">
        <p class="pl-8 text-white text-xl" href="\"><?= $title ?></p>
    </div>
</div>
<div class="px-12 sm:px-24 md:px-40">
    <?= $content ?>
</div>
>>>>>>> Stashed changes
</body>
</html>