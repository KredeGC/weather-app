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
        // Add an entry for the given
        // TODO: Use model factories
        $subscription = new ForecastSubscription();
        
        $subscription->name         = 'John Doe';
        $subscription->mail         = 'johndoe@example.com';
        $subscription->location     = 'Copenhagen';
        $subscription->token        = Str::random(60);
        
        $subscription->save();
        
        $token = $subscription->token;
        
        $this->assertModelExists($subscription);
        
        $this->assertDatabaseCount('forecast_subscriptions', 1);
        
        $this->assertDatabaseHas('forecast_subscriptions', [
            'mail' => 'johndoe@example.com',
        ]);
        
        
        // Unsubscribe by deleting the entry
        $subscription = ForecastSubscription::where('token', $token)->firstOrFail();
        
        $subscription->delete();
        
        $this->assertModelMissing($subscription);
        
        $this->assertDatabaseCount('forecast_subscriptions', 0);
    }
}
