<?php

namespace AndrewGos\DoubleGis\Response;

use AndrewGos\DoubleGis\Entity\Meta;
use AndrewGos\DoubleGis\Result\ItemsResult;

readonly class ItemsResponse implements ResponseInterface
{
    public function __construct(
        private Meta $meta,
        private ItemsResult|null $result = null,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function getResult(): ItemsResult|null
    {
        return $this->result;
    }
}
