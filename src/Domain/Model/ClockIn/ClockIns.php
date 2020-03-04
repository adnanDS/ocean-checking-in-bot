<?php declare(strict_types=1);

namespace DemigrantSoft\ClockInBot\Model\ClockIn;

use Pccomponentes\Ddd\Domain\Model\ValueObject\CollectionValueObject;

final class ClockIns extends CollectionValueObject
{
    /** @param array<ClockIn> $checkIns */
    public static function from(array $checkIns): self
    {
        self::assert($checkIns);

        return self::from($checkIns);
    }

    /** @param array<ClockIn> $checkIns */
    private static function assert(array $checkIns): void
    {
        \array_walk($checkIns, function ($checkIn): void {
            if (false === $checkIn instanceof ClockIn) {
//                TODO: throw exception
            }
        });
    }
}