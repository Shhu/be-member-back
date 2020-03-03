<?php

namespace Tests\Unit;

use Bemember\Organization\Models\Organization;
use Bemember\Subscription\Models\Subscription;
use Bemember\User\Models\User;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function user_can_have_subscribtion(): void
    {
        $user = \factory(User::class)->create();
        $subscription = \factory(Subscription::class)->make();
        /** @var $user User */
        $user->attachSubscription($subscription);
        $this->assertDatabaseHas('subscriptions', ['subscriptionable_id' => $user->id, 'subscriptionable_type' => User::class]);
    }

    /** @test */
    public function organization_can_have_subscribtion(): void
    {
        $organisation = \factory(Organization::class)->create();
        $subscription = \factory(Subscription::class)->make();
        /** @var $organisation Organization */
        $organisation->attachSubscription($subscription);
        $this->assertDatabaseHas('subscriptions', ['subscriptionable_id' => $organisation->id, 'subscriptionable_type' => Organization::class]);
    }

    /** @test */
    public function start_at_and_end_at_are_carbon_object(): void
    {
        $user = \factory(User::class)->create();
        /** @var $user User */
        $subscription = $user->attachSubscription(\factory(Subscription::class)->make());
        $this->assertInstanceOf(Carbon::class, $subscription->start_at);
        $this->assertInstanceOf(Carbon::class, $subscription->end_at);
    }
}
