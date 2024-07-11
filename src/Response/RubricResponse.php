<?php

namespace AndrewGos\DoubleGis\Response;

use AndrewGos\DoubleGis\Entity\Meta;
use AndrewGos\DoubleGis\Result\RubricResult;

readonly class RubricResponse implements ResponseInterface
{
    public function __construct(
        private Meta $meta,
        private RubricResult|null $result = null,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function getResult(): RubricResult|null
    {
        return $this->result;
    }
}
