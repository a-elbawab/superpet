<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;

class AccessTest extends TestCase
{
    public function test_dashboard_authorization()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();
    }
}
