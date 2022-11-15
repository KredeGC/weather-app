<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @vite(['resources/js/app.js'])

        <title>Weather Forecast</title>
    </head>
    <body class="bg-white">
        <div class="container">
            <div class="rows">
                <div class="card shadow-sm mt-5">
                    <h5 class="card-header">Forecast for {{ $location }}</h5>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Temperature</th>
                                    <th scope="col">Humidity</th>
                                    <th scope="col">Windspeed</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($forecast as $weather)
                                <tr>
                                    <td>Time: {{ $weather['time'] }}</td>
                                    <td>Temperature: {{ $weather['temperature'] }} C</td>
                                    <td>Humidity: {{ $weather['humidity'] }} %</td>
                                    <td>Wind speed: {{ $weather['windspeed'] }} km/h</td>
                                </tr>
                            @empty
                                <h2>The forecast could not be loaded.</h2>
                            @endforelse
                            </tbody>
                        </table>
                        <a href="{{ route('unsubscribe', ['token' => $token]) }}">Unsubscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>