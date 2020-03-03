<?php

namespace Tests\Feature;

use Bemember\Subscription\Models\Subscription;
use Bemember\User\Models\User;
use Bemember\User\Models\Profile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function subscriptions_index_require_authentification(): void
    {
        $response = $this->get('/api/subscription');
        $response->assertStatus(401)->assertJsonStructure(['message']);
    }

    /** @test */
    public function subscription_index_require_to_be_admin(): void
    {
        $user = \factory(User::class)->create();
        $subscription = \factory(Subscription::class)->create([ 'user_id' => $user->id ]);
        $user = \factory(User::class)->create();
        $response = $this->get('/api/subscription', ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(403)->assertJsonStructure(['message']);
    }

    /** @test */
    public function admin_can_list_subscriptions(): void
    {
        $this->seed('PermissionsTableSeeder');

        $user = \factory(User::class)->create();
        $subscription = \factory(Subscription::class)->create([ 'user_id' => $user->id ]);
        $user = \factory(User::class)->create();
        $user->givePermissionTo('admin');

        $response = $this->get('/api/subscription', ['Authorization' => 'Bearer ' . $user->createToken('Test Token')->plainTextToken]);
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }
}
