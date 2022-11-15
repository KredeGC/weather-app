<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_index_get()
    {
        $this->get('/')
            ->assertStatus(200);
    }
    
    public function test_forecast_get()
    {
        $this->get(route('forecast', ['location' => 'Odense']))
            ->assertSee('Odense')
            ->assertStatus(200);
    }
    
    public function test_subscribe_get()
    {
        $this->get('/mailinglist/subscribe')
            ->assertSessionMissing('success')
            ->assertSessionHasNoErrors()
            ->assertStatus(200);
    }
    
    public function test_subscribe_post()
    {
        $this->post('/mailinglist/subscribe', [
            'mail' => fake()->unique()->safeEmail(),
            'name' => fake()->name(),
            'location' => fake()->city()
        ])
            ->assertRedirect(route('mailinglist.subscribe'))
            ->assertSessionHas('success')
            ->assertSessionHasNoErrors()
            ->assertStatus(302);
    }
    
    public function test_subscribe_post_errors()
    {
        $this->post('/mailinglist/subscribe', [
            'mail' => '',
            'name' => '',
            'location' => ''
        ])
            ->assertSessionHasErrors(['name', 'mail', 'location'])
            ->assertStatus(302);
    }
}
