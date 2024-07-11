<?php

namespace AndrewGos\DoubleGis\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use InvalidArgumentException;

#[CanBeBuiltFromScalar]
readonly class Id
{
    public function __construct(
        private string $id,
    ) {
        if (!preg_match('/^([1-9]{1}[0-9]*)(_([a-zA-Z0-9-]+))?$/', $this->id)) {
            throw new InvalidArgumentException('Invalid id: ' . $id);
        }
    }

    public function getId(): string
    {
        return $this->id;
    }
}
