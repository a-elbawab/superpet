<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_sections()
    {
        $this->actingAsAdmin();

        Section::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.sections.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_section_details()
    {
        $this->actingAsAdmin();

        $section = Section::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.sections.show', $section))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_sections_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.sections.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_section()
    {
        $this->actingAsAdmin();

        $sectionsCount = Section::count();

        $response = $this->post(
            route('dashboard.sections.store'),
            Section::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $section = Section::all()->last();

        $this->assertEquals(Section::count(), $sectionsCount + 1);

        $this->assertEquals($section->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_sections_edit_form()
    {
        $this->actingAsAdmin();

        $section = Section::factory()->create();

        $this->get(route('dashboard.sections.edit', $section))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_section()
    {
        $this->actingAsAdmin();

        $section = Section::factory()->create();

        $response = $this->put(
            route('dashboard.sections.update', $section),
            Section::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $section->refresh();

        $response->assertRedirect();

        $this->assertEquals($section->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_section()
    {
        $this->actingAsAdmin();

        $section = Section::factory()->create();

        $sectionsCount = Section::count();

        $response = $this->delete(route('dashboard.sections.destroy', $section));

        $response->assertRedirect();

        $this->assertEquals(Section::count(), $sectionsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_sections()
    {
        if (! $this->useSoftDeletes($model = Section::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Section::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.sections.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_section_details()
    {
        if (! $this->useSoftDeletes($model = Section::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $section = Section::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.sections.trashed.show', $section));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_section()
    {
        if (! $this->useSoftDeletes($model = Section::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $section = Section::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.sections.restore', $section));

        $response->assertRedirect();

        $this->assertNull($section->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_section()
    {
        if (! $this->useSoftDeletes($model = Section::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $section = Section::factory()->create(['deleted_at' => now()]);

        $sectionCount = Section::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.sections.forceDelete', $section));

        $response->assertRedirect();

        $this->assertEquals(Section::withoutTrashed()->count(), $sectionCount - 1);
    }

    /** @test */
    public function it_can_filter_sections_by_name()
    {
        $this->actingAsAdmin();

        Section::factory()->create([
            'name' => 'Foo',
        ]);

        Section::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.sections.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('sections.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
