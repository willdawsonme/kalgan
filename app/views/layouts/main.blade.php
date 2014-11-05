<!DOCTYPE html>
<html>
    <head>
        <title>{{ ! empty($title) ? "$title - " : '' }}Kalgan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/global.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/default.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/default.date.css') }}">

        <!--Typekit-->
        <script src="//use.typekit.net/wkb1ypz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    </head>

    <body>
        <div class="page-wrap">
            <header class="site-header">
                <h1>{{ link_to_route('home', 'Project Kalgan'), ! empty($title) ? " / $title" : '' }}</h1>

                <div class="actions">
                    @yield('actions')
                </div>
            </header>

            <sidebar class="site-navigation">
                <div class="spacer"></div>

                <nav>
                    <ul>
                        <li>{{ link_to_route('applications.index', 'Applications') }}</li>
                    </ul>
                    <div class="sep"></div>
                    <ul class="nav-account">
                        <li>{{ $currentUser->uts_id }}</li>
                        <li>{{ link_to_route('logout', 'Logout') }}</li>
                    </ul>
                </nav>
            </sidebar>

            <main>
                @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                @yield('content')
            </main>
        </div>

        <script type='text/javascript'>//<![CDATA[
            document.write("<script async src='//HOST:3000/browser-sync/browser-sync-client.1.6.1.js'><\/script>".replace(/HOST/g, location.hostname).replace(/PORT/g, location.port));
        //]]></script>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="{{ URL::asset('/js/picker.js') }}"></script>
        <script src="{{ URL::asset('/js/picker.date.js') }}"></script>

        <script type="text/javascript">
            @yield('scripts')
        </script>
    </body>
</html>
