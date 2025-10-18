<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_galleries()
    {
        $this->actingAsAdmin();

        Gallery::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.galleries.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_gallery_details()
    {
        $this->actingAsAdmin();

        $gallery = Gallery::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.galleries.show', $gallery))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_galleries_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.galleries.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_gallery()
    {
        $this->actingAsAdmin();

        $galleriesCount = Gallery::count();

        $response = $this->post(
            route('dashboard.galleries.store'),
            Gallery::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $gallery = Gallery::all()->last();

        $this->assertEquals(Gallery::count(), $galleriesCount + 1);

        $this->assertEquals($gallery->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_galleries_edit_form()
    {
        $this->actingAsAdmin();

        $gallery = Gallery::factory()->create();

        $this->get(route('dashboard.galleries.edit', $gallery))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_gallery()
    {
        $this->actingAsAdmin();

        $gallery = Gallery::factory()->create();

        $response = $this->put(
            route('dashboard.galleries.update', $gallery),
            Gallery::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $gallery->refresh();

        $response->assertRedirect();

        $this->assertEquals($gallery->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_gallery()
    {
        $this->actingAsAdmin();

        $gallery = Gallery::factory()->create();

        $galleriesCount = Gallery::count();

        $response = $this->delete(route('dashboard.galleries.destroy', $gallery));

        $response->assertRedirect();

        $this->assertEquals(Gallery::count(), $galleriesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_galleries()
    {
        if (! $this->useSoftDeletes($model = Gallery::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Gallery::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.galleries.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_gallery_details()
    {
        if (! $this->useSoftDeletes($model = Gallery::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $gallery = Gallery::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.galleries.trashed.show', $gallery));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_gallery()
    {
        if (! $this->useSoftDeletes($model = Gallery::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $gallery = Gallery::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.galleries.restore', $gallery));

        $response->assertRedirect();

        $this->assertNull($gallery->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_gallery()
    {
        if (! $this->useSoftDeletes($model = Gallery::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $gallery = Gallery::factory()->create(['deleted_at' => now()]);

        $galleryCount = Gallery::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.galleries.forceDelete', $gallery));

        $response->assertRedirect();

        $this->assertEquals(Gallery::withoutTrashed()->count(), $galleryCount - 1);
    }

    /** @test */
    public function it_can_filter_galleries_by_name()
    {
        $this->actingAsAdmin();

        Gallery::factory()->create([
            'name' => 'Foo',
        ]);

        Gallery::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.galleries.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('galleries.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
