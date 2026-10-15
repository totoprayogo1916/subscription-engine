<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Subscription;
use Ttpryg\SubscriptionEngine\Entities\SubscriptionInvoice;

class SubscriptionPaymentFailedEvent extends SubscriptionEvent
{
    public function __construct(
        Subscription $subscription,
        public readonly SubscriptionInvoice $invoice,
        public readonly ?string $reason = null
    ) {
        parent::__construct($subscription);
    }
}
