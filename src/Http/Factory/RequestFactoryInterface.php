<?php

namespace AndrewGos\DoubleGis\Http\Factory;

use AndrewGos\DoubleGis\ValueObject\AuthToken;
use Psr\Http\Message\RequestInterface;

interface RequestFactoryInterface
{
    /**
     * @param AuthToken $token
     * @param string $method calling method (ex. getMe)
     * @param array $data
     *
     * @return mixed
     */
    public function createRequest(AuthToken $token, string $method, array $data): RequestInterface;
}
