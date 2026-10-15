<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Contracts;

use DateTimeImmutable;

interface ClockInterface
{
    public function now(): DateTimeImmutable;
}
