<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\DoubleGis\Enum\RubricTypeEnum;

#[AvailableInheritors([
    Rubric::class,
    GeneralRubric::class,
])]
abstract class AbstractRubric implements EntityInterface
{
    public function __construct(
        protected readonly RubricTypeEnum $type,
    ) {
    }

    public function getType(): RubricTypeEnum
    {
        return $this->type;
    }
}
