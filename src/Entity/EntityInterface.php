<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

interface EntityInterface
{
    public function toArray(): array|stdClass;
}
