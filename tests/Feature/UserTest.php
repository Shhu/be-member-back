<?php

namespace Tests\Feature;

use Bemember\User\Models\User;
use Bemember\User\Models\Profile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserTest extends TestCase
{
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
        $user = \factory(User::class)->create();
        $user->givePermissionTo('admin');

        $response = $this->json('GET', '/api/user', [], ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    /** @test */
    public function user_must_have_profile(): void
    {
        $user = \factory(User::class)->create();

        $this->assertInstanceOf(Profile::class, $user->profile);
    }
}
