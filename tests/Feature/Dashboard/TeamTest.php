<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_teams()
    {
        $this->actingAsAdmin();

        Team::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.teams.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_team_details()
    {
        $this->actingAsAdmin();

        $team = Team::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.teams.show', $team))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_teams_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.teams.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_team()
    {
        $this->actingAsAdmin();

        $teamsCount = Team::count();

        $response = $this->post(
            route('dashboard.teams.store'),
            Team::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $team = Team::all()->last();

        $this->assertEquals(Team::count(), $teamsCount + 1);

        $this->assertEquals($team->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_teams_edit_form()
    {
        $this->actingAsAdmin();

        $team = Team::factory()->create();

        $this->get(route('dashboard.teams.edit', $team))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_team()
    {
        $this->actingAsAdmin();

        $team = Team::factory()->create();

        $response = $this->put(
            route('dashboard.teams.update', $team),
            Team::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $team->refresh();

        $response->assertRedirect();

        $this->assertEquals($team->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_team()
    {
        $this->actingAsAdmin();

        $team = Team::factory()->create();

        $teamsCount = Team::count();

        $response = $this->delete(route('dashboard.teams.destroy', $team));

        $response->assertRedirect();

        $this->assertEquals(Team::count(), $teamsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_teams()
    {
        if (! $this->useSoftDeletes($model = Team::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Team::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.teams.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_team_details()
    {
        if (! $this->useSoftDeletes($model = Team::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $team = Team::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.teams.trashed.show', $team));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_team()
    {
        if (! $this->useSoftDeletes($model = Team::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $team = Team::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.teams.restore', $team));

        $response->assertRedirect();

        $this->assertNull($team->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_team()
    {
        if (! $this->useSoftDeletes($model = Team::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $team = Team::factory()->create(['deleted_at' => now()]);

        $teamCount = Team::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.teams.forceDelete', $team));

        $response->assertRedirect();

        $this->assertEquals(Team::withoutTrashed()->count(), $teamCount - 1);
    }

    /** @test */
    public function it_can_filter_teams_by_name()
    {
        $this->actingAsAdmin();

        Team::factory()->create([
            'name' => 'Foo',
        ]);

        Team::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.teams.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('teams.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
