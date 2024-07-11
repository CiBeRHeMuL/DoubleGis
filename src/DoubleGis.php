<?php

namespace AndrewGos\DoubleGis;

use AndrewGos\DoubleGis\Api\ApiInterface;
use AndrewGos\DoubleGis\ValueObject\AuthToken;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class DoubleGis
{
    public function __construct(
        private AuthToken $token,
        private ApiInterface $api,
    ) {
        if ($this->token->getToken() !== $this->api->getAuthToken()->getToken()) {
            throw new InvalidArgumentException('Api and bot must have same tokens');
        }
    }

    public function setLogger(LoggerInterface $logger): self
    {
        $this->api->setLogger($logger);
        return $this;
    }

    public function getToken(): AuthToken
    {
        return $this->token;
    }

    public function getApi(): ApiInterface
    {
        return $this->api;
    }
}
