<?php declare(strict_types=1);

namespace DemigrantSoft\ClockInBot\Model\Shared\ValueObject;

abstract class FloatValueObject implements ValueObject
{
    private $value;

    protected function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function equalTo(FloatValueObject $other): bool
    {
        return \get_class($other) === static::class && $other->value === $this->value;
    }

    public function isBiggerThan(FloatValueObject $other): bool
    {
        return \get_class($other) === static::class && $this->value > $other->value;
    }

    final public function jsonSerialize(): float
    {
        return $this->value;
    }

    public static function from(float $value)
    {
        return new static($value);
    }
}
