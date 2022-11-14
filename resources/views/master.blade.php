<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @vite(['resources/js/app.js'])

        <title>Weather Forecast</title>
    </head>
    <body class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <span>Weather Forecast</span>
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link adoption-mine" href="{{ route('mailinglist.subscribe') }}">Subscribe</a>
                        </li>
                    </ul>
                </div>
                <form class="form-inline" method="GET" action="{{ route('forecast') }}">
                    <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="location" id="location">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
