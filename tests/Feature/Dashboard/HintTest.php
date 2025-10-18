<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Hint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HintTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_hints()
    {
        $this->actingAsAdmin();

        Hint::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.hints.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_hint_details()
    {
        $this->actingAsAdmin();

        $hint = Hint::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.hints.show', $hint))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_hints_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.hints.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_hint()
    {
        $this->actingAsAdmin();

        $hintsCount = Hint::count();

        $response = $this->post(
            route('dashboard.hints.store'),
            Hint::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $hint = Hint::all()->last();

        $this->assertEquals(Hint::count(), $hintsCount + 1);

        $this->assertEquals($hint->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_hints_edit_form()
    {
        $this->actingAsAdmin();

        $hint = Hint::factory()->create();

        $this->get(route('dashboard.hints.edit', $hint))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_hint()
    {
        $this->actingAsAdmin();

        $hint = Hint::factory()->create();

        $response = $this->put(
            route('dashboard.hints.update', $hint),
            Hint::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $hint->refresh();

        $response->assertRedirect();

        $this->assertEquals($hint->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_hint()
    {
        $this->actingAsAdmin();

        $hint = Hint::factory()->create();

        $hintsCount = Hint::count();

        $response = $this->delete(route('dashboard.hints.destroy', $hint));

        $response->assertRedirect();

        $this->assertEquals(Hint::count(), $hintsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_hints()
    {
        if (! $this->useSoftDeletes($model = Hint::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Hint::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.hints.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_hint_details()
    {
        if (! $this->useSoftDeletes($model = Hint::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $hint = Hint::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.hints.trashed.show', $hint));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_hint()
    {
        if (! $this->useSoftDeletes($model = Hint::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $hint = Hint::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.hints.restore', $hint));

        $response->assertRedirect();

        $this->assertNull($hint->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_hint()
    {
        if (! $this->useSoftDeletes($model = Hint::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $hint = Hint::factory()->create(['deleted_at' => now()]);

        $hintCount = Hint::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.hints.forceDelete', $hint));

        $response->assertRedirect();

        $this->assertEquals(Hint::withoutTrashed()->count(), $hintCount - 1);
    }

    /** @test */
    public function it_can_filter_hints_by_name()
    {
        $this->actingAsAdmin();

        Hint::factory()->create([
            'name' => 'Foo',
        ]);

        Hint::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.hints.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('hints.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
