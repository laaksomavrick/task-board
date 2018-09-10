<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello, world!</title>

        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <link rel="preload" href="{{ asset('css/app.css') }}" as="style" onload="this.rel='stylesheet'">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>