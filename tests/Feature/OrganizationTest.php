<?php

namespace Tests\Feature;

use Bemember\Organization\Models\Organization;
use Bemember\User\Models\User;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    /** @test */
    public function organizations_index_require_authentification(): void
    {
        $response = $this->get('/api/organization');
        $response->assertStatus(401)->assertJsonStructure(['message']);
    }

    /** @test */
    public function organization_index_require_to_be_admin(): void
    {
        $organization = \factory(Organization::class)->create();
        $user = \factory(User::class)->create();
        $response = $this->get('/api/organization', ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(403)->assertJsonStructure(['message']);
    }

    /** @test */
    public function admin_can_list_organizations(): void
    {
        $organization = \factory(Organization::class)->create();
        $user = \factory(User::class)->create();
        $user->givePermissionTo('admin');

        $response = $this->get('/api/organization', ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }
}
