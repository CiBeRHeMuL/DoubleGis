<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class SearchAttributesDragBoundPoint implements EntityInterface
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

    public function setLongitude(float $longitude): SearchAttributesDragBoundPoint
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): SearchAttributesDragBoundPoint
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
