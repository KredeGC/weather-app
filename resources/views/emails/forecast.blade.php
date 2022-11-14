<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather app</title>
    </head>
    <body>
        <div>
            @forelse($forecast as $weather)
                <div class="col-4">
                    <div>
                        Time: {{ $weather['time'] }}
                    </div>
                    <div>
                        Temperature: {{ $weather['temperature'] }}
                    </div>
                    <div>
                        Humidity: {{ $weather['humidity'] }}
                    </div>
                    <div>
                        Wind speed: {{ $weather['windspeed'] }}
                    </div>
                </div>
            @empty
                <h2>The temperature could not be loaded.</h2>
            @endforelse
        </div>
        <a href="{{ route('unsubscribe', ['token' => $token]) }}">Unsubscribe</a>
    </body>
</html>