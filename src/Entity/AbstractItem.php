<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\DoubleGis\Enum\ItemTypeEnum;

#[AvailableInheritors([
    AdmDivItem::class,
])]
abstract class AbstractItem implements EntityInterface
{
    public function __construct(
        protected readonly ItemTypeEnum $type,
    ) {
    }
}
