<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Input;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InputTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_inputs()
    {
        $this->actingAsAdmin();

        Input::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.inputs.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_input_details()
    {
        $this->actingAsAdmin();

        $input = Input::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.inputs.show', $input))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_inputs_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.inputs.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_input()
    {
        $this->actingAsAdmin();

        $inputsCount = Input::count();

        $response = $this->post(
            route('dashboard.inputs.store'),
            Input::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $input = Input::all()->last();

        $this->assertEquals(Input::count(), $inputsCount + 1);

        $this->assertEquals($input->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_inputs_edit_form()
    {
        $this->actingAsAdmin();

        $input = Input::factory()->create();

        $this->get(route('dashboard.inputs.edit', $input))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_input()
    {
        $this->actingAsAdmin();

        $input = Input::factory()->create();

        $response = $this->put(
            route('dashboard.inputs.update', $input),
            Input::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $input->refresh();

        $response->assertRedirect();

        $this->assertEquals($input->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_input()
    {
        $this->actingAsAdmin();

        $input = Input::factory()->create();

        $inputsCount = Input::count();

        $response = $this->delete(route('dashboard.inputs.destroy', $input));

        $response->assertRedirect();

        $this->assertEquals(Input::count(), $inputsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_inputs()
    {
        if (! $this->useSoftDeletes($model = Input::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Input::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.inputs.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_input_details()
    {
        if (! $this->useSoftDeletes($model = Input::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $input = Input::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.inputs.trashed.show', $input));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_input()
    {
        if (! $this->useSoftDeletes($model = Input::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $input = Input::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.inputs.restore', $input));

        $response->assertRedirect();

        $this->assertNull($input->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_input()
    {
        if (! $this->useSoftDeletes($model = Input::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $input = Input::factory()->create(['deleted_at' => now()]);

        $inputCount = Input::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.inputs.forceDelete', $input));

        $response->assertRedirect();

        $this->assertEquals(Input::withoutTrashed()->count(), $inputCount - 1);
    }

    /** @test */
    public function it_can_filter_inputs_by_name()
    {
        $this->actingAsAdmin();

        Input::factory()->create([
            'name' => 'Foo',
        ]);

        Input::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.inputs.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('inputs.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
