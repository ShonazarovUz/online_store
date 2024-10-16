<?php

// namespace Tests\Feature;

// use App\Models\Category;
// use App\Models\Comment;
// use App\Models\User;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Laravel\Sanctum\Sanctum;
// use PHPUnit\Framework\Attributes\Test;
// use Tests\TestCase;

// class UserControllerTest extends TestCase
// {
//     use RefreshDatabase;

//     protected function setUp(): void
//     {
//         parent::setUp();

//         // Create a user and authenticate
//         $user = User::factory()->create();
//         Sanctum::actingAs($user);
//         Comment::query()->delete(); // Foydalanuvchilar bilan bog'liq bo'lgan jadvallarni birinchi o'chirib oling
//         User::query()->delete();

//     }

//     public function test_index_returns_successful_response()
//     {
//         User::factory(3)->create();

//         $response = $this->getJson('/api/users');

//         $response->assertStatus(200)
//                  ->assertJsonCount(3);
//     }

//     public function test_store_creates_new_User()
//     {
//         $response = $this->postJson('/api/users', [
//             'name' => 'New User',
//             'email' => 'example@email.com',
//             'password' => 'password123',

//         ]);

//         $response->assertStatus(201)
//                  ->assertJsonFragment(['name' => 'User']);
//     }

//     public function test_store_fails_with_invalid_data()
//     {
//         $response = $this->postJson('/api/users', [
//             'name' => '', // Invalid name
//         ]);

//         $response->assertStatus(422)
//                  ->assertJsonValidationErrors('name');
//     }

//     public function test_show_returns_User()
//     {
//         $User = User::factory()->create();

//         $response = $this->getJson("/api/users/$User->id");

//         $response->assertStatus(200)
//                  ->assertJsonFragment(['name' => $User->name]);
//     }

//     public function test_show_fails_for_nonexistent_user()
//     {
//         $response = $this->getJson('/api/users/9999');

//         $response->assertStatus(404);
//     }

//     public function test_update_modifies_existing_user()
//     {
//         $user = user::factory()->create();

//         $response = $this->putJson("/api/users/{$user->id}", [
//             'name' => 'Updated user',
//         ]);

//         $response->assertStatus(200)
//                  ->assertJsonFragment(['name' => 'Updated user']);
//     }

//     public function test_update_fails_with_invalid_data()
//     {
//         $user = user::factory()->create();

//         $response = $this->putJson("/api/users/{$user->id}", [
//             'name' => '', // Invalid name
//         ]);

//         $response->assertStatus(422)
//         ->assertJsonValidationErrors('name');

//     }

//     public function test_destroy_removes_user()
//     {
//         $user = user::factory()->create();

//         $response = $this->deleteJson("/api/users/{$user->id}");

//         $response->assertStatus(204);
//         $this->assertDatabaseMissing('Users', ['id' => $user->id]);
//     }

//     public function test_destroy_fails_for_nonexistent_user()
//     {
//         $response = $this->deleteJson('/api/Users/999');

//         $response->assertStatus(404);
//     }
// }
