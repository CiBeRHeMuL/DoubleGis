<?php

namespace AndrewGos\DoubleGis\Api;

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
use Psr\Log\LoggerInterface;

interface ApiInterface
{
    public function getAuthToken(): AuthToken;

    /**
     * Current logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Set current logger
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): static;

    /**
     * @param MarkersRequest $request
     *
     * @return MarkersResponse
     * @link https://docs.2gis.com/ru/api/search/markers/reference/3.0/markers#/paths/~13.0~1markers/get
     */
    public function markers(MarkersRequest $request): MarkersResponse;

    /**
     * @param RubricSearchRequest $request
     *
     * @return RubricResponse
     *
     * @link https://docs.2gis.com/ru/api/search/categories/reference/2.0/catalog/rubric/search
     */
    public function rubricSearch(RubricSearchRequest $request): RubricResponse;

    /**
     * @param RubricGetRequest $request
     *
     * @return RubricResponse
     *
     * @link https://docs.2gis.com/ru/api/search/categories/reference/2.0/catalog/rubric/get
     */
    public function rubricGet(RubricGetRequest $request): RubricResponse;

    /**
     * @param RubricListRequest $request
     *
     * @return RubricResponse
     *
     * @see https://docs.2gis.com/ru/api/search/categories/reference/2.0/catalog/rubric/list
     */
    public function rubricList(RubricListRequest $request): RubricResponse;

    /**
     * @param RegionSearchRequest $request
     *
     * @return RegionResponse
     *
     * @link https://docs.2gis.com/ru/api/search/regions/reference/2.0/region/search
     */
    public function regionSearch(RegionSearchRequest $request): RegionResponse;

    /**
     * @param RegionGetRequest $request
     *
     * @return RegionResponse
     *
     * @link https://docs.2gis.com/ru/api/search/regions/reference/2.0/region/get
     */
    public function regionGet(RegionGetRequest $request): RegionResponse;

    /**
     * @param RegionListRequest $request
     *
     * @return RegionResponse
     *
     * @see https://docs.2gis.com/ru/api/search/regions/reference/2.0/region/list
     */
    public function regionList(RegionListRequest $request): RegionResponse;

    public function getLastResponseRaw(): array|null;
}
