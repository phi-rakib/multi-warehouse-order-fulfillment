<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_all_products()
    {
        $products = Product::factory(5)->create()->toArray();

        $this->get(route('products.index'))
            ->assertOk()
            ->assertViewIs('products.index')
            ->assertViewHas('products', $products);
    }

    public function test_user_can_view_create_form()
    {
        $this->get(route('products.create'))
            ->assertOk()
            ->assertViewIs('products.create');
    }

    public function test_user_can_store_product()
    {
        $product = Product::factory()->make()->toArray();

        $this->post(route('products.store'), $product)
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $product);
    }

    public function test_user_can_view_edit_form()
    {
        $product = Product::factory()->create();

        $this->get(route('products.edit', $product))
            ->assertOk()
            ->assertViewIs('products.edit');
    }

    public function test_user_can_update_product()
    {
        $product = Product::factory()->create();

        $updatedProduct = Product::factory()->make()->toArray();

        $this->put(route('products.update', $product->id), $updatedProduct)
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [ ...$updatedProduct, 'id' => $product->id]);
    }

    public function test_user_can_delete_product()
    {
        $product = Product::factory()->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
