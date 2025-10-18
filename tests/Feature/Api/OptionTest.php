<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Option;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_options()
    {
        $this->actingAsAdmin();

        Option::factory()->count(2)->create();

        $this->getJson(route('api.options.index'))
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
    public function test_options_select2_api()
    {
        Option::factory()->count(5)->create();

        $response = $this->getJson(route('api.options.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.options.select', ['selected_id' => 4]))
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
    public function it_can_display_the_option_details()
    {
        $this->actingAsAdmin();

        $option = Option::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.options.show', $option))
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
