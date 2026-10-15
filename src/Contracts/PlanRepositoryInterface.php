<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Contracts;

use Ttpryg\SubscriptionEngine\Entities\Plan;

interface PlanRepositoryInterface
{
    public function save(Plan $plan): void;

    public function findById(string $id): ?Plan;

    /** @return Plan[] */
    public function findActive(?string $storeId = null): array;
}
