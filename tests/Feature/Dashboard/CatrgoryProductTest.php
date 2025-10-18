<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\CategoryProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_category_products()
    {
        $this->actingAsAdmin();

        CategoryProduct::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.category_products.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_category_product_details()
    {
        $this->actingAsAdmin();

        $category_product = CategoryProduct::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.category_products.show', $category_product))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_category_products_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.category_products.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_category_product()
    {
        $this->actingAsAdmin();

        $category_productsCount = CategoryProduct::count();

        $response = $this->post(
            route('dashboard.category_products.store'),
            CategoryProduct::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $category_product = CategoryProduct::all()->last();

        $this->assertEquals(CategoryProduct::count(), $category_productsCount + 1);

        $this->assertEquals($category_product->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_category_products_edit_form()
    {
        $this->actingAsAdmin();

        $category_product = CategoryProduct::factory()->create();

        $this->get(route('dashboard.category_products.edit', $category_product))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_category_product()
    {
        $this->actingAsAdmin();

        $category_product = CategoryProduct::factory()->create();

        $response = $this->put(
            route('dashboard.category_products.update', $category_product),
            CategoryProduct::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $category_product->refresh();

        $response->assertRedirect();

        $this->assertEquals($category_product->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_category_product()
    {
        $this->actingAsAdmin();

        $category_product = CategoryProduct::factory()->create();

        $category_productsCount = CategoryProduct::count();

        $response = $this->delete(route('dashboard.category_products.destroy', $category_product));

        $response->assertRedirect();

        $this->assertEquals(CategoryProduct::count(), $category_productsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_category_products()
    {
        if (!$this->useSoftDeletes($model = CategoryProduct::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        CategoryProduct::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.category_products.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_category_product_details()
    {
        if (!$this->useSoftDeletes($model = CategoryProduct::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $category_product = CategoryProduct::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.category_products.trashed.show', $category_product));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_category_product()
    {
        if (!$this->useSoftDeletes($model = CategoryProduct::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $category_product = CategoryProduct::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.category_products.restore', $category_product));

        $response->assertRedirect();

        $this->assertNull($category_product->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_category_product()
    {
        if (!$this->useSoftDeletes($model = CategoryProduct::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $category_product = CategoryProduct::factory()->create(['deleted_at' => now()]);

        $category_productCount = CategoryProduct::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.category_products.forceDelete', $category_product));

        $response->assertRedirect();

        $this->assertEquals(CategoryProduct::withoutTrashed()->count(), $category_productCount - 1);
    }

    /** @test */
    public function it_can_filter_category_products_by_name()
    {
        $this->actingAsAdmin();

        CategoryProduct::factory()->create([
            'name' => 'Foo',
        ]);

        CategoryProduct::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.category_products.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('category_products.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
