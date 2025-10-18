<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_sliders()
    {
        $this->actingAsAdmin();

        Slider::factory()->count(2)->create();

        $this->getJson(route('api.sliders.index'))
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
    public function test_sliders_select2_api()
    {
        Slider::factory()->count(5)->create();

        $response = $this->getJson(route('api.sliders.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.sliders.select', ['selected_id' => 4]))
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
    public function it_can_display_the_slider_details()
    {
        $this->actingAsAdmin();

        $slider = Slider::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.sliders.show', $slider))
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
