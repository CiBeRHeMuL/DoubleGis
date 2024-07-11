<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\Field;
use stdClass;

class RegionFlags implements EntityInterface
{
    /**
     * @param bool|null $road_network Наличие информации по автомобильным дорогам.
     * @param bool|null $pedestrian_routing Наличие пешеходной маршрутизации.
     * @param bool|null $has_net_booklet Есть ли провайдерские буклеты в регионе.
     * @param bool|null $gdpr GDPR (General Data Protection Regulation)
     * @param bool|null $flamp В регионе работает сервис Flamp и доступны отзывы по организациям.
     * @param bool|null $public_transport Наличие данных по общественному транспорту.
     * @param bool|null $traffic Наличие данных по пробкам.
     * @param bool|null $parking_layer Наличие слоя парковок.
     * @param bool|null $dgis_reviews Есть ли 2gis отзывы в регионе.
     * @param bool|null $truck_graph Наличие грузового графа.
     * @param bool|null $metro Наличие метро.
     */
    public function __construct(
        protected bool|null $road_network = null,
        protected bool|null $pedestrian_routing = null,
        protected bool|null $has_net_booklet = null,
        protected bool|null $gdpr = null,
        protected bool|null $flamp = null,
        protected bool|null $public_transport = null,
        protected bool|null $traffic = null,
        protected bool|null $parking_layer = null,
        #[Field('2gis_reviews')] protected bool|null $dgis_reviews = null,
        protected bool|null $truck_graph = null,
        protected bool|null $metro = null,
    ) {
    }

    public function getRoadNetwork(): bool|null
    {
        return $this->road_network;
    }

    public function setRoadNetwork(bool|null $road_network): RegionFlags
    {
        $this->road_network = $road_network;
        return $this;
    }

    public function getPedestrianRouting(): bool|null
    {
        return $this->pedestrian_routing;
    }

    public function setPedestrianRouting(bool|null $pedestrian_routing): RegionFlags
    {
        $this->pedestrian_routing = $pedestrian_routing;
        return $this;
    }

    public function getHasNetBooklet(): bool|null
    {
        return $this->has_net_booklet;
    }

    public function setHasNetBooklet(bool|null $has_net_booklet): RegionFlags
    {
        $this->has_net_booklet = $has_net_booklet;
        return $this;
    }

    public function getGdpr(): bool|null
    {
        return $this->gdpr;
    }

    public function setGdpr(bool|null $gdpr): RegionFlags
    {
        $this->gdpr = $gdpr;
        return $this;
    }

    public function getFlamp(): bool|null
    {
        return $this->flamp;
    }

    public function setFlamp(bool|null $flamp): RegionFlags
    {
        $this->flamp = $flamp;
        return $this;
    }

    public function getPublicTransport(): bool|null
    {
        return $this->public_transport;
    }

    public function setPublicTransport(bool|null $public_transport): RegionFlags
    {
        $this->public_transport = $public_transport;
        return $this;
    }

    public function getTraffic(): bool|null
    {
        return $this->traffic;
    }

    public function setTraffic(bool|null $traffic): RegionFlags
    {
        $this->traffic = $traffic;
        return $this;
    }

    public function getParkingLayer(): bool|null
    {
        return $this->parking_layer;
    }

    public function setParkingLayer(bool|null $parking_layer): RegionFlags
    {
        $this->parking_layer = $parking_layer;
        return $this;
    }

    public function getDgisReviews(): bool|null
    {
        return $this->dgis_reviews;
    }

    public function setDgisReviews(bool|null $dgis_reviews): RegionFlags
    {
        $this->dgis_reviews = $dgis_reviews;
        return $this;
    }

    public function getTruckGraph(): bool|null
    {
        return $this->truck_graph;
    }

    public function setTruckGraph(bool|null $truck_graph): RegionFlags
    {
        $this->truck_graph = $truck_graph;
        return $this;
    }

    public function getMetro(): bool|null
    {
        return $this->metro;
    }

    public function setMetro(bool|null $metro): RegionFlags
    {
        $this->metro = $metro;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'road_network' => $this->road_network,
            'pedestrian_routing' => $this->pedestrian_routing,
            'has_net_booklet' => $this->has_net_booklet,
            'gdpr' => $this->gdpr,
            'flamp' => $this->flamp,
            'public_transport' => $this->public_transport,
            'traffic' => $this->traffic,
            'parking_layer' => $this->parking_layer,
            '2gis_reviews' => $this->dgis_reviews,
            'truck_graph' => $this->truck_graph,
            'metro' => $this->metro,
        ];
    }
}
