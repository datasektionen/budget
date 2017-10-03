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
    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="/css/jquery.timepicker.css" rel="stylesheet" type="text/css">
    <meta name="theme-color" content="#039BE5">
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
        </div>
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
        ,{ str: "Rambudget", href: "/overview" }
        @if (Auth::user())
        ,{ str: "Förslag", href: "/suggestions" }
        ,{ str: "Uppföljning", href: "/follow-up" }
        @endif
        ]
    }
    </script>
    <script src="//methone.datasektionen.se/bar.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>