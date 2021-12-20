<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"
            integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Looper</title>
</head>
<body>
<div>
    <div class="flex px-12 sm:px-24 md:px-40 lg:px-96 {{$_SESSION['color']}}">
        <div>
            <a href="\">
                <img class="w-14" src="/assets/logo.png"/>
            </a>
        </div>
        <div class="py-4">
            <p class="pl-8 text-white text-xl" href="\">{{$_SESSION['title']}}</p>
        </div>
    </div>
    <div class="px-24 sm:px-24 md:px-40 lg:px-20 2xl:px-96">
        @yield('content')
    </div>
</div>
</body>
</html>
