<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontTest extends TestCase
{

    /** @test */
    public function front_return_a_200_with_default_message(): void
    {
        $reponse = $this->get('/');
        $reponse->assertStatus(200)->assertSee('Bemember API');
    }

}
