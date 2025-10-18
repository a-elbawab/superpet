<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_sections()
    {
        $this->actingAsAdmin();

        Section::factory()->count(2)->create();

        $this->getJson(route('api.sections.index'))
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
    public function test_sections_select2_api()
    {
        Section::factory()->count(5)->create();

        $response = $this->getJson(route('api.sections.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.sections.select', ['selected_id' => 4]))
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
    public function it_can_display_the_section_details()
    {
        $this->actingAsAdmin();

        $section = Section::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.sections.show', $section))
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
