<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\CategoryProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_category_products()
    {
        $this->actingAsAdmin();

        CategoryProduct::factory()->count(2)->create();

        $this->getJson(route('api.category_products.index'))
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
    public function test_category_products_select2_api()
    {
        CategoryProduct::factory()->count(5)->create();

        $response = $this->getJson(route('api.category_products.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.category_products.select', ['selected_id' => 4]))
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
    public function it_can_display_the_category_product_details()
    {
        $this->actingAsAdmin();

        $category_product = CategoryProduct::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.category_products.show', $category_product))
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
