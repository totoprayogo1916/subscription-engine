<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Subscription;

class SubscriptionPlanChangedEvent extends SubscriptionEvent
{
    public function __construct(
        Subscription $subscription,
        public readonly string $fromPlanId,
        public readonly string $toPlanId
    ) {
        parent::__construct($subscription);
    }
}
