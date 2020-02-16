<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontTest extends TestCase
{

    /** @test */
    public function front_return_a_200_with_default_message(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200)->assertSee('Bemember API');
    }

}
