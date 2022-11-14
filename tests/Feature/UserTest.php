<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_index_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
