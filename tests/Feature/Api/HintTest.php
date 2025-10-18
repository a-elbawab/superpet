<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Hint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HintTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_hints()
    {
        $this->actingAsAdmin();

        Hint::factory()->count(2)->create();

        $this->getJson(route('api.hints.index'))
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
    public function test_hints_select2_api()
    {
        Hint::factory()->count(5)->create();

        $response = $this->getJson(route('api.hints.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.hints.select', ['selected_id' => 4]))
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
    public function it_can_display_the_hint_details()
    {
        $this->actingAsAdmin();

        $hint = Hint::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.hints.show', $hint))
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
