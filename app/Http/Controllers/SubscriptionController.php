<?php

namespace App\Http\Controllers;

use App\Models\ForecastSubscription;
use App\Http\Traits\ForecastTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class SubscriptionController extends Controller
{
    use ForecastTrait, ValidatesRequests;
    
    public function subscribe()
    {
        return view('mailinglist.subscribe');
    }
    
    public function unsubscribe($token)
    {
        // Use the token to find the given subscription or 404
        $subscription = ForecastSubscription::where('token', $token)->firstOrFail();
        
        $location = $subscription->location;
        
        $subscription->delete();
        
        return redirect()->route('mailinglist.subscribe')->with('success', 'Successfully unsubscribed from weather forecast for ' . $location);
    }
    
    public function doSubscribe(Request $request)
    {
        // Valdiate input requirements
        $validated = $request->validate([
            'name'        => ['required'],
            'mail'        => ['required','email'],
            'location'    => ['required']
        ]);
        
        // Construct and save the new mail preference
        $subscription = new ForecastSubscription();
        
        $subscription->name         = $validated['name'];
        $subscription->mail         = $validated['mail'];
        $subscription->location     = $validated['location'];
        $subscription->token        = Str::random(60);

        $subscription->save();
        
        return redirect()->route('mailinglist.subscribe')->with('success', 'Successfully subscribed to weather forecast for ' . $validated['location']);
    }
}
