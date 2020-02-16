<?php

namespace Tests\Feature;

use Bemember\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_return_a_401_with_unauthenticated_message(): void
    {
        $response = $this->get('/api/auth/unauthenticated');
        $response->assertStatus(401)->assertJsonStructure(['error']);
    }

    /** @test */
    public function login_invalid_credentials_must_return_a_json(): void
    {
        $response = $this->post('/api/auth/login');
        $response->assertStatus(422)->assertJsonStructure(['errors', 'message']);
    }

    /** @test */
    public function login_success_return_a_token(): void
    {
        $user = \factory(User::class)->create();
        $response = $this->post('/api/auth/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertStatus(200)->assertJsonStructure(['token']);
    }

}
