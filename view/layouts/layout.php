<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/main.css">
    <title>Looper</title>
</head>
<body>

<div class="flex px-12 sm:px-24 md:px-40 <?= $this->color ?>">
    <div>
        <a href="\">
            <img class="w-14" src="/view/assets/logo.png"/>
        </a>
    </div>
    <div class="py-4">
        <p class="pl-8 text-white text-xl" href="\"><?= $this->title ?></p>
    </div>
</div>
<div class="px-12 sm:px-24 md:px-40">
    {{content}}
</div>

</body>
</html>