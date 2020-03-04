<?php declare(strict_types=1);

namespace DemigrantSoft\ClockInBot\Domain\Model\User\Aggregate\Settings\ValueObject;

use DemigrantSoft\ClockInBot\Infrastructure\Service\CheckIn\Ocean\OceanClient;
use Pccomponentes\Ddd\Domain\Model\ValueObject\EnumValueObject;

final class ClockInPlatform extends EnumValueObject
{
    public const PLATFORM_OCEAN = OceanClient::PLATFORM;

    protected static $allowedValues = [self::PLATFORM_OCEAN];

    public function isOcean(): bool
    {
        return $this->value() === self::PLATFORM_OCEAN;
    }
}