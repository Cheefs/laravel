<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    const PATH = '/admin';

    public function testHomePageIsLoaded() {
        $response = $this->get(self::PATH );
        $response->assertStatus(200);
    }

    public function testAdminPageHasText() {
        $response = $this->get(self::PATH );
        $response->assertSeeText('Админка');
    }

    public function testAdminPageHasAdminMenu() {
        $response = $this->get(self::PATH );
        $response->assertSee(['Test 1', 'Test 2', 'Create news']);
    }
}
