<?php

namespace AndrewGos\DoubleGis\Response;

use AndrewGos\DoubleGis\Entity\Meta;
use AndrewGos\DoubleGis\Result\RegionResult;

readonly class RegionResponse implements ResponseInterface
{
    public function __construct(
        private Meta $meta,
        private RegionResult|null $result = null,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function getResult(): RegionResult|null
    {
        return $this->result;
    }
}
