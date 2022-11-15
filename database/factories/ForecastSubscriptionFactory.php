<?php

namespace Database\Factories;

use App\Models\ForecastSubscription;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForecastSubscriptionFactory extends Factory
{
    public function definition()
    {
        return [
            'mail' => fake()->unique()->safeEmail(),
            'name' => fake()->name(),
            'location' => fake()->city(),
            'token' => Str::random(60)
        ];
    }
}
