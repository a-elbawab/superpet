<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_invoices()
    {
        $this->actingAsAdmin();

        Invoice::factory()->count(2)->create();

        $this->getJson(route('api.invoices.index'))
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
    public function test_invoices_select2_api()
    {
        Invoice::factory()->count(5)->create();

        $response = $this->getJson(route('api.invoices.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.invoices.select', ['selected_id' => 4]))
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
    public function it_can_display_the_invoice_details()
    {
        $this->actingAsAdmin();

        $invoice = Invoice::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.invoices.show', $invoice))
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
