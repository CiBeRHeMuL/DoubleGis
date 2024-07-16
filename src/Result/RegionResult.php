<?php

namespace AndrewGos\DoubleGis\Result;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Entity\Region;

readonly class RegionResult
{
    /**
     * @param int $total Количество найденных объектов.
     * @param Region[] $items Объекты результата.
     */
    public function __construct(
        protected int $total,
        #[ArrayType(Region::class)] protected array $items,
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
