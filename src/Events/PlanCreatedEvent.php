<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Plan;

class PlanCreatedEvent
{
    public function __construct(public readonly Plan $plan) {}
}
