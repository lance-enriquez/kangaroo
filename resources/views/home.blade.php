<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootsrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Jquery Library -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- DevEx Library -->
        <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.2.6/css/dx.light.css" />
        <script src="https://cdn3.devexpress.com/jslib/22.2.6/js/dx.all.js"></script>

        <!-- Local JS Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dx-viewport">
        <nav class="navbar navbar-sm bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="/">
                    <img src="https://cdn-icons-png.flaticon.com/512/1410/1410720.png" alt="Kangaroo" width="36" height="30">
                    {{env('APP_NAME')}}
                </a>
            </div>
        </nav>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div id="gridContainer"></div>
                </div>
            </div>
        </div>
        @include('form')
    </body>
</html>
