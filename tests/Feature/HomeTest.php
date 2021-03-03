<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{

    public function testHomePageIsLoaded() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testHomePageHasText() {
        $response = $this->get('/');
        $response->assertSeeText('You are logged in!');
    }
}
