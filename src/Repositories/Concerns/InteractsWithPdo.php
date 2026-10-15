<?php

declare(strict_types=1);

namespace Ttpryg\SubscriptionEngine\Repositories\Concerns;

use DateTimeImmutable;
use PDO;

/** Shared helpers for PDO repositories (portable across MariaDB/MySQL/SQLite). */
trait InteractsWithPdo
{
    private static function toDb(?DateTimeImmutable $date): ?string
    {
        return $date?->format('Y-m-d H:i:s');
    }

    private static function fromDb(?string $value): ?DateTimeImmutable
    {
        return $value === null ? null : new DateTimeImmutable($value);
    }

    /**
     * Portable upsert: UPDATE when the row exists, INSERT otherwise.
     *
     * @param  array<string, mixed>  $data
     */
    private function upsert(PDO $pdo, string $table, array $data): void
    {
        $exists = $pdo->prepare(sprintf('SELECT 1 FROM %s WHERE id = :id', $table));
        $exists->execute(['id' => $data['id']]);

        $columns = array_keys($data);

        if ($exists->fetchColumn() !== false) {
            $sets = implode(', ', array_map(static fn (string $c): string => sprintf('%s = :%s', $c, $c), array_diff($columns, ['id'])));
            $sql = sprintf('UPDATE %s SET %s WHERE id = :id', $table, $sets);
        } else {
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $table,
                implode(', ', $columns),
                implode(', ', array_map(static fn (string $c): string => ':'.$c, $columns))
            );
        }

        $pdo->prepare($sql)->execute($data);
    }
}
