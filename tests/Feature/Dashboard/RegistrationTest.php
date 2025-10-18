<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_registrations()
    {
        $this->actingAsAdmin();

        Registration::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.registrations.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_registration_details()
    {
        $this->actingAsAdmin();

        $registration = Registration::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.registrations.show', $registration))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_registrations_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.registrations.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_registration()
    {
        $this->actingAsAdmin();

        $registrationsCount = Registration::count();

        $response = $this->post(
            route('dashboard.registrations.store'),
            Registration::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $registration = Registration::all()->last();

        $this->assertEquals(Registration::count(), $registrationsCount + 1);

        $this->assertEquals($registration->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_registrations_edit_form()
    {
        $this->actingAsAdmin();

        $registration = Registration::factory()->create();

        $this->get(route('dashboard.registrations.edit', $registration))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_registration()
    {
        $this->actingAsAdmin();

        $registration = Registration::factory()->create();

        $response = $this->put(
            route('dashboard.registrations.update', $registration),
            Registration::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $registration->refresh();

        $response->assertRedirect();

        $this->assertEquals($registration->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_registration()
    {
        $this->actingAsAdmin();

        $registration = Registration::factory()->create();

        $registrationsCount = Registration::count();

        $response = $this->delete(route('dashboard.registrations.destroy', $registration));

        $response->assertRedirect();

        $this->assertEquals(Registration::count(), $registrationsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_registrations()
    {
        if (! $this->useSoftDeletes($model = Registration::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Registration::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.registrations.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_registration_details()
    {
        if (! $this->useSoftDeletes($model = Registration::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $registration = Registration::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.registrations.trashed.show', $registration));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_registration()
    {
        if (! $this->useSoftDeletes($model = Registration::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $registration = Registration::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.registrations.restore', $registration));

        $response->assertRedirect();

        $this->assertNull($registration->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_registration()
    {
        if (! $this->useSoftDeletes($model = Registration::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $registration = Registration::factory()->create(['deleted_at' => now()]);

        $registrationCount = Registration::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.registrations.forceDelete', $registration));

        $response->assertRedirect();

        $this->assertEquals(Registration::withoutTrashed()->count(), $registrationCount - 1);
    }

    /** @test */
    public function it_can_filter_registrations_by_name()
    {
        $this->actingAsAdmin();

        Registration::factory()->create([
            'name' => 'Foo',
        ]);

        Registration::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.registrations.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('registrations.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
