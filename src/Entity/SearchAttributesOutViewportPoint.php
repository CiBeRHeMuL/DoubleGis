<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class SearchAttributesOutViewportPoint implements EntityInterface
{
    /**
     * @param float $longitude Широта.
     * @param float $latitude Долгота
     */
    public function __construct(
        protected float $longitude,
        protected float $latitude,
    ) {
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): SearchAttributesOutViewportPoint
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): SearchAttributesOutViewportPoint
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
    }
}
