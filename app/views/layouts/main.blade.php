<!DOCTYPE html>
<html>
    <head>
        <title>Kalgan</title>
    </head>

    <body>
        @if(Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @yield('content')
    </body>
</html>