<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_bookings()
    {
        $this->actingAsAdmin();

        Booking::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.bookings.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_booking_details()
    {
        $this->actingAsAdmin();

        $booking = Booking::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.bookings.show', $booking))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_bookings_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.bookings.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_booking()
    {
        $this->actingAsAdmin();

        $bookingsCount = Booking::count();

        $response = $this->post(
            route('dashboard.bookings.store'),
            Booking::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $booking = Booking::all()->last();

        $this->assertEquals(Booking::count(), $bookingsCount + 1);

        $this->assertEquals($booking->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_bookings_edit_form()
    {
        $this->actingAsAdmin();

        $booking = Booking::factory()->create();

        $this->get(route('dashboard.bookings.edit', $booking))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_booking()
    {
        $this->actingAsAdmin();

        $booking = Booking::factory()->create();

        $response = $this->put(
            route('dashboard.bookings.update', $booking),
            Booking::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $booking->refresh();

        $response->assertRedirect();

        $this->assertEquals($booking->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_booking()
    {
        $this->actingAsAdmin();

        $booking = Booking::factory()->create();

        $bookingsCount = Booking::count();

        $response = $this->delete(route('dashboard.bookings.destroy', $booking));

        $response->assertRedirect();

        $this->assertEquals(Booking::count(), $bookingsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_bookings()
    {
        if (! $this->useSoftDeletes($model = Booking::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Booking::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.bookings.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_booking_details()
    {
        if (! $this->useSoftDeletes($model = Booking::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $booking = Booking::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.bookings.trashed.show', $booking));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_booking()
    {
        if (! $this->useSoftDeletes($model = Booking::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $booking = Booking::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.bookings.restore', $booking));

        $response->assertRedirect();

        $this->assertNull($booking->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_booking()
    {
        if (! $this->useSoftDeletes($model = Booking::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $booking = Booking::factory()->create(['deleted_at' => now()]);

        $bookingCount = Booking::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.bookings.forceDelete', $booking));

        $response->assertRedirect();

        $this->assertEquals(Booking::withoutTrashed()->count(), $bookingCount - 1);
    }

    /** @test */
    public function it_can_filter_bookings_by_name()
    {
        $this->actingAsAdmin();

        Booking::factory()->create([
            'name' => 'Foo',
        ]);

        Booking::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.bookings.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('bookings.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
