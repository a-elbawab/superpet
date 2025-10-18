<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Input;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InputTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_inputs()
    {
        $this->actingAsAdmin();

        Input::factory()->count(2)->create();

        $this->getJson(route('api.inputs.index'))
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
    public function test_inputs_select2_api()
    {
        Input::factory()->count(5)->create();

        $response = $this->getJson(route('api.inputs.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.inputs.select', ['selected_id' => 4]))
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
    public function it_can_display_the_input_details()
    {
        $this->actingAsAdmin();

        $input = Input::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.inputs.show', $input))
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
