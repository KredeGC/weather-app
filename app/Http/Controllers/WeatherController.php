<?php

namespace App\Http\Controllers;

use App\Models\ForecastSubscription;
use App\Http\Traits\ForecastTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class WeatherController extends Controller
{
    use ForecastTrait;
    
    public function index()
    {
        return view('index');
    }
    
    public function forecast(Request $request)
    {
        // Valdiate input requirements
        $validated = $request->validate([
            'location' => ['required']
        ]);
        
        $location = $this->getLocation($validated['location']);
        $forecast = $this->getForecast($location->latitude, $location->longitude);
        
        // Pass weather forecast to view
        return view('forecast', ['location' => $location->name, 'forecast' => $forecast]);
    }
}
