<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_product()
    {
        $user = User::factory()->create();

        $payload = [
            'name' => 'Kemeja Oxford',
            'price' => 199000,
            'stock' => 12,
        ];

        $response = $this->actingAs($user)
            ->post(route('products.store'), $payload);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', $payload);
    }

    public function test_user_can_update_product()
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'Sneakers',
            'price' => 350000,
            'stock' => 7,
        ]);

        $payload = [
            'name' => 'Sneakers Pro',
            'price' => 399000,
            'stock' => 9,
        ];

        $response = $this->actingAs($user)
            ->put(route('products.update', $product), $payload);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', array_merge(['id' => $product->id], $payload));
    }
}
