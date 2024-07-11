<?php

namespace AndrewGos\DoubleGis\Result;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Entity\AbstractRubric;

readonly class RubricResult
{
    public function __construct(
        protected int $total,
        #[ArrayType(AbstractRubric::class)] protected array $items,
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
