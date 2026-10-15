<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Exceptions;

use RuntimeException;

class PlanNotFoundException extends RuntimeException
{
    public static function withId(string $id): self
    {
        return new self(sprintf('Subscription plan "%s" not found', $id));
    }
}
