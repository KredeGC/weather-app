<?php

namespace Tests\Unit;

use App\Http\Traits\ForecastTrait;

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
        $location = $this->getLocation('Copenhagen');
        
        $this->assertTrue($location !== false);
        
        $forecast = $this->getForecast($location->latitude, $location->longitude);
        
        $this->assertTrue($forecast !== false);
    }
}
