<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Subscription;
use Ttpryg\SubscriptionEngine\Entities\SubscriptionInvoice;

class SubscriptionRenewedEvent extends SubscriptionEvent
{
    public function __construct(
        Subscription $subscription,
        public readonly SubscriptionInvoice $invoice
    ) {
        parent::__construct($subscription);
    }
}
