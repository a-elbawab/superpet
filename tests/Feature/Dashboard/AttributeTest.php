<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttributeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_attributes()
    {
        $this->actingAsAdmin();

        Attribute::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.attributes.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_attribute_details()
    {
        $this->actingAsAdmin();

        $attribute = Attribute::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.attributes.show', $attribute))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_attributes_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.attributes.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_attribute()
    {
        $this->actingAsAdmin();

        $attributesCount = Attribute::count();

        $response = $this->post(
            route('dashboard.attributes.store'),
            Attribute::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $attribute = Attribute::all()->last();

        $this->assertEquals(Attribute::count(), $attributesCount + 1);

        $this->assertEquals($attribute->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_attributes_edit_form()
    {
        $this->actingAsAdmin();

        $attribute = Attribute::factory()->create();

        $this->get(route('dashboard.attributes.edit', $attribute))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_attribute()
    {
        $this->actingAsAdmin();

        $attribute = Attribute::factory()->create();

        $response = $this->put(
            route('dashboard.attributes.update', $attribute),
            Attribute::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $attribute->refresh();

        $response->assertRedirect();

        $this->assertEquals($attribute->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_attribute()
    {
        $this->actingAsAdmin();

        $attribute = Attribute::factory()->create();

        $attributesCount = Attribute::count();

        $response = $this->delete(route('dashboard.attributes.destroy', $attribute));

        $response->assertRedirect();

        $this->assertEquals(Attribute::count(), $attributesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_attributes()
    {
        if (! $this->useSoftDeletes($model = Attribute::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Attribute::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.attributes.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_attribute_details()
    {
        if (! $this->useSoftDeletes($model = Attribute::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $attribute = Attribute::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.attributes.trashed.show', $attribute));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_attribute()
    {
        if (! $this->useSoftDeletes($model = Attribute::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $attribute = Attribute::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.attributes.restore', $attribute));

        $response->assertRedirect();

        $this->assertNull($attribute->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_attribute()
    {
        if (! $this->useSoftDeletes($model = Attribute::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $attribute = Attribute::factory()->create(['deleted_at' => now()]);

        $attributeCount = Attribute::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.attributes.forceDelete', $attribute));

        $response->assertRedirect();

        $this->assertEquals(Attribute::withoutTrashed()->count(), $attributeCount - 1);
    }

    /** @test */
    public function it_can_filter_attributes_by_name()
    {
        $this->actingAsAdmin();

        Attribute::factory()->create([
            'name' => 'Foo',
        ]);

        Attribute::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.attributes.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('attributes.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
