<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_tags()
    {
        $this->actingAsAdmin();

        Tag::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.tags.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_tag_details()
    {
        $this->actingAsAdmin();

        $tag = Tag::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.tags.show', $tag))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_tags_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.tags.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_tag()
    {
        $this->actingAsAdmin();

        $tagsCount = Tag::count();

        $response = $this->post(
            route('dashboard.tags.store'),
            Tag::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $tag = Tag::all()->last();

        $this->assertEquals(Tag::count(), $tagsCount + 1);

        $this->assertEquals($tag->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_tags_edit_form()
    {
        $this->actingAsAdmin();

        $tag = Tag::factory()->create();

        $this->get(route('dashboard.tags.edit', $tag))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_tag()
    {
        $this->actingAsAdmin();

        $tag = Tag::factory()->create();

        $response = $this->put(
            route('dashboard.tags.update', $tag),
            Tag::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $tag->refresh();

        $response->assertRedirect();

        $this->assertEquals($tag->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_tag()
    {
        $this->actingAsAdmin();

        $tag = Tag::factory()->create();

        $tagsCount = Tag::count();

        $response = $this->delete(route('dashboard.tags.destroy', $tag));

        $response->assertRedirect();

        $this->assertEquals(Tag::count(), $tagsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_tags()
    {
        if (! $this->useSoftDeletes($model = Tag::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Tag::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.tags.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_tag_details()
    {
        if (! $this->useSoftDeletes($model = Tag::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $tag = Tag::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.tags.trashed.show', $tag));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_tag()
    {
        if (! $this->useSoftDeletes($model = Tag::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $tag = Tag::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.tags.restore', $tag));

        $response->assertRedirect();

        $this->assertNull($tag->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_tag()
    {
        if (! $this->useSoftDeletes($model = Tag::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $tag = Tag::factory()->create(['deleted_at' => now()]);

        $tagCount = Tag::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.tags.forceDelete', $tag));

        $response->assertRedirect();

        $this->assertEquals(Tag::withoutTrashed()->count(), $tagCount - 1);
    }

    /** @test */
    public function it_can_filter_tags_by_name()
    {
        $this->actingAsAdmin();

        Tag::factory()->create([
            'name' => 'Foo',
        ]);

        Tag::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.tags.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('tags.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
