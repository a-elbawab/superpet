<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_galleries()
    {
        $this->actingAsAdmin();

        Gallery::factory()->count(2)->create();

        $this->getJson(route('api.galleries.index'))
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
    public function test_galleries_select2_api()
    {
        Gallery::factory()->count(5)->create();

        $response = $this->getJson(route('api.galleries.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.galleries.select', ['selected_id' => 4]))
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
    public function it_can_display_the_gallery_details()
    {
        $this->actingAsAdmin();

        $gallery = Gallery::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.galleries.show', $gallery))
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
