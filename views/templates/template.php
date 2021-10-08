<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/template.css">
    <link rel="stylesheet" href="views/css/tailwind.css">
</head>
<body>
<a href="\"><div class="px-12 sm:px-24 md:px-40 header <?= $color ?>">
    <img src="views/assets/logo.png"/>
    <p class="title"><?= $title ?></p>
</div>
</a>
<div class="px-12 sm:px-24 md:px-40">
    <?= $content ?>
</div>

</body>
</html>