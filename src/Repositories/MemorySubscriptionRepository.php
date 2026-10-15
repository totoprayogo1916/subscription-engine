<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Repositories;

use DateTimeImmutable;
use Ttpryg\SubscriptionEngine\Contracts\SubscriptionRepositoryInterface;
use Ttpryg\SubscriptionEngine\Entities\Subscription;
use Ttpryg\SubscriptionEngine\Enums\SubscriptionStatus;

class MemorySubscriptionRepository implements SubscriptionRepositoryInterface
{
    /** @var array<string, Subscription> */
    private array $subscriptions = [];

    public function save(Subscription $subscription): void
    {
        $this->subscriptions[$subscription->id] = $subscription;
    }

    public function findById(string $id): ?Subscription
    {
        return $this->subscriptions[$id] ?? null;
    }

    public function findByUser(string $userId, ?string $storeId = null): array
    {
        return array_values(array_filter(
            $this->subscriptions,
            static fn (Subscription $s): bool => $s->userId === $userId && ($storeId === null || $s->storeId === $storeId)
        ));
    }

    public function findDueForRenewal(DateTimeImmutable $now): array
    {
        $renewable = [SubscriptionStatus::TRIALING, SubscriptionStatus::ACTIVE, SubscriptionStatus::PAST_DUE];

        return array_values(array_filter(
            $this->subscriptions,
            static fn (Subscription $s): bool => in_array($s->status, $renewable, true) && $s->currentPeriodEnd <= $now
        ));
    }
}
