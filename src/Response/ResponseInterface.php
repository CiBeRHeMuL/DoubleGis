<?php

namespace AndrewGos\DoubleGis\Response;

use AndrewGos\DoubleGis\Entity\Meta;

interface ResponseInterface
{
    public function getMeta(): Meta;
}
