<?php

namespace Tests\Feature;

use Bemember\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /** @test */
    public function users_index_require_authentification(): void
    {
        $response = $this->json('GET', '/api/user');
        $response->assertStatus(401)->assertJsonStructure(['message']);
    }

    /** @test */
    public function user_index_require_to_be_admin(): void
    {
        $user = \factory(User::class)->create();
        $response = $this->json('GET', '/api/user', [], ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(403)->assertJsonStructure(['message']);
    }

    /** @test */
    public function admin_can_list_users(): void
    {
        $this->seed('PermissionsTableSeeder');

        $user = \factory(User::class)->create();
        $user->givePermissionTo('admin');

        $response = $this->json('GET', '/api/user', [], ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }
}
