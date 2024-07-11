<?php

namespace AndrewGos\DoubleGis\Http\Factory;

use AndrewGos\DoubleGis\Enum\HttpMethodEnum;
use AndrewGos\DoubleGis\Http\Container\HttpHeadersContainer;
use AndrewGos\DoubleGis\Http\Message\HttpRequest;
use AndrewGos\DoubleGis\Http\Uri\Uri;
use AndrewGos\DoubleGis\ValueObject\AuthToken;
use Psr\Http\Message\RequestInterface;

final class RequestFactory implements RequestFactoryInterface
{
    public const API_BASE_URL = 'https://catalog.api.2gis.com';

    /**
     * @param AuthToken $token
     * @param string $method
     * @param array $data
     *
     * @return RequestInterface
     */
    public function createRequest(AuthToken $token, string $method, array $data): RequestInterface
    {
        $data['key'] = $token->getToken();
        return new HttpRequest(
            HttpMethodEnum::Get,
            new Uri(self::API_BASE_URL . $method . $this->prepareData($data)),
            new HttpHeadersContainer([]),
            null,
        );
    }

    private function prepareData(array $data): string
    {
        $query = http_build_query($data);
        return $query ? "?{$query}" : $query;
    }
}
