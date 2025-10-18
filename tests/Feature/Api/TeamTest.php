<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_teams()
    {
        $this->actingAsAdmin();

        Team::factory()->count(2)->create();

        $this->getJson(route('api.teams.index'))
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
    public function test_teams_select2_api()
    {
        Team::factory()->count(5)->create();

        $response = $this->getJson(route('api.teams.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.teams.select', ['selected_id' => 4]))
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
    public function it_can_display_the_team_details()
    {
        $this->actingAsAdmin();

        $team = Team::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.teams.show', $team))
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
