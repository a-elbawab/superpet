<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttributeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_attributes()
    {
        $this->actingAsAdmin();

        Attribute::factory()->count(2)->create();

        $this->getJson(route('api.attributes.index'))
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
    public function test_attributes_select2_api()
    {
        Attribute::factory()->count(5)->create();

        $response = $this->getJson(route('api.attributes.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.attributes.select', ['selected_id' => 4]))
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
    public function it_can_display_the_attribute_details()
    {
        $this->actingAsAdmin();

        $attribute = Attribute::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.attributes.show', $attribute))
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
