<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    const PATH = '/';

    public function testHomePageIsLoaded() {
        $response = $this->get(self::PATH );
        $response->assertStatus(200);
    }

    public function testHomePageHasText() {
        $response = $this->get(self::PATH);
        $response->assertSeeText('You are logged in!');
    }

    public function testHomePageDontHaveAdminMenu() {
        $response = $this->get(self::PATH);
        $response->assertDontSee(['Test 1', 'Test 2', 'Create news']);
    }
}
