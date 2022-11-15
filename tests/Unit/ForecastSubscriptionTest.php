<?php

namespace Tests\Unit;

use App\Models\ForecastSubscription;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;

class ForecastSubscriptionTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_mailinglist_subscribe_unsubscribe()
    {
        // Add an entry for the given subscription
        $subscription = ForecastSubscription::factory()->make();
        
        $subscription->save();
        
        $mail = $subscription->mail;
        $location = $subscription->location;
        $token = $subscription->token;
        
        $this->assertModelExists($subscription);
        
        $this->assertDatabaseCount('forecast_subscriptions', 1);
        
        $this->assertDatabaseHas('forecast_subscriptions', [
            'mail' => $mail,
        ]);
        
        $this->assertDatabaseHas('forecast_subscriptions', [
            'location' => $location,
        ]);
        
        
        // Unsubscribe by deleting the entry
        $subscription = ForecastSubscription::where('token', $token)->firstOrFail();
        
        $subscription->delete();
        
        $this->assertModelMissing($subscription);
        
        $this->assertDatabaseCount('forecast_subscriptions', 0);
    }
}
