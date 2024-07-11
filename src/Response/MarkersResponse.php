<?php

namespace AndrewGos\DoubleGis\Response;

use AndrewGos\DoubleGis\Entity\Meta;
use AndrewGos\DoubleGis\Result\MarkersResult;

readonly class MarkersResponse implements ResponseInterface
{
    public function __construct(
        private Meta $meta,
        private MarkersResult|null $result = null,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function getResult(): MarkersResult|null
    {
        return $this->result;
    }
}
