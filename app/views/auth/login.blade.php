<?php // This will inherit a layout in the future. ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kalgan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?PHP echo URL::asset('/css/global.css') ?>">

        <!--Typekit-->
        <script src="//use.typekit.net/wkb1ypz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    </head>

    <body class="form-only">


        <div class="login-wrap">
            <h1>Project Kalgan</h1>

            <div class="login-form">
                @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                {{ Form::open(['route' => ['login']]) }}

                    {{ Form::field(['name' => 'uts_id', 'label' => 'UTS ID', 'error' => $errors, 'parameters' => ['required']]) }}
                    {{ Form::field(['name' => 'password', 'type' => 'password', 'error' => $errors, 'parameters' => ['required']]) }}
                    {{ HTML::submit('Log in', ['class' => 'btn-block btn-primary']) }}

                {{ Form::close() }}
            </div>
        </div>

        <script type='text/javascript'>//<![CDATA[
            document.write("<script async src='//HOST:3000/browser-sync/browser-sync-client.1.6.1.js'><\/script>".replace(/HOST/g, location.hostname).replace(/PORT/g, location.port));
        //]]></script>
    </body>
</html>
