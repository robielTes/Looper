<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/view/css/tailwind.css">
    <link rel="stylesheet" href="/view/css/template.css">
</head>
<body>
<div class="flex px-12 sm:px-24 md:px-40 <?= $color ?>">
    <div>
        <a href="\">
            <img class="w-14" src="/view/assets/logo.png"/>
        </a>
    </div>
    <div class="py-4">
        <p class="pl-8 text-white text-xl" href="\"><?= $title ?></p>
    </div>
</div>
<div class="px-12 sm:px-24 md:px-40">
    <?= $content ?>
</div>
</body>
</html>