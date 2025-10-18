<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_sliders()
    {
        $this->actingAsAdmin();

        Slider::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.sliders.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_slider_details()
    {
        $this->actingAsAdmin();

        $slider = Slider::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.sliders.show', $slider))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_sliders_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.sliders.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_slider()
    {
        $this->actingAsAdmin();

        $slidersCount = Slider::count();

        $response = $this->post(
            route('dashboard.sliders.store'),
            Slider::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $slider = Slider::all()->last();

        $this->assertEquals(Slider::count(), $slidersCount + 1);

        $this->assertEquals($slider->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_sliders_edit_form()
    {
        $this->actingAsAdmin();

        $slider = Slider::factory()->create();

        $this->get(route('dashboard.sliders.edit', $slider))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_slider()
    {
        $this->actingAsAdmin();

        $slider = Slider::factory()->create();

        $response = $this->put(
            route('dashboard.sliders.update', $slider),
            Slider::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $slider->refresh();

        $response->assertRedirect();

        $this->assertEquals($slider->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_slider()
    {
        $this->actingAsAdmin();

        $slider = Slider::factory()->create();

        $slidersCount = Slider::count();

        $response = $this->delete(route('dashboard.sliders.destroy', $slider));

        $response->assertRedirect();

        $this->assertEquals(Slider::count(), $slidersCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_sliders()
    {
        if (! $this->useSoftDeletes($model = Slider::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Slider::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.sliders.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_slider_details()
    {
        if (! $this->useSoftDeletes($model = Slider::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $slider = Slider::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.sliders.trashed.show', $slider));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_slider()
    {
        if (! $this->useSoftDeletes($model = Slider::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $slider = Slider::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.sliders.restore', $slider));

        $response->assertRedirect();

        $this->assertNull($slider->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_slider()
    {
        if (! $this->useSoftDeletes($model = Slider::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $slider = Slider::factory()->create(['deleted_at' => now()]);

        $sliderCount = Slider::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.sliders.forceDelete', $slider));

        $response->assertRedirect();

        $this->assertEquals(Slider::withoutTrashed()->count(), $sliderCount - 1);
    }

    /** @test */
    public function it_can_filter_sliders_by_name()
    {
        $this->actingAsAdmin();

        Slider::factory()->create([
            'name' => 'Foo',
        ]);

        Slider::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.sliders.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('sliders.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
