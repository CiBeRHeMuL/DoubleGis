<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use stdClass;

#[BuildIf(new FieldIsChecker('type', 'coordinates'))]
class CoordinatesMarker extends AbstractMarker
{
    /**
     * @param float $lon Долгота
     * @param float $lat Широта
     * @param SearchAttributesSuggest|null $search_attributes Информация о произведённом поиске.
     */
    public function __construct(
        protected float $lon,
        protected float $lat,
        protected SearchAttributesSuggest|null $search_attributes = null,
    ) {
        parent::__construct('coordinates');
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLon(float $lon): CoordinatesMarker
    {
        $this->lon = $lon;
        return $this;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): CoordinatesMarker
    {
        $this->lat = $lat;
        return $this;
    }

    public function getSearchAttributes(): SearchAttributesSuggest|null
    {
        return $this->search_attributes;
    }

    public function setSearchAttributes(SearchAttributesSuggest|null $search_attributes): CoordinatesMarker
    {
        $this->search_attributes = $search_attributes;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'lon' => $this->lon,
            'lat' => $this->lat,
            'search_attributes' => $this->search_attributes?->toArray(),
        ];
    }
}
