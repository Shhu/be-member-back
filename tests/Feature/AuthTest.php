<?php

namespace Tests\Feature;

use Bemember\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_return_a_401_with_unauthenticated_message(): void
    {
        $reponse = $this->get('/api/auth/unauthenticated');
        $reponse->assertStatus(401)->assertJsonStructure(['error']);
    }

    /** @test */
    public function invalid_credentials_must_return_a_json(): void
    {
        $reponse = $this->post('/api/auth/login');
        $reponse->assertStatus(422)->assertJsonStructure();
    }

    /** @test */
    public function successfully_authenticated_return_a_token(): void
    {
        $user = \factory(User::class)->create();
        $response = $this->post('/api/auth/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertStatus(200)->assertJsonStructure(['token']);
    }

}
