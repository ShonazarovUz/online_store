<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user and authenticate
        $user = User::factory()->create();
        Sanctum::actingAs($user);
    }

    public function index_returns_successful_response()
    {
        Category::factory(3)->create();

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data'); // Assumes response has a 'data' key
    }

    public function store_creates_new_category()
    {
        $response = $this->postJson('/api/categories', [
            'name' => 'New Category',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'New Category']);
    }

    public function store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/categories', [
            'name' => '', // Invalid name
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('name');
    }

    public function show_returns_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $category->name]);
    }

    public function show_fails_for_nonexistent_category()
    {
        $response = $this->getJson('/api/categories/9999');

        $response->assertStatus(404);
    }

    public function update_modifies_existing_category()
    {
        $category = Category::factory()->create();

        $response = $this->putJson("/api/categories/{$category->id}", [
            'name' => 'Updated Category',
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Category']);
    }

    public function update_fails_with_invalid_data()
    {
        $category = Category::factory()->create();

        $response = $this->putJson("/api/categories/{$category->id}", [
            'name' => '', // Invalid name
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('name');
    }

    public function destroy_removes_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function destroy_fails_for_nonexistent_category()
    {
        $response = $this->deleteJson('/api/categories/999');

        $response->assertStatus(404);
    }
}
