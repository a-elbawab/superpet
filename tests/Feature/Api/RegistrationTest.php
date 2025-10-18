<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_registrations()
    {
        $this->actingAsAdmin();

        Registration::factory()->count(2)->create();

        $this->getJson(route('api.registrations.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }

    /** @test */
    public function test_registrations_select2_api()
    {
        Registration::factory()->count(5)->create();

        $response = $this->getJson(route('api.registrations.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.registrations.select', ['selected_id' => 4]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 4);

        $this->assertCount(5, $response->json('data'));
    }

    /** @test */
    public function it_can_display_the_registration_details()
    {
        $this->actingAsAdmin();

        $registration = Registration::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.registrations.show', $registration))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }
}
