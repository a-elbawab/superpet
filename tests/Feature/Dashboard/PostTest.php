<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_posts()
    {
        $this->actingAsAdmin();

        Post::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.posts.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_post_details()
    {
        $this->actingAsAdmin();

        $post = Post::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.posts.show', $post))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_posts_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.posts.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_post()
    {
        $this->actingAsAdmin();

        $postsCount = Post::count();

        $response = $this->post(
            route('dashboard.posts.store'),
            Post::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $post = Post::all()->last();

        $this->assertEquals(Post::count(), $postsCount + 1);

        $this->assertEquals($post->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_posts_edit_form()
    {
        $this->actingAsAdmin();

        $post = Post::factory()->create();

        $this->get(route('dashboard.posts.edit', $post))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_post()
    {
        $this->actingAsAdmin();

        $post = Post::factory()->create();

        $response = $this->put(
            route('dashboard.posts.update', $post),
            Post::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $post->refresh();

        $response->assertRedirect();

        $this->assertEquals($post->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_post()
    {
        $this->actingAsAdmin();

        $post = Post::factory()->create();

        $postsCount = Post::count();

        $response = $this->delete(route('dashboard.posts.destroy', $post));

        $response->assertRedirect();

        $this->assertEquals(Post::count(), $postsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_posts()
    {
        if (! $this->useSoftDeletes($model = Post::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Post::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.posts.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_post_details()
    {
        if (! $this->useSoftDeletes($model = Post::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $post = Post::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.posts.trashed.show', $post));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_post()
    {
        if (! $this->useSoftDeletes($model = Post::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $post = Post::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.posts.restore', $post));

        $response->assertRedirect();

        $this->assertNull($post->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_post()
    {
        if (! $this->useSoftDeletes($model = Post::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $post = Post::factory()->create(['deleted_at' => now()]);

        $postCount = Post::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.posts.forceDelete', $post));

        $response->assertRedirect();

        $this->assertEquals(Post::withoutTrashed()->count(), $postCount - 1);
    }

    /** @test */
    public function it_can_filter_posts_by_name()
    {
        $this->actingAsAdmin();

        Post::factory()->create([
            'name' => 'Foo',
        ]);

        Post::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.posts.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('posts.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
