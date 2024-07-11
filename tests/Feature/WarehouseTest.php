<?php

namespace Tests\Feature;

use App\Models\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WarehouseTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_all_warehouses()
    {
        $warehouses = Warehouse::factory(5)->create();

        $this->get(route('warehouses.index'))
            ->assertOk()
            ->assertViewIs('warehouses.index')
            ->assertViewHas('warehouses', $warehouses->toArray());
    }

    public function test_user_can_view_create_form()
    {
        $this->get(route('warehouses.create'))
            ->assertOk()
            ->assertViewIs('warehouses.create');
    }

    public function test_user_can_create_warehouse()
    {
        $warehouse = Warehouse::factory()->make();

        $this->post(route('warehouses.store'), $warehouse->toArray())
            ->assertRedirect(route('warehouses.index'));

        $this->assertDatabaseHas('warehouses', $warehouse->toArray());
    }

    public function test_user_can_view_update_form()
    {
        $warehouse = Warehouse::factory()->create();

        $this->get(route('warehouses.edit', $warehouse->id))
            ->assertOk()
            ->assertViewIs('warehouses.edit');
    }

    public function test_user_can_update_warehouse()
    {
        $warehouse = Warehouse::factory()->create();

        $updatedWarehouse = Warehouse::factory()->make()->toArray();

        $this->put(route('warehouses.update', $warehouse->id), $updatedWarehouse)
            ->assertRedirect(route('warehouses.index'));

        $this->assertDatabaseHas('warehouses', $updatedWarehouse);
    }

    public function test_user_can_delete_warehouse()
    {
        $warehouse = Warehouse::factory()->create();

        $this->delete(route('warehouses.destroy', $warehouse->id))
            ->assertRedirect(route('warehouses.index'));

        $this->assertDatabaseMissing('warehouses', $warehouse->toArray());
    }
}
