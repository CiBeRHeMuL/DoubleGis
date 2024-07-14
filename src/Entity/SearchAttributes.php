<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\ValueObject\Point;
use stdClass;

class SearchAttributes implements EntityInterface
{
    /**
     * @param SearchAttributesOutViewportPoint[] $out_viewport Предпочтительная прямоугольная область отображения результатов на карте.
     * Результаты могут находиться за пределами данной области.
     * @param bool $is_nearby_requested Признак того, что в запросе требуются ближайшие объекты.
     * @param bool $is_remote_requested Признак того, что в запросе требуются объекты не чувствительные к расстоянию.
     * Например, доставка.
     * @param SearchAttributesDragBoundPoint[] $drag_bound Область, по которой получены данные, чтобы при выходе из нее запросить новые.
     * @param bool $is_partial Признак, что самый релеватный результат найден по частичному совпадению.
     */
    public function __construct(
        #[ArrayType(SearchAttributesOutViewportPoint::class)] protected array $out_viewport,
        protected bool $is_nearby_requested,
        protected bool $is_remote_requested,
        #[ArrayType(SearchAttributesDragBoundPoint::class)] protected array $drag_bound,
        protected bool $is_partial,
    ) {
    }

    public function getOutViewport(): array
    {
        return $this->out_viewport;
    }

    public function setOutViewport(array $out_viewport): SearchAttributes
    {
        $this->out_viewport = $out_viewport;
        return $this;
    }

    public function isIsNearbyRequested(): bool
    {
        return $this->is_nearby_requested;
    }

    public function setIsNearbyRequested(bool $is_nearby_requested): SearchAttributes
    {
        $this->is_nearby_requested = $is_nearby_requested;
        return $this;
    }

    public function isIsRemoteRequested(): bool
    {
        return $this->is_remote_requested;
    }

    public function setIsRemoteRequested(bool $is_remote_requested): SearchAttributes
    {
        $this->is_remote_requested = $is_remote_requested;
        return $this;
    }

    public function getDragBound(): array
    {
        return $this->drag_bound;
    }

    public function setDragBound(array $drag_bound): SearchAttributes
    {
        $this->drag_bound = $drag_bound;
        return $this;
    }

    public function isIsPartial(): bool
    {
        return $this->is_partial;
    }

    public function setIsPartial(bool $is_partial): SearchAttributes
    {
        $this->is_partial = $is_partial;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'out_viewport' => array_map(fn(SearchAttributesOutViewportPoint $e) => $e->toArray(), $this->out_viewport),
            'is_nearby_requested' => $this->is_nearby_requested,
            'is_remote_requested' => $this->is_remote_requested,
            'drag_bound' => array_map(fn(SearchAttributesDragBoundPoint $e) => $e->toArray(), $this->drag_bound),
            'is_partial' => $this->is_partial,
        ];
    }
}
