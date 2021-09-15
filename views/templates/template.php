<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/template.css">
    <link rel="stylesheet" href="views/css/tailwind.css">
</head>
<body>
<div class="header <?= $color ?>">
    <div class="logo"><img src="views/assets/logo.png"/></div>
    <div class="text"><?= $title ?></div>
</div>
<div class="content"><?= $content ?></div>
</body>
</html>