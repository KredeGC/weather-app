<?php
namespace App\Http\Traits;

trait ForecastTrait {
    public function getLocation($location)
    {
        // Query API for latitude and longitude based on location name
        $locationUrl = "https://geocoding-api.open-meteo.com/v1/search?name=$location";
        $locationResult = file_get_contents($locationUrl);
        
        $locationData = json_decode($locationResult);
        
        if (!$locationData || !$locationData->results || !$locationData->results[0]) {
            return false;
        }
        
        return $locationData->results[0];
    }
    
    public function getForecast($latitude, $longitude)
    {
        // Query API for weather data
        $weatherUrl = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&hourly=temperature_2m,relativehumidity_2m,windspeed_10m&timezone=auto";
        $weatherResult = file_get_contents($weatherUrl);
        
        $weatherData = json_decode($weatherResult);
        
        if (!$weatherData || !$weatherData->hourly) {
            return false;
        }
        
        // Create weather forecast
        $forecast = [];
        for ($i = 0; $i < 24; $i++)
        {
            $forecast[$i] = [
                'time' => $weatherData->hourly->time[$i],
                'temperature' => $weatherData->hourly->temperature_2m[$i],
                'humidity' => $weatherData->hourly->relativehumidity_2m[$i],
                'windspeed' => $weatherData->hourly->windspeed_10m[$i]
            ];
        }
        
        return $forecast;
    }
}