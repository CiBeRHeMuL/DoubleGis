<?php

namespace AndrewGos\DoubleGis\ValueObject;

use InvalidArgumentException;

readonly class Polygon
{
    /**
     * @param Point[] $outerPoints
     */
    public function __construct(
        private array $outerPoints,
        private array $innerPoints,
    ) {
        foreach ($this->outerPoints as $point) {
            if (!($point instanceof Point)) {
                throw new InvalidArgumentException('Array elements must be points');
            }
        }
        foreach ($this->innerPoints as $point) {
            if (!($point instanceof Point)) {
                throw new InvalidArgumentException('Array elements must be points');
            }
        }
    }

    public function getOuterPoints(): array
    {
        return $this->outerPoints;
    }

    public function getInnerPoints(): array
    {
        return $this->innerPoints;
    }

    public function __toString(): string
    {
        return 'POLYGON(('
            . implode(', ', array_map(fn(Point $p) => "{$p->getLon()} {$p->getLat()}", $this->outerPoints)) . '), ('
            . implode(', ', array_map(fn(Point $p) => "{$p->getLon()} {$p->getLat()}", $this->outerPoints)) . '))';
    }
}
