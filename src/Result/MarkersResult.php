<?php

namespace AndrewGos\DoubleGis\Result;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Entity\AbstractMarker;

readonly class MarkersResult
{
    /**
     * @param int $total Количество найденных объектов.
     * @param AbstractMarker[] $items Объекты результата.
     */
    public function __construct(
        protected int $total,
        #[ArrayType(AbstractMarker::class)] protected array $items,
    ) {
    }
}
