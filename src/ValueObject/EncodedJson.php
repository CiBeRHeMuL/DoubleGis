<?php

namespace AndrewGos\DoubleGis\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use InvalidArgumentException;
use JsonException;

/**
 * Закодированный json
 */
#[CanBeBuiltFromScalar]
readonly class EncodedJson
{
    private string $json;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(
        string $json,
    ) {
        try {
            json_decode($json, flags: JSON_THROW_ON_ERROR);
            $this->json = $json;
        } catch (JsonException) {
            throw new InvalidArgumentException('Cannot build ' . self::class . ': invalid json representation');
        }
    }

    public function getJson(): string
    {
        return $this->json;
    }
}
