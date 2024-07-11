<?php

namespace AndrewGos\DoubleGis;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\DoubleGis\Api\Api;
use AndrewGos\DoubleGis\Http\Client\HttpClient;
use AndrewGos\DoubleGis\Http\Factory\RequestFactory;
use AndrewGos\DoubleGis\ValueObject\AuthToken;
use Psr\Log\NullLogger;

class DoubleGisFactory
{
    public static function getDefault(AuthToken $token): DoubleGis
    {
        return new DoubleGis(
            $token,
            new Api(
                $token,
                new ClassBuilder(),
                new RequestFactory(),
                new HttpClient(),
                new NullLogger(),
            ),
        );
    }
}
