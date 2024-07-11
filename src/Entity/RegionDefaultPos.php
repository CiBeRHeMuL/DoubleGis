<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionDefaultPos implements EntityInterface
{
    /**
     * @param float|int|null $lon Долгота
     * @param float|int|null $lat Широта
     * @param int|null $zoom Уровень масштаба, рекомендуемый для дефолтного отображения всего проекта.
     */
    public function __construct(
        protected float|int|null $lon = null,
        protected float|int|null $lat = null,
        protected int|null $zoom = null,
    ) {
    }

    public function getLon(): float|int|null
    {
        return $this->lon;
    }

    public function setLon(float|int|null $lon): RegionDefaultPos
    {
        $this->lon = $lon;
        return $this;
    }

    public function getLat(): float|int|null
    {
        return $this->lat;
    }

    public function setLat(float|int|null $lat): RegionDefaultPos
    {
        $this->lat = $lat;
        return $this;
    }

    public function getZoom(): int|null
    {
        return $this->zoom;
    }

    public function setZoom(int|null $zoom): RegionDefaultPos
    {
        $this->zoom = $zoom;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'lon' => $this->lon,
            'lat' => $this->lat,
            'zoom' => $this->zoom,
        ];
    }
}
