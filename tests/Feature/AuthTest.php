<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{

    /** @test */
    public function unauthenticated_return_a_401_with_unauthenticated_message(): void
    {
        $reponse = $this->get('/api/auth/unauthenticated');
        $reponse->assertStatus(401)->assertSee('Unauthenticated');
    }

}
