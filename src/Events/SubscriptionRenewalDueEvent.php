<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Events;

use Ttpryg\SubscriptionEngine\Entities\Subscription;
use Ttpryg\SubscriptionEngine\Entities\SubscriptionInvoice;

/**
 * Dispatched whenever a new invoice must be charged. Listen to this event to
 * trigger a charge via your payment gateway (e.g. ttpryg/payment-engine),
 * then call SubscriptionService::recordPayment() / recordPaymentFailure().
 */
class SubscriptionRenewalDueEvent extends SubscriptionEvent
{
    public function __construct(
        Subscription $subscription,
        public readonly SubscriptionInvoice $invoice
    ) {
        parent::__construct($subscription);
    }
}
