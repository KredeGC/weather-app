<?php

namespace Tests\Unit;

use App\Http\Traits\ForecastTrait;

use Illuminate\Support\Str;

use PHPUnit\Framework\TestCase;

class ForecastTraitTest extends TestCase
{
    use ForecastTrait;
    
    public function test_location_get()
    {
        $location = $this->getLocation('Copenhagen');
        
        $this->assertTrue($location !== false);
        
        $this->assertEquals($location->name, 'Copenhagen');
    }
    
    public function test_forecast_exists()
    {
        $forecast = $this->getForecast('Copenhagen');
        
        $this->assertTrue($forecast !== false);
    }
}
