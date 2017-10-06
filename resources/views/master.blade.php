<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Budget') - Budgetsystemet på Datasektionen</title>

    <!-- Fonts -->
    <link href="//aurora.datasektionen.se" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#607d8b">
    <meta name="msapplication-TileImage" content="/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#607d8b">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head-js')
</head>
<body>
    <div id="methone-container-replace"></div>
    <div id="application" class="blue-grey">
        <header>
            <div class="header-inner">
                <div class="row">
                    <div class="header-left col-md-2">
                        @yield('header-left')
                    </div>
                    <div class="col-md-8">
                        <h2>@yield('title')</h2>
                    </div>
                    <div class="header-right col-md-2">
                        @yield('action-button')
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </header>
        <div id="content">
            @yield('content')
            @include('includes.messages')
        </div>
    </div>
    <div id="footer">
        <div class="col">
            <p>Hittat något som inte funkar? <a href="https://datasektionen.se/namnder/informationsorganet">IORs Crash &amp; Bränn</a> fixar det så snart som möjligt om du skapar ett issue på Github.</p>
            <p class="link"><a href="https://github.com/datasektionen/budget/issues" class="button theme-color">Skapa ett issue</a></p>
        </div>
        <div class="col">
            <p>Budgetsystemet är skrivet av <a href="http://dahl.guru">Jonas Dahl</a>.</p>
        </div>
        <div class="col">
            <p>Vill du själv ändra saker här, eller koda något nytt? Tveka inte att komma på en Hackerkväll! För mer info, följ IORs Facebook.
            </p>
            <p class="link"><a href="https://www.facebook.com/informationsorganet/" class="button theme-color">IOR på Facebook</a></p>
        </div>
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    window.methone_conf = {
        system_name: "budget",
        color_scheme: "blue_grey",
        @if(Auth::guest())
        login_text: "Logga in",
        login_href: "/login",
        @else
        login_text: "Logga ut",
        login_href: "/logout",
        @endif

        links: [
        { str: "Hem", href: "/" }
        @if (env('HIDE') != true || Auth::user())
        ,{ str: "Rambudget", href: "/overview" }
        @endif
        @if (Auth::user())
        ,{ str: "Förslag", href: "/suggestions" }
        ,{ str: "Uppföljning", href: "/follow-up" }
        @if (Auth::user()->isAdmin())
        ,{ str: "Administration", href: "/admin" }
        @endif
        @endif
        ]
    }
    </script>
    <script src="//methone.datasektionen.se/bar.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>