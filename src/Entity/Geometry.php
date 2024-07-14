<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class Geometry implements EntityInterface
{
    /**
     * @param string|null $hover Геометрия области, используемой для определения попадания курсора в зону объекта.
     * @param string|null $selection Геометрия для выделения объекта.
     * @param string|null $centroid Визуальный центр геометрии объекта.
     */
    public function __construct(
        protected string|null $hover = null,
        protected string|null $selection = null,
        protected string|null $centroid = null,
    ) {
    }

    public function getHover(): string|null
    {
        return $this->hover;
    }

    public function setHover(string|null $hover): Geometry
    {
        $this->hover = $hover;
        return $this;
    }

    public function getSelection(): string|null
    {
        return $this->selection;
    }

    public function setSelection(string|null $selection): Geometry
    {
        $this->selection = $selection;
        return $this;
    }

    public function getCentroid(): string|null
    {
        return $this->centroid;
    }

    public function setCentroid(string|null $centroid): Geometry
    {
        $this->centroid = $centroid;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'hover' => $this->hover,
            'selection' => $this->selection,
            'centroid' => $this->centroid,
        ];
    }
}
