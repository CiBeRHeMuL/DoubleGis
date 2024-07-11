<?php

namespace AndrewGos\DoubleGis\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use InvalidArgumentException;

#[CanBeBuiltFromScalar]
readonly class Url
{
    /**
     * @param string $url
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        private string $url,
    ) {
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Cannot build ' . self::class . ': invalid url representation');
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
