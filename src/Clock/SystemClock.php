<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Clock;

use DateTimeImmutable;
use Ttpryg\SubscriptionEngine\Contracts\ClockInterface;

final class SystemClock implements ClockInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable;
    }
}
