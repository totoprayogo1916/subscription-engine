<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Contracts;

use DateTimeImmutable;
use Ttpryg\SubscriptionEngine\Entities\SubscriptionInvoice;

interface InvoiceRepositoryInterface
{
    public function save(SubscriptionInvoice $invoice): void;

    public function findById(string $id): ?SubscriptionInvoice;

    /** @return SubscriptionInvoice[] */
    public function findBySubscription(string $subscriptionId): array;

    /**
     * Outstanding (PENDING or FAILED) invoices whose due date is at or before $now.
     *
     * @return SubscriptionInvoice[]
     */
    public function findOverdue(DateTimeImmutable $now): array;
}
