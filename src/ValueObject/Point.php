<?php

namespace AndrewGos\DoubleGis\ValueObject;

readonly class Point
{
    /**
     * @param float $lon Широта.
     * @param float $lat Долгота
     */
    public function __construct(
        protected float $lon,
        protected float $lat,
    ) {
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function getLat(): float
    {
        return $this->lat;
    }
}
