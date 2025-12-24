<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user and authenticate for tests that require authentication
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_products_index_can_be_rendered()
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
    }

    public function test_products_can_be_listed()
    {
        Product::factory()->count(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertStatus(200)
                 ->assertViewHas('products');
    }

    public function test_product_create_form_can_be_rendered()
    {
        Category::factory()->create();

        $response = $this->get(route('products.create'));

        $response->assertStatus(200)
                 ->assertViewHas('categories');
    }

    public function test_product_can_be_created()
    {
        $category = Category::factory()->create();

        $productData = [
            'nombre' => 'Test Product',
            'precio' => 99.99,
            'stock' => 10,
            'estado' => true,
            'category_id' => $category->id,
        ];

        $response = $this->post(route('products.store'), $productData);

        $response->assertRedirect(route('products.index'))
                 ->assertSessionHas('success');

        $this->assertDatabaseHas('products', $productData);
    }

    public function test_product_creation_requires_validation()
    {
        $response = $this->post(route('products.store'), []);

        $response->assertRedirect()
                 ->assertSessionHasErrors(['nombre', 'precio', 'stock']);
    }

    public function test_product_edit_form_can_be_rendered()
    {
        $product = Product::factory()->create();
        Category::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response->assertStatus(200)
                 ->assertViewHas(['product', 'categories']);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        $updatedData = [
            'nombre' => 'Updated Product',
            'precio' => 149.99,
            'stock' => 20,
            'estado' => false,
            'category_id' => $category->id,
        ];

        $response = $this->put(route('products.update', $product), $updatedData);

        $response->assertRedirect(route('products.index'))
                 ->assertSessionHas('success');

        $this->assertDatabaseHas('products', $updatedData);
    }

    public function test_product_update_requires_validation()
    {
        $product = Product::factory()->create();

        $response = $this->put(route('products.update', $product), []);

        $response->assertRedirect()
                 ->assertSessionHasErrors(['nombre', 'precio', 'stock']);
    }

    public function test_product_can_be_deleted()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'))
                 ->assertSessionHas('success');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
