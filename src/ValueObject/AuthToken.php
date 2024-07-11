<?php

namespace AndrewGos\DoubleGis\ValueObject;

use InvalidArgumentException;

readonly class AuthToken
{
    public function __construct(
        private string $token,
    ) {
        if (
            !preg_match(
                '/[a-f0-9]{8}-([a-f0-9]{4}-){3}[a-f0-9]{12}/i',
                $this->token,
            )
        ) {
            throw new InvalidArgumentException('Invalid auth token');
        }
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
