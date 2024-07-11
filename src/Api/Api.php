<?php

namespace AndrewGos\DoubleGis\Api;

use AndrewGos\ClassBuilder\ClassBuilderInterface;
use AndrewGos\DoubleGis\Entity\Meta;
use AndrewGos\DoubleGis\Entity\MetaError;
use AndrewGos\DoubleGis\Enum\HttpStatusCodeEnum;
use AndrewGos\DoubleGis\Helper\HArray;
use AndrewGos\DoubleGis\Http\Factory\RequestFactoryInterface;
use AndrewGos\DoubleGis\Request\MarkersRequest;
use AndrewGos\DoubleGis\Request\RegionGetRequest;
use AndrewGos\DoubleGis\Request\RegionListRequest;
use AndrewGos\DoubleGis\Request\RegionSearchRequest;
use AndrewGos\DoubleGis\Request\RubricGetRequest;
use AndrewGos\DoubleGis\Request\RubricListRequest;
use AndrewGos\DoubleGis\Request\RubricSearchRequest;
use AndrewGos\DoubleGis\Response\MarkersResponse;
use AndrewGos\DoubleGis\Response\RegionResponse;
use AndrewGos\DoubleGis\Response\RubricResponse;
use AndrewGos\DoubleGis\ValueObject\AuthToken;
use AndrewGos\DoubleGis\ValueObject\EncodedJson;
use DateTime;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class Api implements ApiInterface
{
    private array|null $lastResponseRaw = null;

    public function __construct(
        private readonly AuthToken $token,
        private ClassBuilderInterface $classBuilder,
        private RequestFactoryInterface $telegramRequestFactory,
        private ClientInterface $client,
        private LoggerInterface $logger,
    ) {
    }

    public function getAuthToken(): AuthToken
    {
        return $this->token;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    public function markers(MarkersRequest $request): MarkersResponse
    {
        try {
            $result = $this->send(
                '/3.0/markers',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                MarkersResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new MarkersResponse($this->errorMeta($e));
        }
    }

    public function rubricSearch(RubricSearchRequest $request): RubricResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/rubric/search',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RubricResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RubricResponse($this->errorMeta($e));
        }
    }

    public function rubricList(RubricListRequest $request): RubricResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/rubric/list',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RubricResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RubricResponse($this->errorMeta($e));
        }
    }

    public function rubricGet(RubricGetRequest $request): RubricResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/rubric/get',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RubricResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RubricResponse($this->errorMeta($e));
        }
    }

    public function regionSearch(RegionSearchRequest $request): RegionResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/region/search',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RegionResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RegionResponse($this->errorMeta($e));
        }
    }

    public function regionGet(RegionGetRequest $request): RegionResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/region/get',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RegionResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RegionResponse($this->errorMeta($e));
        }
    }

    public function regionList(RegionListRequest $request): RegionResponse
    {
        try {
            $result = $this->send(
                '/2.0/catalog/region/list',
                $request->toArray(),
            );
            return $this->classBuilder->build(
                RegionResponse::class,
                $result,
            );
        } catch (Throwable $e) {
            $this->logger->error($e);
            return new RegionResponse($this->errorMeta($e));
        }
    }

    public function getLastResponseRaw(): array|null
    {
        return $this->lastResponseRaw;
    }

    private function errorMeta(Throwable $e): Meta
    {
        return new Meta(
            HttpStatusCodeEnum::InternalServerError,
            'dev',
            new DateTime(),
            new MetaError(
                'internalServerError',
                $e->getMessage(),
            ),
        );
    }

    private function send(string $method, array $data): array
    {
        try {
            $data = HArray::filterRecursive($data, fn($v) => $v !== null);
            $request = $this->telegramRequestFactory
                ->createRequest($this->token, $method, $data);
            $response = $this->client->sendRequest($request);
            $result = new EncodedJson($response->getBody()->getContents());
            $this->lastResponseRaw = json_decode($result->getJson(), true);
            return $this->lastResponseRaw;
        } catch (Throwable $e) {
            $this->logger->error($e);
            return [];
        }
    }
}
