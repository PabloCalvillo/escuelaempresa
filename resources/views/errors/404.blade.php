<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/404.css') }}" rel="stylesheet">
    <title>404</title>
</head>
<body>
        <h1>404 page not found</h1>
    <div class="container">
        <div class="error404page">
            <div class="newcharacter404">
                <div class="chair404"></div>
                <div class="leftshoe404"></div>
                <div class="rightshoe404"></div>
                <div class="legs404"></div>
                <div class="torso404">
                    <div class="body404"></div>
                    <div class="leftarm404"></div>
                    <div class="rightarm404"></div>
                    <div class="head404">
                        <div class="eyes404"></div>
                    </div>
                </div>
                <div class="laptop404"></div>
            </div>
        </div>
    </div>
<a class="btn btn-primary" href="{{ route('home') }}">Go to home</a>
</body>
</html>