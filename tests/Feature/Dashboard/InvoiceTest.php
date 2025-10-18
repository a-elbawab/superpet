<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_invoices()
    {
        $this->actingAsAdmin();

        Invoice::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.invoices.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_invoice_details()
    {
        $this->actingAsAdmin();

        $invoice = Invoice::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.invoices.show', $invoice))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_invoices_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.invoices.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_invoice()
    {
        $this->actingAsAdmin();

        $invoicesCount = Invoice::count();

        $response = $this->post(
            route('dashboard.invoices.store'),
            Invoice::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $invoice = Invoice::all()->last();

        $this->assertEquals(Invoice::count(), $invoicesCount + 1);

        $this->assertEquals($invoice->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_invoices_edit_form()
    {
        $this->actingAsAdmin();

        $invoice = Invoice::factory()->create();

        $this->get(route('dashboard.invoices.edit', $invoice))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_invoice()
    {
        $this->actingAsAdmin();

        $invoice = Invoice::factory()->create();

        $response = $this->put(
            route('dashboard.invoices.update', $invoice),
            Invoice::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $invoice->refresh();

        $response->assertRedirect();

        $this->assertEquals($invoice->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_invoice()
    {
        $this->actingAsAdmin();

        $invoice = Invoice::factory()->create();

        $invoicesCount = Invoice::count();

        $response = $this->delete(route('dashboard.invoices.destroy', $invoice));

        $response->assertRedirect();

        $this->assertEquals(Invoice::count(), $invoicesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_invoices()
    {
        if (! $this->useSoftDeletes($model = Invoice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Invoice::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.invoices.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_invoice_details()
    {
        if (! $this->useSoftDeletes($model = Invoice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $invoice = Invoice::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.invoices.trashed.show', $invoice));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_invoice()
    {
        if (! $this->useSoftDeletes($model = Invoice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $invoice = Invoice::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.invoices.restore', $invoice));

        $response->assertRedirect();

        $this->assertNull($invoice->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_invoice()
    {
        if (! $this->useSoftDeletes($model = Invoice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $invoice = Invoice::factory()->create(['deleted_at' => now()]);

        $invoiceCount = Invoice::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.invoices.forceDelete', $invoice));

        $response->assertRedirect();

        $this->assertEquals(Invoice::withoutTrashed()->count(), $invoiceCount - 1);
    }

    /** @test */
    public function it_can_filter_invoices_by_name()
    {
        $this->actingAsAdmin();

        Invoice::factory()->create([
            'name' => 'Foo',
        ]);

        Invoice::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.invoices.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('invoices.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
