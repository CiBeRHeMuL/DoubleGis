<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

#[AvailableInheritors([
    ObjectMarker::class,
    CoordinatesMarker::class,
])]
abstract class AbstractMarker implements EntityInterface
{
    public function __construct(
        protected readonly string $type,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }
}
