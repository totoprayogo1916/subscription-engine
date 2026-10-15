<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Subscription;

/** Base class for all subscription lifecycle events. */
abstract class SubscriptionEvent
{
    public function __construct(public readonly Subscription $subscription) {}
}
