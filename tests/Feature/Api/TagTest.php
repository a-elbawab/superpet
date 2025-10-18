<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_tags()
    {
        $this->actingAsAdmin();

        Tag::factory()->count(2)->create();

        $this->getJson(route('api.tags.index'))
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
    public function test_tags_select2_api()
    {
        Tag::factory()->count(5)->create();

        $response = $this->getJson(route('api.tags.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.tags.select', ['selected_id' => 4]))
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
    public function it_can_display_the_tag_details()
    {
        $this->actingAsAdmin();

        $tag = Tag::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.tags.show', $tag))
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
