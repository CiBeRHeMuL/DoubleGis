<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class ZoomLevel implements EntityInterface
{
    /**
     * @param int $min
     * @param int $max
     */
    public function __construct(
        protected int $min,
        protected int $max,
    ) {
    }

    public function getMin(): int
    {
        return $this->min;
    }

    public function setMin(int $min): ZoomLevel
    {
        $this->min = $min;
        return $this;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function setMax(int $max): ZoomLevel
    {
        $this->max = $max;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'min' => $this->min,
            'max' => $this->max,
        ];
    }
}
