<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Abstract;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AbstractTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_abstracts()
    {
        $this->actingAsAdmin();

        Abstract::factory()->count(2)->create();

        $this->getJson(route('api.abstracts.index'))
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
    public function test_abstracts_select2_api()
    {
        Abstract::factory()->count(5)->create();

        $response = $this->getJson(route('api.abstracts.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.abstracts.select', ['selected_id' => 4]))
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
    public function it_can_display_the_abstract_details()
    {
        $this->actingAsAdmin();

        $abstract = Abstract::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.abstracts.show', $abstract))
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
