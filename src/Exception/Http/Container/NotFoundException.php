<?php

namespace AndrewGos\DoubleGis\Exception\Http\Container;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}
