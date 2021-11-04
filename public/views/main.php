<!DOCTYPE html>
<html lang="en">
<head>
    <title>Looper</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/views/css/main.css">
</head>
<body>
<div class="flex flex-col justify-center bg-purple-500">
    <div class="m-auto py-4">
        <img src="./public/views/assets/logo.png"/>
    </div>
    <div class="py-8">
        <h1 class="text-center text-white text-6xl tracking-widest">Exercise<br>Looper</h1>
    </div>
</div>
<div class="flex justify-center py-8">
    <a href="index.php?controller=HomeController&method=take" class="purple text-white font-bold rounded mx-8 py-4 px-32">
        TAKE AN EXERCISE
    </a>
    <a href="index.php?controller=HomeController&method=create" class="yellow text-white font-bold rounded mx-8 py-4 px-32">
        CREATE AN EXERCISE
    </a>
    <a href="index.php?controller=HomeController&method=manage" class="green text-white font-bold rounded mx-8 py-4 px-32">
        MANAGE AN EXERCISE
    </a>
</div>
</body>
</html>