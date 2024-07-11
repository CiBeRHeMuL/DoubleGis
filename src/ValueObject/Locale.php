<?php

namespace AndrewGos\DoubleGis\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use InvalidArgumentException;

#[CanBeBuiltFromScalar]
readonly class Locale
{
    public function __construct(
        private string $locale,
    ) {
        if (
            !preg_match(
                '/^([a-z]{2})_([A-Z]{2})$/i',
                $this->locale,
            )
        ) {
            throw new InvalidArgumentException('Invalid locale representation');
        }
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}
