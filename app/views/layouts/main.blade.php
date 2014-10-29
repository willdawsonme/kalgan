<!DOCTYPE html>
<html>
    <head>
        <title>Kalgan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <script type='text/javascript'>//<![CDATA[
            document.write("<script async src='//HOST:3000/browser-sync/browser-sync-client.1.6.1.js'><\/script>".replace(/HOST/g, location.hostname).replace(/PORT/g, location.port));
        //]]></script>
    </body>
</html>
