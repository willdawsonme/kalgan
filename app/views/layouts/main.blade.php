<!DOCTYPE html>
<html>
    <head>
        <title>Kalgan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/global.css">

        <!--Typekit-->
        <script src="//use.typekit.net/wkb1ypz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    </head>

    <body>
        @if(Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @yield('content')
    </body>
</html>